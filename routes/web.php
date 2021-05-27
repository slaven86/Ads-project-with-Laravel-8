<?php

use App\Http\Controllers\AdController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AdController::class, 'index'])->name('welcome');
Route::get('/single-ad/{id}', [AdController::class, 'show'])->name('singleAd');
Route::post('/single-ad/{id}/send-message', [AdController::class, 'sendMessage'])->name('sendMessage');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/add-deposit', [App\Http\Controllers\HomeController::class, 'addDeposit'])->name('home.addDeposit');
Route::get('/home/show-ad-form', [App\Http\Controllers\HomeController::class, 'showAdForm'])->name('home.showAdForm');
Route::get('/home/ad/{id}', [App\Http\Controllers\HomeController::class, 'showSingleAd'])->name('home.singleAd');
Route::get('/home/messages', [App\Http\Controllers\HomeController::class, 'showMessage'])->name('home.showMessages');
Route::get('/home/messages/replay', [App\Http\Controllers\HomeController::class, 'replay'])->name('home.replay');
Route::get('/home/messages/{id}', [App\Http\Controllers\HomeController::class, 'deleteMessage'])->name('home.deleteMessage');


Route::post('/home/add-deposit', [App\Http\Controllers\HomeController::class, 'updateDeposit'])->name('home.addDeposit');
Route::post('/home/save-ad', [App\Http\Controllers\HomeController::class, 'saveAd'])->name('home.saveAd');
Route::post('/home/messages/replay', [App\Http\Controllers\HomeController::class, 'replayStore'])->name('home.replayStore');
