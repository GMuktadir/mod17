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
//show product
Route::get('/orm/product/show', [OrmQueryController::class, 'showProduct'])->name('orm/product/show');
//product insert form
Route::get('/orm/product', [OrmQueryController::class, 'product'])->name('orm/product');
//logic to save product to database 
Route::post('/orm/product/create', [OrmQueryController::class, 'insertProduct'])->name('orm/product/create');

//Customer Route
//show customer
Route::get('/orm/customer/show', [OrmQueryController::class, 'showCustomer'])->name('orm/customer/show');
//insert customer form
Route::get('/orm/customer', [OrmQueryController::class, 'customer'])->name('orm/customer');
//logic to save customer to database
Route::post('/orm/customer/create', [OrmQueryController::class, 'insertCustomer'])->name('orm/customer/create');

//Route for offer
//show offer
Route::get('/orm/offer/show', [OrmQueryController::class, 'showOffer'])->name('orm/offer/show');
//insert offer form
Route::get('/orm/offer', [OrmQueryController::class, 'offer'])->name('orm/offer');
//logic to save offer to database
Route::post('/orm/offer/create', [OrmQueryController::class, 'insertOffer'])->name('orm/offer/create');