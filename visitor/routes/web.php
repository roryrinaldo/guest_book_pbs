<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitorController;
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

Route::get('/', [VisitorController::class, 'index'])->name('home');
Route::get('/createTamu', [VisitorController::class, 'create'])->name('createTamu');
Route::post('/storeTamu', [VisitorController::class, 'store'])->name('storeTamu');


Route::prefix('user')->group(function() {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::get('/createVisitor', [UserController::class, 'create'])->name('createVisitor');
        Route::post('/storeVisitor', [UserController::class, 'store'])->name('storeVisitor');
        Route::get('/editVisitor/{id}', [UserController::class, 'edit'])->name('editVisitor');
        Route::post('/updateVisitor/{id}', [UserController::class, 'update'])->name('updateVisitor');
        Route::get('/deleteVisitor/{id}', [UserController::class, 'delete'])->name('deleteVisitor');

        Route::get('/managementUser', [UserController::class, 'managementUser'])->name('managementUser');
        Route::get('/createUser', [UserController::class, 'createUser'])->name('createUser');
        Route::post('/storeUser', [UserController::class, 'storeUser'])->name('storeUser');
        Route::get('/editUser/{id}', [UserController::class, 'editUser'])->name('editUser');
        Route::post('/updateUser/{id}', [UserController::class, 'updateUser'])->name('updateUser');
        Route::get('/deleteUser/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');
    });
});