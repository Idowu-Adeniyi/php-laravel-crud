<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get(
    'students/trash/{id}',
    [StudentController::class, 'trash']
)->name('students.trash');


Route::get(
    'students/trashed',
    [StudentController::class, 'trashed']
)->name('students.trashed');

Route::get(
    'students/restore/{id}',
    [StudentController::class, 'restore']
)->name('students.restore');

Route::resource('students',StudentController::class)->middleware('auth');

Route::get(
    'students/destroy/{id}',
    [StudentController::class, 'destroy']
)->name('students.destroy');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
