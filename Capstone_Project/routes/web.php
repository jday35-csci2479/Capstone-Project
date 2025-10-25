<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Forums routes

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

require __DIR__.'/auth.php';
