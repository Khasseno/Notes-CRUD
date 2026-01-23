<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get("/", [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'IndexController')->name('admin.index');

    Route::group(['prefix' => 'notes'], function () {
        Route::get('/', 'NotesController')->name('admin.notes');
        Route::get('/notes/edit/{note}', 'EditController')->name('admin.notes.edit');
        Route::patch('/notes/update/{note}', 'UpdateController')->name('admin.notes.update');
        Route::delete('/notes/destroy/{note}', 'DestroyController')->name('admin.notes.destroy');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Note', 'prefix' => 'notes', 'middleware' => 'auth'], function () {
    Route::get('/', 'IndexController')->name('notes.index');
    Route::get('/create', 'CreateController')->name('notes.create');
    Route::get('/show/{note}', 'ShowController')->name('notes.show');
    Route::get('/edit/{note}', 'EditController')->name('notes.edit');
    Route::post('/store', 'StoreController')->name('notes.store');
    Route::patch('/update/{note}', 'UpdateController')->name('notes.update');
    Route::delete('/destroy/{note}', 'DestroyController')->name('notes.destroy');
});

Auth::routes();
