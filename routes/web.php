<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::get('/', [Controllers\NoteController::class, 'index'])->name('notes.index');
Route::get('/create', [Controllers\NoteController::class, 'create'])->name('notes.create');
Route::get('/show/{note}', [Controllers\NoteController::class, 'show'])->name('notes.show');
Route::get('/edit/{note}', [Controllers\NoteController::class, 'edit'])->name('notes.edit');

Route::post('/store', [Controllers\NoteController::class, 'store'])->name('notes.store');
Route::patch('/update/{note}', [Controllers\NoteController::class, 'update'])->name('notes.update');
Route::delete('/destroy/{note}', [Controllers\NoteController::class, 'destroy'])->name('notes.destroy');
