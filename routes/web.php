<?php

use App\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TacheController;

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

Route::get('/taches', [TacheController::class, 'index']);
Route::post('/taches', [TacheController::class, 'store']);
Route::get('/taches/modifier/{id}', [TacheController::class, 'edit']);
Route::get('/taches/supprimer/{id}', [TacheController::class, 'destroy']);
Route::get('/taches/miseajour/{id}', [TacheController::class, 'update']);
Route::resource('taches', TacheController::class);
