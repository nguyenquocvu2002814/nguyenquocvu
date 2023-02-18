<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
//

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('/add', [HomeController::class, 'create'])->name('add.product');
Route::post('/store', [HomeController::class, 'store'])->name('store.product');
Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('edit.product');
Route::put('/update/{id}', [HomeController::class, 'update'])->name('update.product');
Route::get('/destroy/{id}', [HomeController::class, 'destroy'])->name('delete.product');
