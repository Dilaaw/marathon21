<?php

use App\Http\Controllers\ListeController;
use App\Http\Controllers\SerieController;
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

/*
Route::any('/', function () {
    return view('welcome');
});*/
Route::any('/', [SerieController::class, 'getRecent'])->name('welcome');

Route::any('/serie/{id}', [SerieController::class,'getSerie']);

Route::get("/login", function () {
    return view('auth/login');
})->name('login');

Route::get("/register", function () {
    return view('auth/register');
})->name('register');

Route::get("/profil", [\App\Http\Controllers\UserController::class, 'index'])->name('profil');

Route::get("/liste",[ListeController::class, 'getListe'])->name('liste');

Route::fallback(function () {
    return view('404');
});