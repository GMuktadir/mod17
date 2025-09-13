<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrmQueryController;
Route::get('/',[CrudController::class,'index'])->name('home');
//show data from database
Route::get('/crud/home', [CrudController::class, 'index'])->name('crud/home');

// Route::get('/crud/edit', [CrudController::class, 'edit'])->name('crud/edit');
//create data form
Route::get('/crud/create', [CrudController::class, 'create'])->name('crud/create');
//save data to database with post method
Route::post('/crud/store', [CrudController::class, 'store'])->name('crud/store');
//delete data
Route::post('/crud/destroy/{id}', [CrudController::class, 'destroy'])->name('crud/destroy');
//show edit data form
Route::post('/crud/edit/{id}', [CrudController::class, 'edit'])->name('crud/edit');
//update data to database with post method
Route::post('/crud/update/{id}', [CrudController::class, 'update'])->name('crud/update');

// Route for ORM Query
Route::get('/orm', [OrmQueryController::class, 'orm'])->name('orm');
//show product insert form
Route::get('/orm/product', [OrmQueryController::class, 'product'])->name('orm/product');
//save product to database
Route::post('/orm/product/create', [OrmQueryController::class, 'insertProduct'])->name('orm/product/create');
