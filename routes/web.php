<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ProjectController;

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');

Route::get('/portafolio', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/portafolio/{id}', [ProjectController::class, 'show'])->name('projects.show');



Route::view('/contact', 'contact')->name('contact');

Route::post('contact', [MessagesController::class, 'store'])->name('contact');