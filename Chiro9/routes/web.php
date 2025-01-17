<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;

// Route voor logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); 
})->name('logout');



Route::get('/', [App\Http\Controllers\Controller::class, 'index'])->name('welcome');

Auth::routes();


Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    
    Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');

    Route::get('/admin/users', [AdminController::class, 'showUsers'])->name('admin.users');
    
    Route::get('/admin/news', [AdminController::class, 'showNews'])->name('admin.news');

    Route::get('/admin/contact', [AdminController::class, 'showContactForms'])->name('admin.contact');
    
    Route::post('admin/contacts/{contact}/reply', [ContactController::class, 'reply'])->name('admin.contacts.reply');
});


Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/edit', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::post('admin/users/{id}/make-admin', [UserController::class, 'makeAdmin'])->name('users.makeAdmin');
    Route::post('admin/users/{id}/remove-admin', [UserController::class, 'removeAdmin'])->name('users.removeAdmin');
    Route::post('admin/users/create', [UserController::class, 'createUser'])->name('users.createUser');
    Route::post('admin/users/delete/{id}', [UserController::class, 'deleteUser'])->name('users.deleteUser');
});

Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
});


Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/contact', function () {
    return view('contact/form');
})->name('contact');

Route::get('/contact/form', [ContactController::class, 'showForm']);
Route::post('/contact', [ContactController::class, 'submitForm']);

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');



Route::post('/toggle-dark-mode', function () {
    $darkMode = session('dark_mode', false);
    session(['dark_mode' => !$darkMode]); // Toggle the dark mode preference
    return response()->json(['dark_mode' => !$darkMode]);
})->name('toggle-dark-mode');

Route::post('/toggle-dark-mode', function () {
    if (Auth::check()) {
        $user = Auth::user();
        $user->dark_mode = !$user->dark_mode;
        $user->save();
    } else {
        session(['dark_mode' => !session('dark_mode', false)]);
    }
    return response()->json(['dark_mode' => Auth::check() ? Auth::user()->dark_mode : session('dark_mode')]);
})->name('toggle-dark-mode');
