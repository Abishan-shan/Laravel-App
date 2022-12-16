<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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



Route::get('/child', function () {
    return view('example.child');
});

Route::get('/second', function () {
    return view('example.second');
});



Route::get('/create', function () {
    return view('create');
})->name('create');



Route::post('/store', [ContactController::class,'store'])->name('store');
Route::get('/index', [ContactController::class,'index'])->name('index');
Route::get('/edite/{id}', [ContactController::class,'edit'])->name('edite');
Route::patch('/update/{id}', [ContactController::class,'update'])->name('update');
Route::delete('/delete/{id}', [ContactController::class,'destroy'])->name('delete');
