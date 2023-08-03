<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

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

Route::get('/index', function () {
    return view('index');
});
Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/user/form', [UserController::class, 'create'])->name('formCreate');
Route::post('/user/create', [UserController::class, 'store'])->name('userCreate');

Route::post('/user/check', [LoginController::class, 'check'])->name('userCheck');
Route::get('/user/pokemon/{id}', [LoginController::class, 'active'])->name('active');
Route::get('/user/exit', [LoginController::class, 'exit'])->name('exit');

Route::middleware(['auth'])->group(function (){
    Route::get('/pokemon', function () {
        return view('pokemon');
    });
});