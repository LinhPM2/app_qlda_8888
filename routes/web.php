<?php

use  App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\MainScreenController;
use App\Http\Controllers\UserMgt\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupDealerController;
use App\Http\Controllers\GroupDetailDealerController;

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

Route::get('/', fn () => redirect()->route('login'));
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/store', [LoginController::class, 'store']);


Route::middleware(['auth', 'auth.basic'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [MainScreenController::class, 'index'])->name('admin');
        Route::prefix('dealer')->group(function () {
            Route::get('list', [DealerController::class, 'index'])->name('dealer');
            Route::get('getList', [DealerController::class, 'getList']);
            Route::DELETE('delete', [DealerController::class, 'delete']);
            Route::get('add', [DealerController::class, 'create']);
            Route::post('add/store', [DealerController::class, 'store']);
            Route::get('edit/{dealer}', [DealerController::class, 'edit']);
            Route::post('edit/{dealer}', [DealerController::class, 'postedit']);
        });
        Route::middleware(['atz.admin'])->prefix('users')->group(function () {
            Route::get('list',[UserController::class, 'index'])->name('users.list');
            Route::get('user/{id}',[UserController::class, 'show'])->name('users.detail');
            Route::put('edit',[UserController::class, 'edit'])->name('users.edit');
            Route::delete('delete',[UserController::class, 'delete'])->name('users.delete');
            Route::post('create',[UserController::class, 'create'])->name('users.create');
        });
        Route::prefix('group')->group(function(){
            Route::get('list',[GroupDealerController::class,'index'])->name('group');
            Route::get('add',[GroupDealerController::class,'add']);
            Route::post('add/store',[GroupDealerController::class,'store']);
            Route::get('edit/{groupDealer}',[GroupDealerController::class, 'edit']);
            Route::post('edit/{groupDealer}',[GroupDealerController::class, 'postedit']);
            Route::delete('delete',[GroupDealerController::class,'delete']);
        });
        Route::prefix('groupdetail')->group(function(){
            Route::get('detail/{groupDealer}',[GroupDetailDealerController::class, 'detail']);
            Route::get('add/{groupID}',[GroupDetailDealerController::class,'add'])->name('gd.add');
            Route::post('add/store',[GroupDetailDealerController::class,'store'])->name('gd.store');
            Route::delete('delete',[GroupDetailDealerController::class,'delete']);
        });
    });
});
