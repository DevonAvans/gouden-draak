<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CashRegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware('IsRole:admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users.index');

    Route::get('/admin/user/create', [AdminController::class, 'userCreate'])->name('admin.user.create');
    Route::post('/admin/user/create', [AdminController::class, 'userStore'])->name('admin.user.store');

    Route::get('/admin/user/{user}/edit', [AdminController::class, 'userEdit'])->name('admin.user.edit');
    Route::put('/admin/user/{user}/edit', [AdminController::class, 'userUpdate'])->name('admin.user.update');

    Route::get('/admin/user/{user}/delete', [AdminController::class, 'userDelete'])->name('admin.user.delete');
});

Route::middleware('IsRole:admin,cash register')->group(function () {
    Route::get('/cashregister', [CashRegisterController::class, 'index'])->name('cashregister.index');
});
Route::put('/menu/{dish}/edit', [MenuController::class, 'update'])->name('menu.update');
Route::get('/menu/{dish}/edit', [MenuController::class, 'edit'])->name('menu.edit');
Route::get('/downloadPDF', [MenuController::class, 'downloadPDF'])->name('pdf');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
