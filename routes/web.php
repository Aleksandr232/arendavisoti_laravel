<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PostImgToursController;
use App\Http\Controllers\Admin\PostScaffoldingController;
use App\Http\Controllers\Admin\PostTexnicaController;
use App\Http\Controllers\Admin\PostTractorController;
use App\Http\Controllers\Admin\SnowController;
use App\Http\Controllers\Admin\WarehouseController;
use App\Http\Controllers\Admin\PostContactController;
use App\Http\Controllers\Admin\StaisticaController;
use App\Http\Controllers\Admin\SendContractsController;
use App\Http\Controllers\Admin\PostTgController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PostOrderController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Admin\PostUserController;
use App\Http\Controllers\Admin\PostWatsaapController;
use App\Http\Controllers\Admin\PostEmployeesController;
use App\Http\Controllers\Admin\PostPriceScaffoldingController;
use App\Http\Controllers\Admin\PostPriceToursController;
use App\Http\Controllers\Admin\WordDocumentcontroller;
use App\Http\Controllers\Admin\CustomerBaseController;
use App\Http\Controllers\Admin\CustmerBaseToursController;
use App\Http\Controllers\Admin\LogisticaController;
use App\Http\Controllers\Admin\PostLogistController;
use App\Http\Controllers\Admin\PostLogistStatusController;
use App\Http\Controllers\Admin\FinaceController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\PostPriceFileController;
use App\Http\Controllers\Admin\PostVisitController;
use App\Http\Controllers\Admin\TgUsController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\PostBlogController;
use App\Http\Controllers\Admin\ActiveRunningString;
use App\Http\Controllers\Director\DirectorController;
use App\Http\Controllers\Director\StatController;
use App\Http\Controllers\Director\StaffController;
use App\Http\Controllers\Director\SendContractsDirectorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostNewsController;
use App\Http\Controllers\OrderTgController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/вышки-туры', [PageController::class, 'towers_tour'])->name('towers_tour');
Route::get('/техника', [PageController::class, 'technics'])->name('technics');
Route::get('/строительные-леса', [PageController::class, 'scaffolding'])->name('scaffolding');
Route::get('/уборка-снега-с-крыш', [PageController::class, 'snow_removal'])->name('snow_removal');
Route::get('/галерея', [PageController::class, 'gallery'])->name('gallery');
Route::get('/галерея-вышек-тур', [PageController::class, 'gallery_tower'])->name('gallery_tower');
Route::get('/галерея-строительных-лесов', [PageController::class, 'gallery_scaffolding'])->name('gallery_scaffolding');
Route::get('/галерея-техника', [PageController::class, 'gallery_technics'])->name('gallery_technics');
Route::get('/галерея-уборка-снега', [PageController::class, 'gallery_snow_removal'])->name('gallery_snow_removal');
Route::get('/галерея-складов', [PageController::class, 'gallery_warehouse'])->name('gallery_warehouse');
Route::get('/минитрактор', [PageController::class, 'technics_bars'])->name('technics_bars');
Route::get('/галерея-минитрактор', [PageController::class, 'gallery_technics_bars'])->name('gallery_technics_bars');
Route::get('/наши-контакты', [PageController::class, 'contacts'])->name('contacts');
Route::get('/статьи', [PageController::class, 'posts'])->name('posts');
Route::get('/блог', [PageController::class, 'blog'])->name('blog');
Route::get('/блог/{id}', [PageController::class, 'blogid'])->name('blogid');
Route::get('/update-sitemap', [SitemapController::class, 'update']);
Route::post('/письмо-отправлено', [MailController::class, 'send'])->name('send');
Route::post('/заказ-отправлен', [OrderTgController::class, 'sendOrder'])->name('sendOrder');
Route::get('/parser', [ParserController::class, 'parse']);
Route::get('/ip', function () {
    $ip = $_SERVER['REMOTE_ADDR'];
    $data = \Location::get($ip);
    dd($data);
});


Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/',  [AdminController::class, 'index'])->name('admin');
    Route::resource('/posts', PostController::class);
    Route::resource('/postsimgtours', PostImgToursController::class);
    Route::resource('/postscaff', PostScaffoldingController::class);
    Route::resource('/poststexnica', PostTexnicaController::class);
    Route::resource('/poststractor', PostTractorController::class);
    Route::resource('/postssnow', SnowController::class);
    Route::resource('/postswarehouse', WarehouseController::class);
    Route::resource('/contacts', AdminContactController::class);
    Route::resource('/contracts', SendContractsController::class);
    Route::resource('/posttg', PostTgController::class);
    Route::resource('/statistics', StatusController::class);
    Route::resource('/orders', OrderController::class);
    Route::resource('/documents', DocumentController::class);
    Route::resource('/postsblog', PostBlogController::class);
    Route::get('/seo/{id}', [PostBlogController::class, 'seo'])->name('seo');
    Route::post('/seo-post/{id}', [PostBlogController::class, 'post_seo'])->name('post_seo');
    Route::resource('/stocks', StockController::class);
    Route::get('/stockslesa', [StockController::class, 'index1'])->name('index1');
    Route::get('/stockstours', [StockController::class, 'index2'])->name('index2');
    Route::resource('/postswats', PostWatsaapController::class);
    Route::resource('/employees', PostEmployeesController::class);
    Route::resource('/pricescaff', PostPriceScaffoldingController::class);
    Route::resource('/pricetours', PostPriceToursController::class);
    Route::resource('/postpricefile', PostPriceFileController::class);
    Route::resource('/words', WordDocumentcontroller::class);
    Route::resource('/customerbase', CustomerBaseController::class);
    Route::get('/customer/{id}', [CustomerBaseController::class, 'info'])->name('info');
    Route::post('/customer-info/{id}', [CustomerBaseController::class, 'info_client'])->name('info_client');
    Route::resource('/customerbasetours', CustmerBaseToursController::class);
    Route::resource('/logistics', LogisticaController::class);
    Route::resource('/finace', FinaceController::class);
    Route::resource('/chat', ChatController::class);
    Route::put('/customerbase/{id}/updateStatus', [CustomerBaseController::class,'updateStatus'])->name('updateStatus');
    Route::put('/customerbase/{id}/updateStatusUnpaid', [CustomerBaseController::class,'updateStatusUnpaid'])->name('updateStatusUnpaid');
    Route::put('/customerbase/{id}/updateStatusClient', [CustomerBaseController::class,'updateStatusClient'])->name('updateStatusClient');
    Route::put('/customerbase/{id}/updateStatusDebtor', [CustomerBaseController::class,'updateStatusDebtor'])->name('updateStatusDebtor');
    Route::put('/customerbase/{id}/updateStatusInfo', [CustomerBaseController::class,'updateStatusInfo'])->name('updateStatusInfo');
    Route::put('/customerbase/{id}/updateStatusRefund', [CustomerBaseController::class,'updateStatusRefund'])->name('updateStatusRefund');
    Route::put('/customerbasetours/{id}/updateStatusTours', [CustmerBaseToursController::class,'updateStatusTours'])->name('updateStatusTours');
    Route::put('/customerbasetours/{id}/updateStatusUnpaidTours', [CustmerBaseToursController::class,'updateStatusUnpaidTours'])->name('updateStatusUnpaidTours');
    Route::put('/customerbasetours/{id}/updateStatusClientTours', [CustmerBaseToursController::class,'updateStatusClientTours'])->name('updateStatusClientTours');
    Route::put('/customerbasetours/{id}/updateStatusDebtorTours', [CustmerBaseToursController::class,'updateStatusDebtorTours'])->name('updateStatusDebtorTours');
    Route::put('/customerbasetours/{id}/updateStatusInfoTours', [CustmerBaseToursController::class,'updateStatusInfoTours'])->name('updateStatusInfoTours');
    Route::put('/customerbasetours/{id}/updateStatusRefundTours', [CustmerBaseToursController::class,'updateStatusRefundTours'])->name('updateStatusRefundTours');

    Route::post('/договор-отправлен', [SendContractsController::class, 'sendEmail'])->name('sendEmail');
    Route::post('/смс-отправлено', [PostTgController::class, 'sendTg'])->name('sendTg');
    Route::post('/message', [ChatController::class, 'sendMessage'])->name('sendMessage');
    Route::post('/watsapp', [PostWatsaapController::class, 'sendWat'])->name('sendWat');
    Route::post('/учет_налички', [FinaceController::class, 'add'])->name('add');
    Route::get('/очистить_историю', [FinaceController::class, 'deleteAll'])->name('deleteAll');
    Route::get('pdf/preview', [FinaceController::class, 'preview'])->name('pdf.preview');
    Route::get('pdf/generate', [FinaceController::class, 'generatePDF'])->name('pdf.generate');
    Route::get('pdf/generate/lesa', [CustomerBaseController::class, 'generatePDFlesa'])->name('pdf.generate.lesa');
    Route::get('act/lesa/{id}', [CustomerBaseController::class, 'wordExport'])->name('wordExport');
    Route::get('pdf/generate/tours', [CustmerBaseToursController::class, 'generatePDFTours'])->name('pdf.generate.Tours');
    Route::get('/active', [ActiveRunningString::class, 'run_string'])->name('run_string');


});


Route::prefix('director')->middleware('director')->group(function () {
    Route::get('/',  [DirectorController::class, 'index'])->name('director');
    Route::resource('/stat', StatController::class);
    Route::resource('/staff', StaffController::class);
    Route::resource('/contracts-director', SendContractsDirectorController::class);
    Route::post('/staff/{id}/update-status', [StaffController::class, 'updateStatusStaff'])->name('staff.updateStatus');

    Route::post('/отправлено-на-почту', [SendContractsDirectorController::class, 'sendEmailDirector'])->name('sendEmailDirector');
});


Route::middleware('guest')->group(function () {
    Route::get('/av-register', [UserController::class, 'create'])->name('register.create');
    Route::post('/av-register', [UserController::class, 'store'])->name('register.store');
    Route::get('/login', [UserController::class, 'loginForm'])->name('login.create');
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::get('/login/google', [UserController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('/google/callback', [UserController::class, 'handleGoogleCallback']);
    Route::get('/vk/auth', [UserController::class, 'redirectToVK'])->name('vk.auth');
    Route::get('/vk/callback', [UserController::class, 'handleVKCallback']);
    Route::get('/login/yandex', [UserController::class,'redirectToYandex'])->name('login.yandex');
    Route::get('/yandex/callback', [UserController::class,'handleYandexCallback']);
});

Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

Route::fallback(function () {
    abort(404);
    abort(500);
});


//api статистика

Route::resource('/contactspost', PostContactController::class); // контакты
Route::resource('/status', StaisticaController::class); // статистика
Route::resource('/orderapi', PostOrderController::class); // корзина с заказыми
Route::resource('/visit', PostVisitController::class); //посещения сайта по городам
Route::get('/month-visit', [PostVisitController::class, 'index2']); //общее посещения сайта по месяцам
Route::get('/status-string', [ActiveRunningString::class, 'index']);

// api заказы из телеграмм бота
Route::post('api/order', [PostOrderController::class, 'store']); // для телеграмм бота
// api новости, пока не используются
Route::get('api/news', [PostNewsController::class, 'index']); // новые api пока не испоьзуются
Route::post('api/newspost', [PostNewsController::class, 'store']);

//api склад для мобильного приложения
/* Route::post('api/stock-post', [StockController::class, 'store']);
Route::post('api/logist', [LogisticaController::class, 'saveLocation']);
Route::post('api/updatelogist/{id}', [LogisticaController::class, 'updateLocation']);
Route::put('api/logiststatus/{id}', [PostLogistStatusController::class,'updateStatusLogist'])->name('updateStatusLogist'); */
Route::resource('/apilogist', PostLogistController::class);
Route::resource('/apilogiststatus', PostLogistStatusController::class);

//api телеграмм для рассылки
Route::resource('/apitg', TgUsController::class);



