<?php

use App\Http\Controllers\AnniversaryDealerController;
use  App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\MainScreenController;
use App\Http\Controllers\OtherContactController;
use App\Http\Controllers\UserMgt\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupDealerController;
use App\Http\Controllers\GroupDetailDealerController;
use App\Http\Controllers\OrderController;

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
Route::get('/signout', [LoginController::class, 'signout'])->name('logout');


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
        Route::prefix('otherContact')->group(function () {
            // Route::get('getList',[OtherContactController::class,'getList']);
            Route::get('add/{dealer}',[OtherContactController::class,'create']);
            Route::post('add/store',[OtherContactController::class,'store']);
            Route::get('edit/{otherContact}', [OtherContactController::class, 'edit']);
            Route::post('edit/{otherContact}', [OtherContactController::class, 'postedit']);
            Route::DELETE('delete', [OtherContactController::class, 'delete']);
        });
        Route::prefix('anniversary')->group(function(){
            Route::get('add/{dealer}',[AnniversaryDealerController::class,'create']);
            Route::get('add/{dealer}',[AnniversaryDealerController::class,'create']);
            Route::post('add/store',[AnniversaryDealerController::class,'store']);
            Route::get('edit/{anniversary}', [AnniversaryDealerController::class, 'edit']);
            Route::post('edit/{anniversary}', [AnniversaryDealerController::class, 'postedit']);
            Route::DELETE('delete', [AnniversaryDealerController::class, 'delete']);
        });
        Route::middleware(['atz.admin'])->prefix('users')->group(function () {
            Route::get('list',[UserController::class, 'index'])->name('users.list');
            Route::get('create',[UserController::class, 'create'])->name('users.create');
            Route::post('store',[UserController::class, 'store'])->name('users.store');
            Route::get('/{id}',[UserController::class, 'show'])->name('users.detail');
            Route::patch('edit/{id}',[UserController::class, 'edit'])->name('users.edit');
            Route::delete('delete/{id}',[UserController::class, 'delete'])->name('users.delete');
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
        Route::prefix('order')->group(function(){
            Route::get('list',[OrderController::class,'index'])->name('order');
            Route::get('select',[OrderController::class,'selectDealer'])->name('order.select');
            Route::get('add/{id}',[OrderController::class,'add'])->name('order.add');
            Route::post('add/store',[OrderController::class,'store'])->name('order.store');
            Route::get('edit/{orderid}',[OrderController::class, 'edit'])->name('order.edit');
            Route::patch('update',[OrderController::class, 'update'])->name('order.update');
            Route::delete('delete/{id}',[OrderController::class,'delete'])->name('order.delete');
        });
    });
});
