<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\AdminController;

Route::get("/", [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    Route::group(['prefix' => 'notes'], function () {
        Route::get('/', [AdminController::class, 'notes'])->name('admin.notes');
        Route::get('/edit/{note}', [AdminController::class, 'edit'])->name('admin.notes.edit');
        Route::patch('/update/{note}', [AdminController::class, 'update'])->name('admin.notes.update');
        Route::delete('/destroy/{note}', [AdminController::class, 'destroy'])->name('admin.notes.destroy');
    });
});

Route::group(['prefix' => 'notes', 'middleware' => 'auth'], function () {
    Route::get('/', [NoteController::class, 'index'])->name('notes.index');
    Route::get('/create', [NoteController::class, 'create'])->name('notes.create');
    Route::get('/show/{note}', [NoteController::class, 'show'])->name('notes.show');
    Route::get('/edit/{note}', [NoteController::class, 'edit'])->name('notes.edit');
    Route::post('/store', [NoteController::class, 'store'])->name('notes.store');
    Route::patch('/update/{note}', [NoteController::class, 'update'])->name('notes.update');
    Route::delete('/destroy/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');
});

Auth::routes();
