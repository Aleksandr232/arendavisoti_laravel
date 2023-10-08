<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerBaseTours;
use Illuminate\Http\Request;
use App\Models\Stock;
use PDF;

class CustmerBaseToursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $stock=Stock::all();

        $search = $request->input('search');
        $filterDate = $request->input('filter_date');
        $basetours = CustomerBaseTours::query()
        ->where('counterparty', 'LIKE', '%' . $search . '%')
        ->when($filterDate, function ($query, $filterDate) {
            return $query->where('dateact', $filterDate);
        })
        ->orderByDesc('id')
        ->paginate(5);

        $footing1_5 = CustomerBaseTours::all()->sum('footing1_5');
        $area0_45 = CustomerBaseTours::all()->sum('area0_45');
        $rama1_2 = CustomerBaseTours::all()->sum('rama1_2');
        $rigel2 = CustomerBaseTours::all()->sum('rigel2');
        $link0_7 = CustomerBaseTours::all()->sum('link0_7');
        $rama1_1 = CustomerBaseTours::all()->sum('rama1_1');
        $emphasis = CustomerBaseTours::all()->sum('emphasis');
        $footing0_7 = CustomerBaseTours::all()->sum('footing0_7');
        $area07_15 = CustomerBaseTours::all()->sum('area07_15');
        $rama0_7 = CustomerBaseTours::all()->sum('rama0_7');
        $rigel1_5 = CustomerBaseTours::all()->sum('rigel1_5');
        $rama0_7_1 = CustomerBaseTours::all()->sum('rama0_7_1');
        $footing2_4 = CustomerBaseTours::all()->sum('footing2_4');
        $pipe = CustomerBaseTours::all()->sum('pipe');
        $rama1_4 = CustomerBaseTours::all()->sum('rama1_4');
        $link0_9 = CustomerBaseTours::all()->sum('link0_9');
        $sum_equipment = CustomerBaseTours::all()->sum('sum_equipment');

        return view('admin.customerbasetours.index', compact('stock','basetours', 'footing1_5', 'area0_45', 'rama1_2', 'rigel2', 'link0_7', 'rama1_1', 'emphasis', 'footing0_7', 'area07_15', 'rama0_7', 'rigel1_5', 'rama0_7_1', 'footing2_4', 'pipe', 'rama1_4', 'link0_9', 'sum_equipment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customerbasetours.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $сustomerbasetours = CustomerBaseTours::query()->create($data);

        return redirect()->route('customerbasetours.index')->with('success', 'Клиент добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerBaseTours  $customerBaseTours
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerBaseTours $customerBaseTours)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerBaseTours  $customerBaseTours
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $base = CustomerBaseTours::query()->find($id);

        return view('admin.customerbasetours.edit', compact('base'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerBaseTours  $customerBaseTours
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $base = CustomerBaseTours::findOrFail($id);
        $base->update($request->all());

        return redirect()->route('customerbasetours.index')->with('success', 'Клиент был успешно обновлен!');
    }

    public function updateStatusTours(Request $request, $id)
    {
        $base = CustomerBaseTours::find($id);
        $base->sign = 'оплачено';
        $base->save();

        return redirect()->route('customerbasetours.index')->with('success', $base->counterparty . ' оплатил за аренду!');
    }

    public function updateStatusUnpaidTours(Request $request, $id)
    {
        $base = CustomerBaseTours::find($id);
        $base->sign = 'не оплачено';
        $base->save();

        return redirect()->route('customerbasetours.index')->with('err',  $base->counterparty . ' не оплатил за аренду!');
    }

    public function updateStatusClientTours(Request $request, $id)
    {
        $base = CustomerBaseTours::find($id);
        $base->sign = 'хороший постоянный клиент';
        $base->save();

        return redirect()->route('customerbasetours.index')->with('success', $base->counterparty . ' наш постоянный клиент!');
    }

    public function updateStatusDebtorTours(Request $request, $id)
    {
        $base = CustomerBaseTours::find($id);
        $base->sign = 'ДОЛЖНИК';
        $base->save();

        return redirect()->route('customerbasetours.index')->with('err',  $base->counterparty .  ' уже давно не оплачивал!');
    }

    public function updateStatusInfoTours(Request $request, $id)
    {
        $base = CustomerBaseTours::find($id);
        $base->act = 'отгружено';
        $base->save();

        return redirect()->route('customerbasetours.index')->with('info',  'Отгружено');
    }

    public function updateStatusRefundTours(Request $request, $id)
    {
        $base = CustomerBaseTours::find($id);
        $base->act = 'частичный возврат';
        $base->save();

        return redirect()->route('customerbasetours.index')->with('info',  'Частичный возврат');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerBaseTours  $customerBaseTours
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $base = CustomerBaseTours::find($id);
        if (!$base) {
        return abort(404);
    }

        $base->delete($base->id);


        return redirect()->route('customerbasetours.index')->with('err', 'Клиенты удалены');
    }

    public function preview()
    {
        $base = CustomerBaseTours::all();

        return view('Tours', compact('base'));
    }

    public function generatePDFTours(Request $request)
    {
        $base = CustomerBaseTours::all();

        $pdf = PDF::loadView('Tours', compact('base'));
        return $pdf->download('отчет по вышкам-турам.pdf');
    }
}
