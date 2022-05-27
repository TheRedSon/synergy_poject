<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OptionsController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\HomeController;
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
    return redirect(route('client.home'));
});

Route::name('client.')->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
    Route::post('/home/{id}', [HomeController::class, 'upload'])->name('img-upload');

    Route::get('/login', function (){
        if(Auth::check()){
            return redirect(route('client.home'));
        }
        return view('login');
    })->name('login');

    Route::post('/login', [LoginController::class, 'login'])->name('login-post');

    Route::get('/register', function(){
        if(Auth::check()){
            return redirect(route('client.home'));
        }
        return view('register');
    })->name('register');

    Route::post('/register', [RegisterController::class, 'registration'])->name('register-post');

    Route::get('/report', [ReportController::class, 'index'])->name('report');
    Route::post('/report', [ReportController::class, 'report'])->name('report-post');

    Route::get('/options', [OptionsController::class, 'index'])->name('options');
    Route::post('/options/{id}', [OptionsController::class, 'update'])->name('options-update');

    Route::get('/options/reset', [OptionsController::class, 'index_reset'])->name('options-reset');
    Route::post('/options/reset/{id}', [OptionsController::class, 'reset'])->name('reset');


    Route::post('logout', function (){
        Auth::logout();
        return redirect(route('client.home'));
    })->name('logout');
});
