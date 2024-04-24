<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\InternshipOpportunityController;
use Illuminate\Support\Facades\Route;

Route::get('/', [InternshipOpportunityController::class, 'index'])->name('internship.index');
Route::get('/internship/{id}', [InternshipOpportunityController::class, 'show'])->name('internship.show')->middleware('auth');

Route::middleware(['auth'])->group(function () {
Route::get('/create', [InternshipOpportunityController::class, 'create'])->name('internship.create');
Route::post('/internship', [InternshipOpportunityController::class, 'store'])->name('internship.store');
Route::get('/internship/{id}/edit', [InternshipOpportunityController::class, 'edit'])->name('internship.edit');
Route::put('/internship/{id}', [InternshipOpportunityController::class, 'update'])->name('internship.update');
Route::delete('/internship/{id}', [InternshipOpportunityController::class, 'destroy'])->name('internship.destroy');
});

Route::middleware(['guest'])->group(function () {
Route::get('/register/company', [RegisteredUserController::class, 'create'])->name('register.company');
Route::post('/register/company', [RegisteredUserController::class, 'store'])->name('register.store');
});


Route::get('/', [InternshipOpportunityController::class, 'index'])->name('internship.index');
Route::get('/internship/{id}', [InternshipOpportunityController::class, 'show'])->name('internship.show');

Route::get('/create', [InternshipOpportunityController::class, 'create'])->name('internship.create');
Route::post('/internship/store', [InternshipOpportunityController::class, 'store'])->name('internship.store');
Route::get('/internship/{id}/edit', [InternshipOpportunityController::class, 'edit'])->name('internship.edit');
Route::put('/internship/{id}', [InternshipOpportunityController::class, 'update'])->name('internship.update');
Route::delete('/internship/{id}', [InternshipOpportunityController::class, 'destroy'])->name('internship.destroy');


require __DIR__.'/auth.php';
