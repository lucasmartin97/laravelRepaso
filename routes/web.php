<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('index');

// Otra forma de hacerlo.
// Route::view('/', 'welcome')->name('index');
Route::view('/contacto', 'contact')->name('contact');

// Login a mano
Route::view('/login', 'login')->name('login');
Route::post('/login', function(){
    $credentials = request()->only('email', 'password');
    if(Auth::attempt($credentials)){
        request()->session()->regenerate(); // Regeneramos el token de sesion para evitar vulnerabilidad.
        return to_route('posts.index');
    }
    return to_route('login');
});

// Posts
Route::get('/blog', [PostController::class, 'index'])->name('posts.index');
Route::get('/blog/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/blog', [PostController::class, 'store'])->name('posts.store');
Route::get('/blog/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/blog/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
// Utilizamos patch o put para editar elementos. PUT para reemplazar y patch para actualizar.
Route::patch('/blog/{post}', [PostController::class, 'update'])->name('posts.update');
// Utilizamos delete para eliminar un elemento.
Route::delete('/blog/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::view('/about', 'about')->name('about');
