<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return redirect()->route('books.index');
});

Route::resource('books', BookController::class);

Route::post('/books/{book}/borrow', [BookController::class, 'borrow'])->name('books.borrow');
Route::post('/books/{book}/return', [BookController::class, 'returnBook'])->name('books.return');