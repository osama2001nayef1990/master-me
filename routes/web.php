<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', function (){
    if (auth()->user()->is_admin) {
        return view('admin.dashboard');
    } else {
        return view('user.dashboard');
    }
})->middleware('auth')->name('home');


Auth::routes();

//Route::get('/home', [LoginController::class, 'redirectTo'])->name('home');
