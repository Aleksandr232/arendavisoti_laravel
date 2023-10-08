<?php

namespace App\Http\Controllers;

use App\Models\Notebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @OA\Get(
 *     path="api/v1/notebook",
 *     tags={"Notebook"},
 *     summary="Получить список записей в записной книжке",
 *     description="Возвращает список всех записей в записной книжке",
 *     @OA\Response(
 *         response=200,
 *         description="Успешная операция"
 *     ),
 * )
 * @OA\Get(
 *     path="api/v1/notebook/{id}",
 *     tags={"Notebook"},
 *     summary="Получить информацию о записи",
 *     description="Возвращает конкретную запись по id",
 *     @OA\Response(
 *         response=200,
 *         description="Успешная операция"
 *     ),
 * )
 *
 * @OA\Post(
 *     path="api/v1/notebook",
 *     tags={"Notebook"},
 *     summary="Создайте новую запись в записной книжке",
 *     description="Создает новую запись в записной книжке",
 *     @OA\Response(
 *         response=201,
 *         description="Запись в записной книжке создана успешно",
 *     ),
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(property="name", type="string"),
 *                 @OA\Property(property="phone", type="string"),
 *                 @OA\Property(property="company", type="string"),
 *                 @OA\Property(property="date", type="string"),
 *                 @OA\Property(property="img", type="string"),
 *                 @OA\Property(property="path", type="string"),
 *             ),
 *         ),
 *     ),
 * )
 * @OA\Put(
 *     path="api/v1/notebook/{id}",
 *     tags={"Notebook"},
 *     summary="Обновите запись в записной книжке",
 *     description="Обновляет сведения о записи в записной книжке",
 *     operationId="Обновить записную книжку",
 *     @OA\Parameter(
 *         name="id",
 *         description="Идентификатор записи в записной книжке для обновления",
 *         required=true,
 *         in="path",
 *         @OA\Schema(
 *             type="integer",
 *         ),
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="name",
 *                     type="string",
 *                     description="Обновленное ФИО",
 *                 ),
 *                 @OA\Property(
 *                     property="phone",
 *                     type="string",
 *                     description="Обновленное номер телефона",
 *                 ),
 *                 @OA\Property(
 *                     property="company",
 *                     type="string",
 *                     description="Обновленное название компании",
 *                 ),
 *                 @OA\Property(
 *                     property="date",
 *                     type="string",
 *                     format="date",
 *                     description="Обновленная дата рождения",
 *                 ),
 *                 @OA\Property(
 *                     property="img",
 *                     type="file",
 *                     description="Обновленное фото",
 *                 ),
 *                  @OA\Property(
 *                     property="path",
 *                     type="file",
 *                     description="Обновленный путь фото",
 *                 )
 *             ),
 *         ),
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="Успешное обновление",
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="message",
 *                     type="string",
 *                     description="Сообщение об успехе",
 *                 ),
 *             ),
 *         ),
 *     ),
 *     @OA\Response(
 *         response="404",
 *         description="Запись в записной книжке не найдена",
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="message",
 *                     type="string",
 *                     description="Сообщение об ошибке",
 *                 ),
 *             ),
 *         ),
 *     ),
 * )
 * @OA\Delete(
 *     path="api/v1/notebook/{id}",
 *     summary="Удалить запись",
 *     description="Удаление записи из базы данных и связанного с ней фото",
 *     tags={"Notebook"},
 *     @OA\Parameter(
 *         name="id",
 *         description="Идентификатор записи",
 *         required=true,
 *         in="path",
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Успешное удаление записи"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Запись не найдена"
 *     )
 * )
 */






class NotebookController extends Controller
{
    public function index()
    {
        $notes = Notebook::all();
        return response()->json($notes);
    }

    public function store(Request $request)
    {
        if($request -> hasFile('img')){
            $img = $request->file('img');
            $path = Storage::disk('notebook')->putFile('img', $img);

            $note = new Notebook;
            $note->img = $img->getClientOriginalName();
            $note->path = $path;
            $note->name = $request->input('name');
            $note->phone = $request->input('phone');
            $note->company = $request->input('company');
            $note->date = $request->input('date');
            $note->save();
        }
        return response()->json(['message' => 'Запись успешно создана'], 201);
    }

    public function show($id)
    {
        $note = Notebook::find($id);
        if ($note) {
            return response()->json(['note' => $note], 200);
        } else {
            return response()->json(['message' => 'Запись не найдена'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $note = Notebook::find($id);
        if ($note) {
            if ($request->hasFile('img')) {
                $img = $request->file('img');
                $path = Storage::disk('notebook')->putFile('img', $img);
                $note->img = $img->getClientOriginalName();
                $note->path = $path;
            }
            $note->name = $request->input('name');
            $note->phone = $request->input('phone');
            $note->company = $request->input('company');
            $note->date = $request->input('date');
            $note->save();
            return response()->json(['message' => 'Запись успешно обновлена'], 200);
        } else {
            return response()->json(['message' => 'Запись не найдена'], 404);
        }
    }

    public function destroy($id)
    {
        $note = Notebook::find($id);
        if ($note) {
            // Удаляем файл из папки
            Storage::disk('notebook')->delete($note->path);

            $note->delete();
            return response()->json(['message' => 'Запись успешно удалена'], 200);
        } else {
            return response()->json(['message' => 'Запись не найдена'], 404);
        }
    }
}
