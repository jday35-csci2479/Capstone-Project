<?php

use App\Http\Controllers\user_profilesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumsController;
use App\Http\Controllers\ProfileController;


// Default home page routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

// Account setting management routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// User Profile routes
Route::middleware('auth')->group(function() {
    Route::get('/user-profile', [user_profilesController::class, 'show'])->name('user-profile.userProfile');
    Route::get('/user-profile/edit', [user_profilesController::class, 'edit'])->name('user-profile.edit');
    Route::patch('/user-profile/update', [user_profilesController::class, 'update'])->name('user-profile.update');
});

// Forums and comments routes

// Forum portal page
Route::get('/forums', function () {
    return view('forums.portal');
})->name('forums');

// Individual forum pages
Route::view('/forums/General Discussion', 'forums.General Discussion')->name('forums.General Discussion');
Route::view('/forums/Homework Help', 'forums.Homework Help')->name('forums.Homework Help');
Route::view('/forums/Off Topic', 'forums.Off Topic')->name('forums.Off Topic');
Route::view('/forums/Support', 'forums.Support')->name('forums.Support');
Route::view('/forums/Introductions', 'forums.Introductions')->name('forums.Introductions');
Route::view('/forums/Events', 'forums.Events')->name('forums.Events');

// Forums CRUD routes
Route::middleware(['auth'])->group(function () {
    Route::get('/forums/create', [ForumsController::class, 'create'])->name('forums.crud.create');
    Route::post('/forums/store', [ForumsController::class, 'store'])->name('forums.crud.store');
    Route::get('/forums/{forum}/edit', [ForumsController::class, 'edit'])->name('forums.crud.edit');
    Route::patch('/forums/{forum}', [ForumsController::class, 'update'])->name('forums.crud.update');
    Route::delete('/forums/{forum}', [ForumsController::class, 'destroy'])->name('forums.crud.destroy');
    Route::get('/forums/search', [ForumsController::class, 'search'])->name('forums.search');
    Route::get('/forums/{forum}', [ForumsController::class, 'show'])->name('forums.crud.show');
});

// Comments routes
Route::middleware('auth')->group(function() {
    Route::post('/forums/{forum}/comments', [\App\Http\Controllers\CommentsController::class, 'store'])
        ->name('forums.comments.store');
    Route::delete('/comments/{comment}', [\App\Http\Controllers\CommentsController::class, 'destroy'])
        ->name('comments.destroy');
});

require __DIR__.'/auth.php';
