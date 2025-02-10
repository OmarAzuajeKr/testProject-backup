<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ProjectController;

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');

Route::get('/portafolio', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/portafolio/crear', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/portafolio', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/portafolio/{project}', [ProjectController::class, 'show'])->name('projects.show');





Route::view('/contact', 'contact')->name('contact');

Route::post('contact', [MessagesController::class, 'store'])->name('contact');