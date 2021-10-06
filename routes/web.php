<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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
Route::get('/home', function () {
    return view('pages.home.home');
})->name('home');

Route::get('/productList',[ProductController::class,'showList'])->name('productList');
Route::post('/addProduct',[ProductController::class,'listingProduct'])->name('addProduct');
Route::get('/addProduct',[ProductController::class,'allProduct'])->name('addProduct');
Route::get('/productList',[ProductController::class,'productList'])->name('productList');
Route::get('deleteProduct/{id}',[ProductController::class,'deleteProduct'])->name('deleteProduct/{id}');
Route::get('/editProduct/{id}',[ProductController::class,'EditProduct'])->name('editProduct/{id}');
Route::post('/updateProduct',[ProductController::class,'updateProduct'])->name('updateProduct');
