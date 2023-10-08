<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doc = Document::all();

        return view ('admin.document.index', compact('doc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.document.create');
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
            'filename' => 'required',
        ],
        [

            'filename.required' => 'Загрузите фотографию статьи',

        ]);

        if($request -> hasFile('filename')){
            $filename = $request->file('filename');
            $path = Storage::disk('document')->putFile('doc', $filename);

            $file = new Document;
            $file->filename = $filename->getClientOriginalName();
            $file->path = $path;
            $file->save();
        }


        return redirect()->route('documents.index')->with('success', 'Файл добавлен');

        /* return back()->withInput()->with('success', 'успех'); */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Document::find($id); //находим объект файла в базе данных по id
        if(!$file) return false; //если запись о файле в базе данных не найдена, возвращаем false
        Storage::disk('document')->delete($file->path);//удаляем файл с диска
        $file->delete(); //удаляем запись о файле из базы данных
        return redirect()->route('documents.index')->with('success', 'Файл удален');
    }
}
