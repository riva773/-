<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\AuthItemsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;


Route::get('/item/{item_id}', [ItemsController::class, 'show'])->name('show');
Route::get('/edit_profile', [UserController::class, 'edit_profile'])->name('edit_profile');
Route::post('/update_profile',[UserController::class, 'update_profile'])->name('update_profile');

Route::get('/', function () {
    if (Auth::check()) {
        return app(AuthItemsController::class)->index();
    }
    return app(ItemsController::class)->index();
})->name('/');

Route::middleware('auth')->group(function () {
    Route::post('/like', [LikesController::class, 'store'])->name('like');
    Route::post('/unlike', [LikesController::class, 'destroy'])->name('unlike');
    Route::post('/comment',[CommentsController::class,'store'])->name('comment');
});
