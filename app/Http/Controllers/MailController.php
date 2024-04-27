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
            'phone' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $contact = new Contact();
        $contact->company =$request->input('company');
        $contact->address = $request->input('address');
        $contact->hidden = $request->input('hidden');
        $contact->phone = $request->input('phone');
        $contact->telegram = $request->input('telegram');
        $contact->email = $request->input('email');
        $contact->save();



        $body = "<p><span style='color: #3D5368'>{$request->input('hidden')}</span></p>";
        $body .= "<p><span style='color: #3D5368'>Телефон клиента:</span> {$request->input('phone')}</p>";

        $to = explode(',', env('ADMIN_EMAILS'));
        /* Mail::to($to)->send(new SendMail($body)); */

        Notification::send($request, new SendLetterTelegram());

        /* $filename = 'catalog.pdf'; // Название вашего файла
        $file_path = storage_path('catalog.pdf'); */



        // Проверяем существование файла
        /* if (file_exists($file_path)) {
            return response()->download($file_path, $filename, [
                'Content-Disposition' => "attachment; filename={$filename}",
            ]);
        } else {
            // Если файл не найден, возвращаем ошибку 404
            return response()->json(['error' => 'Файл не найден'], 404);
        } */

        return view('site.pages.catalog_and_price');

    }

    public function sendDiscounts(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'g-recaptcha-response' => 'required|captcha'
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

    public function sendHome(Request $request)
    {
         $this->validate($request, [
            'hidden' => 'required',
            'phone' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $contact = new Contact();
        $contact->company =$request->input('company');
        $contact->address = $request->input('address');
        $contact->hidden = $request->input('hidden');
        $contact->phone = $request->input('phone');
        $contact->telegram = $request->input('telegram');
        $contact->email = $request->input('email');
        $contact->save();



        $body = "<p><span style='color: #3D5368'>{$request->input('hidden')}</span></p>";
        $body .= "<p><span style='color: #3D5368'>Телефон клиента:</span> {$request->input('phone')}</p>";

        $to = explode(',', env('ADMIN_EMAILS'));
        /* Mail::to($to)->send(new SendMail($body)); */

        Notification::send($request, new SendLetterTelegram());


        return view('site.mail.send');


    }


}

