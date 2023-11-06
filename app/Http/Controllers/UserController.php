<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class UserController extends Controller
{
    protected function create()
    {
        return view('user.create');

    }

    protected function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',

        ]);

        $user = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),


        ]);

        $userToken = $user->createToken('remember_token')->plainTextToken;
        $user->remember_token = $userToken;
        $user->save();





        session()->flash('success', 'Регистрация пройдена');
        Auth::login($user);

        return redirect()->home();
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
        }

        session()->flash('success', 'Добро пожаловать, ' . Auth::user() ->  name . '!');

        return redirect()->route('admin');
    }

    public function redirectToVK()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function handleVKCallback()
    {

            $user = Socialite::driver('vkontakte')->user();

            $existingUser = User::where('vk_id', $user->id)->first();

            if ($existingUser) {
                // Если пользователь уже существует, то выполняем авторизацию
                Auth::login($existingUser);
            } else {
                // Если пользователь не существует, создаем нового пользователя в базе данных
                $newUser = User::create([
                    'vk_id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => bcrypt('random_password'), // Не используется при авторизации через Google
                ]);

                // Авторизуем пользователя
                Auth::login($newUser);
            }

            session()->flash('success', 'Добро пожаловать, ' . Auth::user() ->  name . '!');

            return redirect()->route('admin');


    }

    public function redirectToYandex()
    {
        return Socialite::driver('yandex')->redirect();
    }

    public function handleYandexCallback()
    {
        $user = Socialite::driver('yandex')->user();

        $existingUser = User::where('yandex_id', $user->id)->first();

            if ($existingUser) {
                // Если пользователь уже существует, то выполняем авторизацию
                Auth::login($existingUser);
            } else {
                // Если пользователь не существует, создаем нового пользователя в базе данных
                $newUser = User::create([
                    'yandex_id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => bcrypt('random_password'), // Не используется при авторизации через Google
                ]);

                // Авторизуем пользователя
                Auth::login($newUser);
            }

            session()->flash('success', 'Добро пожаловать, ' . Auth::user() ->  name . '!');

            return redirect()->route('admin');

        return redirect('/home');
    }

    public function loginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,

        ])) {

            session()->flash('success', 'Добро пожаловать, ' . Auth::user() ->  name . '!');

            /* $access_token = Auth::user()->createToken('authToken')->accessToken; */



            if (Auth::user()->is_director) {
                return redirect()->route('director');
            } elseif (Auth::user()->is_admin) {
                return redirect()->route('admin');
            } else {
                return redirect()->route('home');
            }
        }



        return redirect()->back()->with('error', 'Некорректный логин или пароль');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->home();
    }
}
