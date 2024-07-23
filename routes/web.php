<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class,'index'])->name('products.index');
Route::post('/', [ProductController::class,'store'])->name('products.store');
Route::get('/{product}/edit', [ProductController::class,'edit'])->name('products.edit');
Route::put('/{product}/update', [ProductController::class,'update'])->name('products.update');
Route::delete('/{product}/delete', [ProductController::class,'delete'])->name('products.delete');
