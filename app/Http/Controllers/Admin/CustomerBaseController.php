<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerBase;
use Illuminate\Http\Request;
use App\Models\Stock;
use PDF;

class CustomerBaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $stock=Stock::all();

        $search = $request->input('search'); // Получить значение поиска из запроса
        $filterDate = $request->input('filter_date'); // Получить значение фильтра по дате из запроса
        $stairsframes = CustomerBase::all()->sum('stairsframes');
        $equipment = CustomerBase::all()->sum('equipment');
        $passageframes = CustomerBase::all()->sum('passageframes');
        $doubleconnections = CustomerBase::all()->sum('doubleconnections');
        $singleconnections = CustomerBase::all()->sum('singleconnections');
        $alllevelrafters = CustomerBase::all()->sum('alllevelrafters');
        $alllevelpanels = CustomerBase::all()->sum('alllevelpanels');
        $bash = CustomerBase::all()->sum('bash');
        $jack = CustomerBase::all()->sum('jack');

        $base = CustomerBase::query()
        ->where('counterparty', 'LIKE', '%' . $search . '%')
        ->when($filterDate, function ($query, $filterDate) {
            return $query->where('dateact', $filterDate);
        })
        ->orderByDesc('id')
        ->paginate(5); // Добавить условие поиска по имени



    return view('admin.customerbase.index', compact('base', 'stairsframes', 'equipment', 'jack', 'bash', 'alllevelpanels', 'alllevelrafters', 'singleconnections', 'doubleconnections', 'passageframes', 'stock'   ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customerbase.create');
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
            'sign' => 'required',
            'act' => 'required',
            'dateact' => 'required',
            'counterparty' => 'required',
            'phone' => 'required',
            'duration' => 'required',
            'contractamount' => 'required',
            'calculation' => 'required',
            'paidby' => 'required',
        ],
        [
            /* 'title.required' => 'Поле заголовок статьи должно быть заполнено',
            'content.required' => 'Поле описание статьи должно быть заполнено',
            'img.required' => 'Загрузите фотографию статьи',
            'img.image' => 'Фотография статьи должна быть файлом изображения',
            'img.max' => 'Фотография статьи не должна превышать размер 10 мб', */
        ]);

        $data = $request->all();
       /*  $data['img'] = Post::uploadImage($request); */



        $сustomerbase = CustomerBase::query()->create($data);

        return redirect()->route('customerbase.index')->with('success', 'Клиент добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerBase  $customerBase
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerBase $customerBase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerBase  $customerBase
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $base = CustomerBase::query()->find($id);

        return view('admin.customerbase.edit', compact('base'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerBase  $customerBase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $base = CustomerBase::findOrFail($id);


        $request->validate([
            'sign' => 'required',
            'act' => 'required',
            'dateact' => 'required',
            'counterparty' => 'required',
            'phone' => 'required',
            'duration' => 'required',
            'contractamount' => 'required',
            'calculation' => 'required',
            'paidby' => 'required',
        ]);

        $base->update($request->all());

        return redirect()->route('customerbase.index')->with('success', 'Клиент был успешно обновлен!');
    }

    public function updateStatus(Request $request, $id)
    {
        $base = CustomerBase::find($id);
        $base->sign = 'оплачено';
        $base->save();

        return redirect()->route('customerbase.index')->with('success', $base->counterparty . ' оплатил за аренду!');
    }

    public function updateStatusUnpaid(Request $request, $id)
    {
        $base = CustomerBase::find($id);
        $base->sign = 'не оплачено';
        $base->save();

        return redirect()->route('customerbase.index')->with('err',  $base->counterparty . ' не оплатил за аренду!');
    }

    public function updateStatusClient(Request $request, $id)
    {
        $base = CustomerBase::find($id);
        $base->sign = 'хороший постоянный клиент';
        $base->save();

        return redirect()->route('customerbase.index')->with('success', $base->counterparty . ' наш постоянный клиент!');
    }

    public function updateStatusDebtor(Request $request, $id)
    {
        $base = CustomerBase::find($id);
        $base->sign = 'ДОЛЖНИК';
        $base->save();

        return redirect()->route('customerbase.index')->with('err',  $base->counterparty .  ' уже давно не оплачивал!');
    }

    public function updateStatusInfo(Request $request, $id)
    {
        $base = CustomerBase::find($id);
        $base->act = 'отгружено';
        $base->save();

        return redirect()->route('customerbase.index')->with('info',  'Отгружено');
    }

    public function updateStatusRefund(Request $request, $id)
    {
        $base = CustomerBase::find($id);
        $base->act = 'частичный возврат';
        $base->save();

        return redirect()->route('customerbase.index')->with('info',  'Частичный возврат');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerBase  $customerBase
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $base = CustomerBase::find($id);
        if (!$base) {
        return abort(404);
    }

        $base->delete($base->id);


        return redirect()->route('customerbase.index')->with('err', 'Клиенты удалены');
    }

    public function preview()
    {
        $base = CustomerBase::all();

        return view('lesa', compact('base'));
    }

    public function generatePDFlesa(Request $request)
    {
        $base = CustomerBase::all();

        $pdf = PDF::loadView('lesa', compact('base'));
        return $pdf->download('отчет по лесам.pdf');
    }
}
