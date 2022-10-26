<?php

use Illuminate\Support\Facades\Route;
use  Illuminate\Http\Request;
use App\Http\Controllers\chatController;
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

Auth::routes();
#### routes for friendshp request ######3
Route::post('/addfriend',[App\Http\Controllers\freindshipController::class,'add_friend'])->name('addFriend');
Route::get('/accaepRequest/{id}',[App\Http\Controllers\freindshipController::class,'accaepRequest'])->name('accaepRequest');
Route::get('/deleteRequest/{id}',[App\Http\Controllers\freindshipController::class,'deleteRequest'])->name('deleteRequest');


#######################################################3
## routes for chat ############3
Route::get('/chat/page/{id}',[chatController::class,'index'])->name('chat');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
