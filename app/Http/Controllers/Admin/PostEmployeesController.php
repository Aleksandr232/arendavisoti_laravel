<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostEmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employees::all();

        return view('admin.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employees.create');
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
            'img' => 'required',
        ],
        [

            'img.required' => 'Загрузите фотографию сотрудника',

        ]);

        if($request -> hasFile('img')){
            $img = $request->file('img');
            $path = Storage::disk('employ')->putFile('employees', $img);

            $file = new Employees;
            $file->img = $img->getClientOriginalName();
            $file->path = $path;
            $file->name = $request->input('name');
            $file->phone = $request->input('phone');
            $file->address = $request->input('address');
            $file->date = $request->input('date');
            $file->save();
        }


        return redirect()->route('employees.index')->with('success', 'Сотрудник добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(Employees $employees)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit(Employees $employees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employees $employees)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Employees::find($id); //находим объект файла в базе данных по id
        if(!$file) return false; //если запись о файле в базе данных не найдена, возвращаем false
        Storage::disk('employ')->delete($file->path);//удаляем файл с диска
        $file->delete(); //удаляем запись о файле из базы данных
        return redirect()->route('employees.index')->with('success', 'Сотрудник удален');
    }
}
