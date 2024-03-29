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
    Route::get('/invoices', [AppController::class, 'list'])->name('app.invoices');
    Route::get('/invoices/{invoiceId}', [AppController::class, 'show'])->name('app.show');
    Route::get('/download', [\App\Http\Controllers\PDFController::class, 'generatePDF'])->name('app.download');
    Route::get('/new', [AppController::class, 'new'])->name('app.new');
    Route::post('/store', [AppController::class, 'store'])->name('app.store');

    Route::get('/profile', [AppController::class, 'profile'])->name('app.profile');

    Route::get('/contact-form', [AppController::class, 'contactForm'])->name('app.contactForm');

});
