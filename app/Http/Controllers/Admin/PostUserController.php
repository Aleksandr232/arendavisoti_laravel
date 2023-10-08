<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LoginLog;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Carbon\Carbon;

class PostUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $userToken = $user->createToken('remember_token')->plainTextToken;
        $user->remember_token = $userToken;
        $user->save();

        return response()->json(['success'=>'Регистрация прошла успешно', 'token' => $userToken]);
    }


    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($validatedData)) {
            $user = Auth::user();
            $userToken = $user->createToken('remember_token')->plainTextToken;
            $user->remember_token = $userToken;
            $user->save();
            $username = $user->name;
            $response = [
                'message' => 'Успешно вошли в систему',
                'token' => $userToken,
                'access_code' => $user->access_code,
                'username' => $username
            ];

            return response()->json($response, 200);
        } else {
            return response()->json(['message' => 'Ошибка аутентификации'], 403);
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        // Здесь вы можете выполнить дополнительные операции или проверки с полученными данными пользователя

        // Проверяем, есть ли пользователь с таким google_id в базе данных
        $existingUser = User::where('google_id', $user->id)->first();

        if ($existingUser) {
            // Если пользователь уже существует, то выполняем авторизацию
            Auth::login($existingUser);
            $accessToken = Auth::user()->createToken('Token Name')->accessToken;
            return response()->json(['access_token' => $accessToken, 'message' => 'Пользователь авторизован']);
        } else {
            // Если пользователь не существует, создаем нового пользователя в базе данных
            $newUser = User::create([
                'google_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'password' => bcrypt('random_password'), // Не используется при авторизации через Google
            ]);

            // Авторизуем пользователя
            Auth::login($newUser);
            $accessToken = Auth::user()->createToken('Token Name')->accessToken;
            return response()->json(['access_token' => $accessToken, 'message' => 'Новый пользователь создан и авторизован']);
        }
    }


    /**
     * Log out the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request) {
        $user = $request->user();

        if (!empty($user->remember_token)) {
            $user->remember_token = null;
            $user->save();
                return response()->json(['success_message' => 'Пока, ' . $user->name]);
        } else {
            	return response()->json(['error_message' => 'Пользователь не найден!']);
        }

    }

    /**
     * Display information about the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function users(Request $request)
    {
        $user = $request->user();

        return response()->json(['username' => $user->name, 'email' => $user->email], 200);
    }

}
