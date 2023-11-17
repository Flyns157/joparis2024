<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TacheController;
use App\Http\Controllers\SportController;
use App\Models\Sport;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/taches', [TacheController::class,'index'])->name('taches.index');
Route::get('/sports', [SportController::class,'index'])->name('sports.index');