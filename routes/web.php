<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AppointmentTypeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstallController;
use App\Http\Controllers\InstructionsController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RayController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Helpers\Utils;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

// Route::get('/test', function(){
//     return response()->json($roles , 200 , [] , JSON_UNESCAPED_UNICODE);
// });

Route::get('/install', [InstallController::class, 'install'])->name('install');
Route::get('/license', [InstallController::class, 'license'])->name('license');
Route::post('/license/verify', [InstallController::class, 'verifyLicense'])->name('license.verify');
Route::get('/license/get', [InstallController::class, 'getSerialCode'])->name('license.getSerialCode');
Route::post('/license/make', [InstallController::class, 'makeSerialCodeLicense'])->name('license.makeSerialCodeLicense');

Route::get('/cache/clear', function () {
    $output = "";
    Artisan::call('cache:clear');
    $output .= "<br/>";
    $output .= Artisan::output();
    Artisan::call('view:clear');
    $output .= "<br/>";
    $output .= Artisan::output();
    Artisan::call('route:clear');
    $output .= "<br/>";
    $output .= Artisan::output();
    Artisan::call('config:clear');
    $output .= "<br/>";
    $output .= Artisan::output();

    return view('cache.clear' , compact('output'));
})->name("clear-cache");

Route::resource('backup', BackupController::class)->except(['edit', 'update', 'store']);
Route::get('/backup/restore/{name}', [BackupController::class, 'restore'])->name('backup.restore');

Route::view('/help', 'home.help')->name('help');
Route::view('/copyright', 'home.copyright')->name('copyright');


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [
            // localization middlewares
            'localeSessionRedirect', 'localizationRedirect', 'localeViewPath',
            // install check
            'installed',
            // licensed check
            //    'licensed',
            // share settings values middleware
            'settings',

        ]
    ],
    function () {
        Route::view('login', 'auth.login-v2')->name('login')->middleware('guest');
        Route::post('login', [AuthController::class, 'login'])->name('login')->middleware('guest');
        Route::get('demo-login', [AuthController::class, 'demoLogin'])->name('demoLogin')->middleware('guest');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

        Route::middleware('auth')->group(function () {

            Route::get('/home', [HomeController::class, 'index'])->name('home');
            Route::get('/', [HomeController::class, 'index']);
            Route::get('/search', [HomeController::class, 'search'])->name('search');

            Route::get('instructions', [InstructionsController::class, 'index'])->name('instructions.index');


            // appointments
            Route::get('appointments/today', [AppointmentController::class, 'today'])->name('appointments.today');
            Route::get('appointments/yesterday', [AppointmentController::class, 'yesterday'])->name('appointments.yesterday');
            Route::get('appointments/next', [AppointmentController::class, 'next'])->name('appointments.next');
            Route::get('appointments/exited', [AppointmentController::class, 'exited'])->name('appointments.exited');
            Route::get('appointments/current', [AppointmentController::class, 'current'])->name('appointments.current');
            Route::get('appointments/date/{date}', [AppointmentController::class, 'date'])->name('appointments.date');

            // profile
            Route::get('profile', [ProfileController::class, 'index'])->name('profile');
            Route::post('profile/password/update', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
            Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
            // settings
            Route::get('/settings', [SettingController::class, 'index'])->name('settings');
            Route::get('/settings/recipe-design', [SettingController::class, 'recipeDesign'])->name('settings.recipe-design');


            // resources
            Route::resource('users', UserController::class);
            Route::put('users/{user}/update/roles', [UserController::class, 'updateRoles'])->name('users.update-roles');

            Route::resource('patients', PatientController::class)->except(['create', 'store']);
            Route::resource('diseases', DiseaseController::class)->except(['create', 'store']);
            Route::resource('recipes', RecipeController::class)->only(['index', 'show', 'destroy']);
            Route::resource('appointments', AppointmentController::class)->except(['create', 'store']);
            Route::resource('appointment-types', AppointmentTypeController::class)->except(['create', 'store']);
            Route::resource('drugs', DrugController::class)->except(['create', 'store']);
            Route::resource('rays', RayController::class)->except(['create', 'store']);
            Route::resource('tests', TestController::class)->except(['create', 'store']);

            Route::get("/print/{appointment}/{printable}" , [AppointmentController::class , "print"])->name("print");

        });
    }
);
