<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SubkategoriController;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('karyawans', KaryawanController::class);
Route::resource('products', ProductController::class);
Route::resource('admins', AdminController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('subkategori', SubkategoriController::class);
Route::resource('item', ItemController::class);
