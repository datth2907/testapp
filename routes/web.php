<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

Route::get('/welcome', function () {
    return view('welcome');
})->name('wellcome');

// Image Route
Route::get('/', [ImageController::class, 'index'] )->name('image.index');
Route::get('/image/{image:slug}', [ImageController::class, 'show'] )->name('image.show');
Route::get('/image', [ImageController::class, 'create'] )->name('image.create');
Route::post('/image', [ImageController::class, 'store'] )->name('image.store');
Route::get('/image/{image}/edit', [ImageController::class, 'edit'] )->name('image.edit');
Route::put('/image/{image}', [ImageController::class, 'update'] )->name('image.update');
Route::delete('/image/{image}', [ImageController::class, 'destroy'] )->name('image.destroy');

// --------------------------
Route::get('/create',[PostController::class,'create'])->middleware(['auth', 'verified'])->name('create');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/user-data', function() {
    return Auth::user()->name;
});