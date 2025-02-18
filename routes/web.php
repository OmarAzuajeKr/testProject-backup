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

/* Route::get('/portafolio', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/portafolio/crear', [ProjectController::class, 'create'])->name('projects.create');
Route::get('/portafolio/{project}/editar', [ProjectController::class, 'edit'])->name('projects.edit');
Route::patch('/portafolio/{project}', [ProjectController::class, 'update'])->name('projects.update');
Route::post('/portafolio', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/portafolio/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::delete('/portafolio/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
*/


// Ruta para restaurar proyectos
Route::patch('projects/{project}/restore', [ProjectController::class, 'restore'])->name('projects.restore');

// Ruta para eliminar permanentemente proyectos
Route::delete('projects/{project}/forceDelete', [ProjectController::class, 'forceDelete'])->name('projects.forceDelete');


Route::get('categorias/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::view('/contact', 'contact')->name('contact')
    ->middleware('auth');

Route::post('contact', [MessagesController::class, 'store'])->name('contact');
Auth::routes();