<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
// use App\Http\Controllers\CategoryController;

use App\Http\Controllers\Admin\ContactAdminController;

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

Route::get('/', [ContactController::class, 'index']);

Route::post('/contacts/confirm', [ContactController::class, 'confirm']);

Route::post('/store', [ContactController::class, 'store']);

Route::middleware('auth')->group(
    function () {
        Route::get('/admin', [ContactAdminController::class, 'index']);

        Route::get('/admin/search', [ContactAdminController::class, 'search']);
    }

);


Route::get('/admin/export', [ContactAdminController::class, 'export'])->name('admin.export');

Route::delete('/admin/{id}', [ContactAdminController::class, 'destroy'])->name('admin.destroy');
