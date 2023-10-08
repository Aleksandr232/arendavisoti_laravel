<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Finace;
use Illuminate\Http\Request;
use PDF;

class FinaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lastTotalAmount = $request->input('lastTotalAmount');

        $finance = Finace::query()
        ->orderByDesc('id')
        ->paginate(10);


        return view('admin.finace.index', compact('finance', 'lastTotalAmount' ));
    }

    public function deleteAll()
    {
        Finace::query()->delete();

        return redirect()->route('finace.index')->with('success', 'История транкзиций очищена');
    }

    public function add(Request $request)
    {
        $amount = $request->input('amount');
        $action = $request->input('action');
        $comment = $request->input('comment');

         // Получаем последнюю запись в базе данных
        $lastRecord = Finace::latest()->first();


        // Проверяем, были ли ранее записи в базе данных
        if ($lastRecord) {
            $totalAmount = $lastRecord->total_amount;

            // Выполняем нужное действие в зависимости от выбранного действия
            if ($action === 'получено') {
                $totalAmount += $amount;
            } elseif ($action === 'отдано') {
                $totalAmount -= $amount;
            }
        } else {
            // Если ранее записей в базе данных не было, устанавливаем значение total_amount равным введенной сумме
            $totalAmount = $amount;
        }


        // Создаем новую запись в базе данных
        $finance = new Finace();
        $finance->amount = $amount;
        $finance->action = $action;
        $finance->comment = $comment;
        $finance->total_amount = $totalAmount;
        $finance->save();

        return redirect()->route('finace.index', ['lastTotalAmount' => $totalAmount]);
    }

    public function preview()
    {
        $finance = Finace::all();

        return view('preview', compact('finance'));
    }

    public function generatePDF(Request $request)
    {
        $finance = Finace::all();
        $lastTotalAmount = $finance->pluck('total_amount')->last();

        $pdf = PDF::loadView('preview', compact('finance', 'lastTotalAmount' ));
        return $pdf->download('отчет по наличным.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Finace  $finace
     * @return \Illuminate\Http\Response
     */
    public function show(Finace $finace)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Finace  $finace
     * @return \Illuminate\Http\Response
     */
    public function edit(Finace $finace)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Finace  $finace
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Finace $finace)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Finace  $finace
     * @return \Illuminate\Http\Response
     */
    public function destroy(Finace $finace)
    {
        //
    }
}
