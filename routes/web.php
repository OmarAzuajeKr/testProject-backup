<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');

Route::resource('portafolio', ProjectController::class)
    ->parameters(['portafolio' => 'project'])
    ->names('projects')
    ->middleware('auth');

Route::patch('projects/{project}/restore', [ProjectController::class, 'restore'])->name('projects.restore');

Route::delete('projects/{project}/forceDelete', [ProjectController::class, 'forceDelete'])->name('projects.forceDelete');

Route::get('projects/deleted', [ProjectController::class, 'deletedList'])->name('projects.deleteList');

Route::get('projects/{project}/preview', [ProjectController::class, 'showPreview'])->name('projects.showPreview');


Route::get('categorias/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::view('/contact', 'contact')->name('contact')
    ->middleware('auth');

Route::post('contact', [MessagesController::class, 'store'])->name('contact');
Auth::routes();