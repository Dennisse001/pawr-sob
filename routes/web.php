<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EditUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    //profile admin
    Route::get('/admin/profile', [AdminController::class, 'admindashboard'])->name('dash.admin');
    Route::post('/admin/profile/store', [AdminController::class, 'adminprofilestore'])->name('profile.admin.store');

    //user
    Route::get('/user-list', [EditUserController::class, 'showUser'])->name('showsuser');
    Route::get('/user/edit/{id}', [EditUserController::class, 'edituser'])->name('edituser');
    Route::post('/user/update/{id}', [EditUserController::class, 'updateuser'])->name('updateuser');
    Route::get('/admin/user/hapus/{id}', [EditUserController::class, 'hapususer'])->name('hapususer');

});
