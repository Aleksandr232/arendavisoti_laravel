<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contracts;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\MailMessage;
use App\Mail\ContractsMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;

class SendContractsController extends Controller
{

    public function sendEmail(Request $request)
{
    // Получаем данные из запроса формы контактов
    $emails = $request->input('emails');
    $emailsArr = explode(',', $emails);

    $name = Auth::user()->name;
    if(Auth::user()->is_admin == true){
        $stat = 'менеджер'; // менеджер
    }elseif(Auth::user()->is_director == true){
        $stat = 'директор'; // директор
    }
    $message = $request->input('message');
    $file = $request->file('file');

    // Сохраняем данные в базе данных
    $mailmessage = new MailMessage();
    $mailmessage->name = $name;
    $mailmessage->message = $message;
    $mailmessage->file = $file;

    if ($request->hasFile('file')) {
        $path = Storage::disk('mail')->putFile('mailmessage', $file);
        $mailmessage->path = $path;
    }
    $mailmessage->save();

    // Отправляем электронную почту на каждый адрес электронной почты в массиве
    foreach ($emailsArr as $email) {
        // Если есть только сообщение без прикрепленного файла
        if ($message && !$request->hasFile('file')) {
            $data =[
                'name' => $name,
                'message' => $message,
                'stat' => $stat,
                'path' =>'doc/price.xlsx',
            ];

            $mail = new ContractsMail($data);
            Mail::to($email)->send($mail);
        }

        // Если есть только прикрепленный файл без сообщения
        if (!$message && $request->hasFile('file')) {
            $data =[
                'name' => $name,
                'path' => $mailmessage->path,
                'stat' => $stat,
                'message' => '',
            ];

            $mail = new ContractsMail($data);
            Mail::to($email)->send($mail, function ($message) use ($mail) {
                $message->attach($data['path']->getRealPath());
            });
        }

        // Если есть и сообщение, и прикрепленный файл
        if ($message && $request->hasFile('file')) {
            $data =[
                'name' => $name,
                'message' => $message,
                'path' => $mailmessage->path,
                'stat' => $stat
            ];

            $mail = new ContractsMail($data);
            Mail::to($email)->send($mail, function ($message) use ($mail) {
                $message->attach($data['path']->getRealPath());
            });
        }
    }

    if ($request->hasFile('file')) {
            Storage::disk('mail')->delete($mailmessage->path = $path);
        }

    return redirect()
        ->route('contracts.create')
        ->with('success', 'Письмо успешно отправленно'); // Письма успешно отправлены на почту
}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sendingcontracts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contact = Contact::all();

        return view('admin.sendingcontracts.create', compact('contact'));

    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contracts  $contracts
     * @return \Illuminate\Http\Response
     */
    public function show(Contracts $contracts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contracts  $contracts
     * @return \Illuminate\Http\Response
     */
    public function edit(Contracts $contracts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contracts  $contracts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contracts $contracts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contracts  $contracts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contracts $contracts)
    {
        //
    }
}
