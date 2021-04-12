<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

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
    route::get('/hello','App\Http\Controllers\HelloController@index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/chat', [App\Http\Controllers\ChatController::class,'index'])->name('chat');

Route::get('/ajax/chat', [App\Http\Controllers\Ajax\ChatController::class,'index'])->name('ajax/chat'); // メッセージ一覧を取得
Route::post('/ajax/chat', [App\Http\Controllers\Ajax\ChatController::class,'create'])->name('ajax/chat'); // チャット登録
