<?php

use  App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\MainScreenController;
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
    return redirect()->route('login');
});
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/store', [LoginController::class, 'store']);
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/',[MainScreenController::class,'index'])->name('admin');
        Route::prefix('dealer')->group(function () {
            Route::get('list', [DealerController::class, 'index'])->name('dealer');
            Route::get('getList', [DealerController::class, 'getList']);
            Route::DELETE('delete', [DealerController::class, 'delete']);
            Route::get('add', [DealerController::class, 'create']);
            Route::post('add/store', [DealerController::class, 'store']);
            Route::get('edit/{sinhvien}', [DealerController::class, 'edit']);
            Route::post('edit/{sinhvien}', [DealerController::class, 'postedit']);
        });
    });
});
