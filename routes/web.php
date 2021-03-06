<?php

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

Auth::routes(['register' => false, 'reset' => false]);

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', [App\Http\Controllers\VoiceController::class, 'index'])->name('dashboard');

    Route::resources(['voices' => App\Http\Controllers\VoiceController::class]);
});
