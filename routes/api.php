<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostUserController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Admin\PostLogistController;
use App\Http\Controllers\Admin\PostLogistStatusController;
use App\Http\Controllers\Admin\LogisticaController;
use App\Http\Controllers\Admin\TgUsController;
use App\Http\Controllers\Admin\PostPriceScaffoldingController;
use App\Http\Controllers\Admin\PostPriceToursController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// авторизация для мобильного приложения
Route::post('/av-register', [PostUserController::class, 'register']);
Route::post('/login-stock', [PostUserController::class, 'login']);

//отправка данных пользователя из бота
Route::post('/tg_user', [TgUsController::class, 'store']);
Route::get('/price_scaff', [PostPriceScaffoldingController::class, 'PriceLesabot']);
Route::get('/price_tours', [PostPriceToursController::class, 'PriceToursBot']);



Route::middleware('auth:sanctum')->group(function () {
    // Действия, которые требуют аутентификации пользователя
    Route::post('/logout', [PostUserController::class, 'logout']);
    Route::put('/stock/{id}', [StockController::class, 'updateApi']);
    Route::get('/users', [PostUserController::class, 'users']);
    Route::post('/stock-post', [StockController::class, 'store']);
    Route::post('/logist', [LogisticaController::class, 'saveLocation']);
    Route::post('/updatelogist/{id}', [LogisticaController::class, 'updateLocation']);
    Route::post('/logiststatus', [PostLogistStatusController::class,'updateStatusLogist'])->name('updateStatusLogist');
});


