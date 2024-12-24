<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/shop', [ShopController::class, 'shop'])->name('shop.view');
Route::get('/shop/filter', [ShopController::class, 'filterProducts'])->name('filter.products');

Route::view('/aboutus', 'frontend.about.about')->name('about.view');
Route::view('/services', 'frontend.services.services')->name('services.view');
Route::view('/blogs', 'frontend.blog.blog')->name('blog.view');
Route::view('/contacts', 'frontend.contact.contact')->name('contact.view');
Route::view('/cart', 'frontend.cart.cart')->name('cart.view');



Route::view('/admin/login', 'admin.auth.login')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    // Category

    Route::get('/category', [CategoryController::class, 'create'])->name('category.create');

    Route::post('/create/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('index', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/category/delete', [CategoryController::class, 'delete'])->name('category.delete');
    Route::post('/category/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update', [CategoryController::class, 'update'])->name('category.update');
    // subcategory
    Route::get('/subcategory', [SubCategoryController::class, 'category'])->name('subcategory.create');
    Route::post('/store/subcategory', [SubCategoryController::class, 'storeCategory'])->name('subcategory.store');
    Route::get('/index/subcategory', [SubCategoryController::class, 'subcategory'])->name('subcategory.index');
    Route::post('/subcategory/delete', [SubCategoryController::class, 'delete'])->name('subcategory.delete');
    Route::post('/subcategory/edit', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
    Route::post('/subcategory/update', [SubCategoryController::class, 'update'])->name('subcategory.update');

    // product

    Route::get('/product', [ProductController::class, 'product'])->name('product.create');
    Route::get('/get-subcategories/{category_id}', [ProductController::class, 'getSubcategories'])->name('get.subcategories');
    Route::post('/product/store', [ProductController::class, 'storeProduct'])->name('admin.productstore');
    Route::get('/index/product', [ProductController::class, 'showProducts'])->name('admin.products');
    Route::get('product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('product/update', [ProductController::class, 'update'])->name('product.update');
    Route::get('product/details/{id}', [ProductController::class, 'details'])->name('product.details');
    Route::get('product/image/delete/{id}', [ProductController::class, 'deleteImage'])->name('product.image.delete');

    // color
    Route::get('color', [ColorController::class, 'color'])->name('color.create');
    Route::post('/create/color', [ColorController::class, 'store'])->name('color.store');
    Route::get('/color/index', [ColorController::class, 'index'])->name('color.index');
    Route::post('/color/delete', [ColorController::class, 'delete'])->name('color.delete');
    Route::post('/color/edit', [ColorController::class, 'edit'])->name('color.edit');
    Route::post('/color/update', [ColorController::class, 'update'])->name('color.update');
});
