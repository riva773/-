<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\AuthItemsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\OrdersController;
use Illuminate\Support\Facades\Auth;


Route::get('/item/{item_id}', [ItemsController::class, 'show'])->name('show');


Route::get('/', [ItemsController::class, 'index'])->name('/');

Route::post('/search', [ItemsController::class, 'search'])->name('search');

Route::middleware('auth')->group(function () {
    Route::post('/like', [LikesController::class, 'store'])->name('like');
    Route::post('/unlike', [LikesController::class, 'destroy'])->name('unlike');
    Route::post('/comment', [CommentsController::class, 'store'])->name('comment');
    Route::get('/purchase/{item_id}', [PurchaseController::class, 'create'])->name('purchase.create');

    //送付先住所変更
    Route::get(
        '/purchase/address/{item_id}',
        [PurchaseController::class, 'editShippingAddress']
    )->name('edit_shipping_address');
    Route::post('/purchase/address/{item_id}', [PurchaseController::class, 'updateShippingAddress'])->name('edit_shipping_address');

    //商品購入
    Route::post('/store/{item_id}', [OrdersController::class, 'store'])->name('orders.store');

    //プロフィール設定&編集
    Route::get('/mypage/profile', [UserController::class, 'edit_profile'])->name('edit_profile');
    Route::post('/update_profile', [UserController::class, 'update_profile'])->name('update_profile');

    //マイページ
    Route::get('/mypage', [UserController::class, 'profile'])->name('profile');

    Route::get('/sell', [ItemsController::class, 'create'])->name('sell');
    Route::post('/sell', [ItemsController::class, 'store'])->name('sell.store');
});
