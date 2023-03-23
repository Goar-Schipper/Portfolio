<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route:: resource('projects', \App\Http\Controllers\ProjectController::class);

Route:: resource('categories', \App\Http\Controllers\CatergoryController::class);

Route::get('/contact', function () {
    return view('contact');
})->name('contact.index');

Route::post('/contact',[\App\Http\Controllers\ContactController::class, 'create'])->name('contact.create');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::delete('/dashboard/contact/{id}', [\App\Http\Controllers\Admin\ContactController::class, 'destroy'])->name('dashboard.contact.destroy');





Route::get('/dashboard/contact', [\App\Http\Controllers\Admin\ContactController::class, 'index'])->name('dashboard.contact.index');








Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
