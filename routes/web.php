<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');

// companies employees route
Route::middleware(['auth', 'admin'])->group(function () {
  Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
  Route::get('/companies/{id}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
  Route::put('/companies/{id}', [CompanyController::class, 'update'])->name('companies.update');
  Route::delete('/companies/{id}', [CompanyController::class, 'destroy'])->name('companies.destroy');
});


Route::middleware('guest')->group(function () {
  Route::get('/register', [RegisteredUserController::class, 'create']);
  Route::post('/register', [RegisteredUserController::class, 'store']);

  Route::get('/login', [SessionController::class, 'create'])->name('login');
  Route::post('/login', [SessionController::class, 'store']);
});

Route::get('/search', SearchController::class);
Route::get('/tags/{tag:name}', TagController::class);


Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');