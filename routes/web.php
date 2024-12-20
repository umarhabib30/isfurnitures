<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'frontend.content.content');
Route::view('/shop', 'frontend.shop.shop')->name('shop.view');
Route::view('/aboutus', 'frontend.about.about')->name('about.view');
Route::view('/services', 'frontend.services.services')->name('services.view');
Route::view('/blogs', 'frontend.blog.blog')->name('blog.view');
Route::view('/contacts', 'frontend.contact.contact')->name('contact.view');
Route::view('/cart', 'frontend.cart.cart')->name('cart.view');



Route::view('/admin/login', 'admin.auth.login')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
Route::middleware(['auth:admin'])->group(function () {
    Route::view('/admin/dashboard', 'admin.content.content')->name('admin.dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    // Category 

    Route::view('/category', 'admin.category.create')->name('admin.category');

    Route::post('/create/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('index', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/category/delete', [CategoryController::class, 'delete'])->name('category.delete');
    Route::post('/category/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update', [CategoryController::class, 'update'])->name('category.update');
    // subcategory
    Route::get('/subcategory', [SubCategoryController::class, 'category'])->name('subcategory.view');
    Route::post('/store/subcategory', [SubCategoryController::class, 'storeCategory'])->name('subcategory.store');
    Route::get('/index/subcategory', [SubCategoryController::class, 'subcategory'])->name('subcategory.index');
    Route::post('/subcategory/delete', [SubCategoryController::class, 'delete'])->name('subcategory.delete');
    Route::post('/subcategory/edit', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
    Route::post('/subcategory/update', [SubCategoryController::class, 'update'])->name('subcategory.update');

    // product

    Route::get('/product', [ProductController::class, 'product'])->name('product');
    Route::get('/get-subcategories/{category_id}', [ProductController::class, 'getSubcategories'])->name('get.subcategories');
    Route::post('/product/store',[ProductController::class,'storeProduct'])->name('admin.productstore');
    Route::get('/index/product',[ProductController::class,'showProducts'])->name('admin.products');

});
