<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Note'], function () {
    Route::get('/', 'IndexController')->name('notes.index');
    Route::get('/create', 'CreateController')->name('notes.create');
    Route::get('/show/{note}', 'ShowController')->name('notes.show');
    Route::get('/edit/{note}', 'EditController')->name('notes.edit');
    Route::post('/store', 'StoreController')->name('notes.store');
    Route::patch('/update/{note}', 'UpdateController')->name('notes.update');
    Route::delete('/destroy/{note}', 'DestroyController')->name('notes.destroy');
});
