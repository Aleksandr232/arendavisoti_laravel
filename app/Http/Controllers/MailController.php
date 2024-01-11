<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Contact;
use App\Models\Discounts;
use App\Mail\DiscountsMail;
use App\Notifications\SendLetterTelegram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class MailController extends Controller

{
    public function send(Request $request)
    {
        $this->validate($request, [
            'hidden' => 'required',
            'name' => 'required|min:2|max:65',
            'phone' => 'required|min:11|max:20|',
            'h-captcha-response' => ['hcaptcha'],
        ]);

        $contact = new Contact();
        $contact->company =$request->input('company');
        $contact->address = $request->input('address');
        $contact->hidden = $request->input('hidden');
        $contact->name = $request->input('name');
        $contact->phone = $request->input('phone');
        $contact->telegram = $request->input('telegram');
        $contact->email = $request->input('email');
        $contact->save();



        $body = "<p><span style='color: #3D5368'>{$request->input('hidden')}</span></p>";
        $body .= "<p><span style='color: #3D5368'>Имя клиента:</span> {$request->input('name')}</p>";
        $body .= "<p><span style='color: #3D5368'>Телефон клиента:</span> {$request->input('phone')}</p>";

        $to = explode(',', env('ADMIN_EMAILS'));
        /* Mail::to($to)->send(new SendMail($body)); */

        Notification::send($request, new SendLetterTelegram());

        return view('site.mail.send', ['name'=>$contact->name ]);
    }

    public function sendDiscounts(Request $request)
    {

        $this->validate($request, [
            'h-captcha-response' => ['hcaptcha'],
        ]);

        $name = $request->input('name');
        $email = $request->input('email');

        //проверка email и name
        $existingDiscount = Discounts::orWhere('email', $email)->first();
        if ($existingDiscount) {
            return view('site.mail.sendDiscountError', ['name'=>$name]);
        }

        $code = Str::upper(Str::random(2)) . mt_rand(10, 99) . Str::upper(Str::random(2));

        $discount = new Discounts();
        $discount->email = $email;
        $discount->name = $name;
        $discount->code = $code;
        $discount->save();



        $data = [
            'code' => $code,
        ];

        $mail = new DiscountsMail($data);
        Mail::to($email)->send($mail);

        return view('site.mail.sendDiscount', ['name'=>$discount->name]);
    }

    public function checkDiscountCode(Request $request)
    {
        $code = $request->input('code');

        $discount = Discounts::where('code', $code)->first();

        if ($discount) {
            $response = [
                'name' => $discount->name,
            ];
            return redirect()->route('admin')->with('success', 'Клиент ' . $discount->name );
        } else {
            return redirect()->route('admin')->with('err', 'код неправильный');
        }
    }


}

