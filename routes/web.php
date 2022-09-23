<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AppointmentTypeController;
use App\Http\Controllers\AuthController;
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

Route::get('/install', [InstallController::class, 'install'])->name('install');
Route::get('/license', [InstallController::class, 'license'])->name('license');
Route::post('/license/verify', [InstallController::class, 'verifyLicense'])->name('license.verify');
Route::get('/license/get', [InstallController::class, 'getSerialCode'])->name('license.getSerialCode');
Route::post('/license/make', [InstallController::class, 'makeSerialCodeLicense'])->name('license.makeSerialCodeLicense');


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [
            // localization middlewares
            'localeSessionRedirect', 'localizationRedirect', 'localeViewPath',
           // install check
           'installed',
           // licensed check
           'licensed',
            // share settings values middleware
            'settings',

        ]
    ],
    function () {
        Route::view('login', 'auth.login-v2')->name('login')->middleware('guest');
        Route::post('login', [AuthController::class, 'login'])->name('login')->middleware('guest');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

        Route::middleware('auth')->group(function () {

            Route::get('/home', [HomeController::class, 'index'])->name('home');
            Route::get('/', [HomeController::class, 'index']);

            Route::get('appointments', [AppointmentController::class, 'index'])->name('appointments.index');
            Route::get('appointment-types', [AppointmentTypeController::class, 'index'])->name('appointment-types.index');
            Route::get('drugs', [DrugController::class, 'index'])->name('drugs.index');
            Route::get('rays', [RayController::class, 'index'])->name('rays.index');
            Route::get('tests', [TestController::class, 'index'])->name('tests.index');
            Route::get('recipes', [RecipeController::class, 'index'])->name('recipes.index');
            Route::get('users', [UserController::class, 'index'])->name('users.index');
            Route::get('patients', [PatientController::class, 'index'])->name('patients.index');
            Route::get('diseases', [DiseaseController::class, 'index'])->name('diseases.index');
            Route::get('instructions', [InstructionsController::class, 'index'])->name('instructions.index');


            Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
            Route::get('patients/{patient}', [PatientController::class, 'show'])->name('patients.show');

            // appointments
            Route::get('appointments/today', [AppointmentController::class, 'today'])->name('appointments.today');
            Route::get('appointments/yesterday', [AppointmentController::class, 'yesterday'])->name('appointments.yesterday');
            Route::get('appointments/next', [AppointmentController::class, 'next'])->name('appointments.next');
            Route::get('appointments/exited', [AppointmentController::class, 'exited'])->name('appointments.exited');
            Route::get('appointments/current', [AppointmentController::class, 'current'])->name('appointments.current');
            Route::get('appointments/{appointment}', [AppointmentController::class, 'show'])->name('appointments.show');


            // profile
            Route::get('profile', [ProfileController::class, 'index'])->name('profile');
            // settings
            Route::get('settings', [SettingController::class, 'index'])->name('settings');
        });
    }
);
