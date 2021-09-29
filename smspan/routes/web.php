<?php

use App\Http\Controllers\SmsController;
use App\Http\Controllers\SendSMSController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [SmsController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/sendsms', [SendSMSController::class, 'index'])->middleware(['auth'])->name('sendsms');

Route::get('export', [SendSMSController::class, 'export'])->middleware(['auth'])->name('export');
Route::post('import', [SendSMSController::class, 'import'])->middleware(['auth'])->name('import');
Route::any('smsNaoEnviados', [SendSMSController::class, 'smsNaoEnviados'])->middleware(['auth'])->name('smsNaoEnviados');
Route::any('smsNaoEnviadosMulti', [SendSMSController::class, 'smsNaoEnviadosMult'])->middleware(['auth'])->name('smsNaoEnviadosMulti');
Route::any('smsEnviados', [SmsController::class, 'smsEnviados'])->middleware(['auth'])->name('smsEnviados');


require __DIR__.'/auth.php';
