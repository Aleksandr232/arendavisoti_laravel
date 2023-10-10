<?php

namespace App\Http\Controllers\Director;

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

class SendContractsDirectorController extends Controller
{

    public function sendEmailDirector(Request $request)
    {

        // Получение данных из запроса контактной формы
    $email = $request->input('email');
    $name = Auth::user()->name;
    if(Auth::user()->is_admin == true){
        $stat = 'менеджера';
    }elseif(Auth::user()->is_director == true){
        $stat = 'директора';
    }
    $message = $request->input('message');
    $file = $request->file('file');

    // Сохранение данных в базу данных
    $mailmessage = new MailMessage();
    $mailmessage->name = $name;
    $mailmessage->email = $email;
    $mailmessage->message = $message;
    $mailmessage->file = $file;
    if ($request->hasFile('file')) {
        $path = Storage::disk('mail')->putFile('mailmessage', $file);
        $mailmessage->path = $path;
    }
    $mailmessage->save();

    // Отправка письма с вложенным файлом
    $data = [
        'name' => $name,
        'message' => $message,
        'path' => $mailmessage->path,
        'stat' => $stat

    ];

    $mail = new ContractsMail($data);
    Mail::to($email)
        ->send($mail, function ($message) use ($mail) {
            if (!is_null($mail->path)) {
                $message->attach($data['path']->getRealPath());
            }
        });

    if ($request->hasFile('file')) {
            Storage::disk('mail')->delete($mailmessage->path = $path);
        }

        return redirect()
            ->route('contracts-director.create')
            ->with('success', 'Письмо отправлено на почту');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('director.sendingcontractsdirector.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contact = Contact::all();

        return view('director.sendingcontractsdirector.create', compact('contact'));

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
