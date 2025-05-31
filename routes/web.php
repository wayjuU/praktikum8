<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ListProdukController;

Route::get('/listproduk', [ListProdukController::class, 'show'])->name('produk.show');
Route::post('/listproduk', [ListProdukController::class, 'simpan'])->name('produk.simpan');
Route::get('/listproduk/edit/{id}', [ListProdukController::class, 'edit'])->name('produk.edit');
Route::put('/listproduk/update/{id}', [ListProdukController::class, 'update'])->name('produk.update');
Route::delete('/listproduk/{id}', [ListProdukController::class, 'delete'])->name('produk.delete');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('pages.home');
});
