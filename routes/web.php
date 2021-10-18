<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CrudController;


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
Route::get('register',[IndexController::class,'register']);
Route::post('data',[IndexController::class,'data'])->name('data');

Route::get('crud',[CrudController::class,'create']);
Route::get('cruds',[CrudController::class,'index']);
Route::post('cruds',[CrudController::class,'store'])->name('savedata');
Route::delete('delete/{id}',[CrudController::class,'destroy'])->name('delete');
Route::get('edit/{id}',[CrudController::class,'edit'])->name('editdata');
Route::post('update/{id}',[CrudController::class,'update'])->name('update');



