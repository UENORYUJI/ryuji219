<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;


// プログ一覧画面表示
// Route::get('/', '.\App\Http\Controllers\BlogController@showList')->name('blogs');
Route::get('/',[BlogController::class,'showList'])->name('blogs');

// プログ登録画面表示
// Route::get('/blog/create', 'App\Http\Controllers\BlogController@showCreate')->name('create');
Route::get('/blog/create',[BlogController::class,'showCreate'])->name('create');

//プログ登録
// Route::post('/blog/store', 'App\Http\Controllers\BlogController@exeStore')->name('store');
Route::post('/blog/store', [BlogController::class,'exeStore'])->name('store');

// プログ詳細画面表示
// Route::get('/blog/{id}', 'App\Http\Controllers\BlogController@showDetail')->name('show');
Route::get('/blog/{id}', [BlogController::class,'showDetail'])->name('show');

// プログ編集画面表示
// Route::get('/blog/edit/{id}', 'App\Http\Controllers\BlogController@showEdit')->name('edit');
Route::get('/blog/edit/{id}', [BlogController::class,'showEdit'])->name('edit');

//削除
Route::post('/blog/delete/{id}', [BlogController::class,'exeDelete'])->name('delete');

// Route::post('/blog/update', 'App\Http\Controllers\BlogController@exeUpdate')->name('update');
Route::post('/blog/update', [BlogController::class,'exeUpdate'])->name('update');


