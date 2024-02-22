<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RunStr;
use Illuminate\Http\Request;

class ActiveRunningString extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $active = RunStr::all('is_active');

        return response()->json(['active'=>$active]);
    }


    public function run_string(Request $request)
    {
        $active = RunStr::first(); // выбираем первую запись из модели "RunStr"

        if (!$active) {
            $active = new RunStr(); // если записей нет, создаем новый объект модели "RunStr"
        }

        if ($active->is_active) {
            $active->is_active = false;
            $active->save();

            return redirect()->route('admin')->with('err', 'Реклама отключена');

        }

        $active->is_active = true;
        $active->save();

            return redirect()->route('admin')->with('success', 'Реклама включена');

    }

    public function hcaptcha(Request $request)
    {
        $active = RunStr::first();// выбираем первую запись из модели "RunStr"



        if (!$active) {
            $active = new RunStr(); // если записей нет, создаем новый объект модели "RunStr"
        }

        if ($active->is_hcaptcha) {
            $active->is_hcaptcha = false;
            $active->save();

            return redirect()->route('admin')->with('err', 'HCaptcha отключена');

        }elseif($active->is_hcaptcha = true){
            $active->is_hcaptcha = true;
            $active->save();
            return redirect()->route('admin')->with('success', 'HCaptcha включена');
        }


    }

    public function page_technical(Request $request)
    {
        $active = RunStr::first();// выбираем первую запись из модели "RunStr"



        if (!$active) {
            $active = new RunStr(); // если записей нет, создаем новый объект модели "RunStr"
        }

        if ($active->is_technical) {
            $active->is_technical = false;
            $active->save();

            return redirect()->route('admin')->with('success', 'Сайт работает стабильно');

        }elseif($active->is_technical = true){
            $active->is_technical = true;
            $active->save();
            return redirect()->route('admin')->with('err', 'Сайт временно не работает');
        }


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
     * @param  \App\Models\RunStr  $runStr
     * @return \Illuminate\Http\Response
     */
    public function show(RunStr $runStr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RunStr  $runStr
     * @return \Illuminate\Http\Response
     */
    public function edit(RunStr $runStr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RunStr  $runStr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RunStr $runStr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RunStr  $runStr
     * @return \Illuminate\Http\Response
     */
    public function destroy(RunStr $runStr)
    {
        //
    }
}
