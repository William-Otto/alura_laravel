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
    return view('welcome');
});

Route::get('/series', [App\Http\Controllers\SeriesController::class, 'index'])->name('list_series');
Route::get('/series/create', [App\Http\Controllers\SeriesController::class, 'create'])->name('create_serie');
Route::post('/series/create', [App\Http\Controllers\SeriesController::class, 'store']);
Route::post('/series/delete/{id}', [App\Http\Controllers\SeriesController::class, 'destroy']);
Route::post('/series/{id}/editName', [App\Http\Controllers\SeriesController::class, 'editName']);

Route::get('/series/{serieId}/seasons', [App\Http\Controllers\SeasonsController::class, 'index']);
Route::get('/seasons/{seasonId}/episodes',[App\Http\Controllers\EpisodesController::class, 'index']);

