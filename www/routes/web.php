<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/app')->group(function (){
    Route::get('/', [AppController::class, 'index'])->name('app.index');
    Route::get('/list', [AppController::class, 'list'])->name('app.list');
    Route::get('/new', [AppController::class, 'new'])->name('app.new');
    Route::post('/test', [AppController::class, 'test'])->name('app.test');

    Route::get('/profile', [AppController::class, 'profile'])->name('app.profile');

    Route::get('/contact-form', [AppController::class, 'contactForm'])->name('app.contactForm');

});
