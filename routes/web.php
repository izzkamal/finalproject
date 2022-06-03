<?php

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessagesController;

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

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/about', function () {
    $user = User::find(auth()->user()->id);
    return view('user.about',compact('user'));
})->name('about');


Route::get('/contact', function () {
    $user = User::find(auth()->user()->id);
    return view('user.contact',compact('user'));
})->name('contact');


Route::get('/shop', function () {
    return view('user.shop');
})->name('shop');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('send',[MessagesController::class,'send'])->name('send');

Route::get('profile',[UserController::class,'show'])->name('showProfile');

Route::post('editProfile/{id}',[UserController::class,'edit'])->name('editProfile');

Route::get('purchase',[UserController::class,'indexProducts'])->name('indexProducts');

Route::get('buy/{id}',[UserController::class,'buy'])->name('buy');

Route::get('purchase',[UserController::class,'indexProducts'])->name('indexProducts');



Route::get('admin',[Controller::class,'index'])->name('indexAdmin');
Route::get('addProduct',[Controller::class,'addProduct'])->name('addProduct');
Route::post('addProduct',[Controller::class,'storeProduct'])->name('storeProduct');
Route::get('addCategorie',[Controller::class,'addCategorie'])->name('addCategorie');
Route::post('addCategorie',[Controller::class,'storeCategorie'])->name('storeCategorie');
Route::get('messages',[Controller::class,'messages'])->name('messages');

Route::post('editProduct/{id}',[Controller::class,'editProduct'])->name('editProduct');
Route::get('indexProducts',[Controller::class,'indexProducts'])->name('indexProducts');
Route::post('deleteProduct/{id}',[Controller::class,'deleteProduct'])->name('deleteProduct');
Route::get('editProductPage/{id}',[Controller::class,'editProductPage'])->name('editProductPage');


Route::post('editCategorie/{id}',[Controller::class,'editCategorie'])->name('editCategorie');
Route::post('deleteCategorie/{id}',[Controller::class,'deleteCategorie'])->name('deleteCategorie');
Route::get('editCategoriePage/{id}',[Controller::class,'editCategoriePage'])->name('editCategoriePage');


