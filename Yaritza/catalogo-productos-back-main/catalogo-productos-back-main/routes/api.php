<?php

use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\PruebaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductsController;

Route::apiResource('prueba', PruebaController::class);
Route::get('products', [ProductsController::class, 'getProductos']);
Route::get('products/buscar', [ProductsController::class, 'buscarProducto']);
Route::get('products/{idProduct}', [ProductsController::class, 'getProductoById']);
Route::get('categories', [CategoriesController::class, 'getCategorias']);

