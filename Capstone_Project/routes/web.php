<?php

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

// Forums and comments routes

// Forum portal page
Route::get('/forums', function () {
    return view('forums.portal');
})->name('forums');

// Individual forum pages
Route::view('/forums/generalDiscussion', 'forums.generalDiscussion')->name('forums.generalDiscussion');
Route::view('/forums/homeworkHelp', 'forums.homeworkHelp')->name('forums.homeworkHelp');
Route::view('/forums/offTopic', 'forums.offTopic')->name('forums.offTopic');
Route::view('/forums/support', 'forums.support')->name('forums.support');
Route::view('/forums/introductions', 'forums.introductions')->name('forums.introductions');
Route::view('/forums/events', 'forums.events')->name('forums.events');


// User Profile routes
Route::middleware('auth')->group(function() {
    Route::get('/user-profile', function() {
        return view('user-profile.edit'); 
    })->name('user-profile.edit');
});

// Forums CRUD routes
Route::middleware(['auth'])->group(function () {
    Route::get('/forums/create', [ForumsController::class, 'create'])->name('forums.crud.create');
    Route::post('/forums/store', [ForumsController::class, 'store'])->name('forums.crud.store');
    Route::get('/forums/{forum}/edit', [ForumsController::class, 'edit'])->name('forums.crud.edit');
    Route::patch('/forums/{forum}', [ForumsController::class, 'update'])->name('forums.crud.update');
    Route::delete('/forums/{forum}', [ForumsController::class, 'destroy'])->name('forums.crud.destroy');
    Route::get('/forums/{forum}', [ForumsController::class, 'show'])->name('forums.crud.show');
});

// Comments routes
Route::middleware('auth')->group(function() {
    Route::post('/forums/{forum}/comments', [\App\Http\Controllers\CommentsController::class, 'store'])
        ->name('forums.comments.store');
});

require __DIR__.'/auth.php';
