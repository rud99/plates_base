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


Route::get('/', function () {
    return view('home', ['users' => \App\Models\User::take(3)->get()]);
});

Auth::routes();

Route::get('/plates', [App\Http\Controllers\PlateController::class, 'index'])->name('plates.index');
Route::get('/plates/{id}/edit', [App\Http\Controllers\PlateController::class, 'edit'])->name('plates.edit');
Route::put('/plates/{id}', [App\Http\Controllers\PlateController::class, 'update'])->name('plates.update');
Route::delete('/plates/{id}', [App\Http\Controllers\PlateController::class, 'destroy'])->name('plates.destroy');
