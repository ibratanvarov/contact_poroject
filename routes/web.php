<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ContactController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PhoneController;
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

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/contacts/store', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/contacts/edit/{id}',[ContactController::class,'edit'])->name('contacts.edit');
Route::put('/contacts/update/{id}',[ContactController::class,'update'])->name('contacts.update');
Route::delete('/contacts/destroy/{id}', [ContactController::class, 'delete'])->name('contacts.destroy');
Route::get('/contacts/show/{id}', [ContactController::class, 'show'])->name('contacts.show');


Route::get('/emails/edit/{id}',[EmailController::class,'edit'])->name('emails.edit');
Route::get('/emails/create/{id}', [EmailController::class, 'create'])->name('emails.create');
Route::post('/emails/store{id}', [EmailController::class, 'store'])->name('emails.store');
Route::put('/emails/update/{id}',[EmailController::class,'update'])->name('emails.update');
Route::delete('/emails/destroy/{id}', [EmailController::class, 'delete'])->name('emails.destroy');

Route::get('/phones/edit/{id}',[PhoneController::class,'edit'])->name('phones.edit');
Route::get('/phones/create/{id}', [PhoneController::class, 'create'])->name('phones.create');
Route::post('/phones/store{id}', [PhoneController::class, 'store'])->name('phones.store');
Route::put('/phones/update/{id}',[PhoneController::class,'update'])->name('phones.update');
Route::delete('/phones/destroy/{id}', [PhoneController::class, 'delete'])->name('phones.destroy');
