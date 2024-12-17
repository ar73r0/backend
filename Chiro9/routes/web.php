<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NewsController;

// Route voor logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // Na logout terug naar de homepagina
})->name('logout');



Route::get('/', [App\Http\Controllers\Controller::class, 'index'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'showUsers'])->name('admin.dashboard');
    Route::post('/admin/dashboard/{id}/make-admin', [AdminController::class, 'makeAdmin'])->name('admin.makeAdmin');
    Route::post('/admin/dashboard/{id}/remove-admin', [AdminController::class, 'removeAdmin'])->name('admin.removeAdmin');
    Route::post('/admin/dashboard/create', [AdminController::class, 'createUser'])->name('admin.createUser');
    Route::post('/admin/dashboard/{id}/delete', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
});


Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/edit', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');


Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
});

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');





