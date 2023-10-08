<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class AdminContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::all();

        return view('admin.contact.index', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'company' => 'required',
            'address' => 'required',
            'telegram' => 'required',
            'email' => 'required',
        ]);

        $data = $request->all();
        $data['created_month'] = date('m');

        $contact = Contact::query()->create($data);

        return redirect()->route('contacts.index')->with('success', 'Клиент добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::query()->find($id);

        return view('admin.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contact= Contact::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'company' => 'required',
            'address' => 'required',
            'telegram' => 'required',
            'email' => 'required',
        ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('success', 'Клиент был успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
        return abort(404);
    }

        $contact->delete($contact->id);
        return  redirect()->route('contacts.index')->with('err', 'Клиент удален');
    }
}
