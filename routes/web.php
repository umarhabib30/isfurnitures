<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\Frontend\AuthController as FrontendAuthController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckOutController;
use App\Http\Controllers\Frontend\ContactUsController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/shop', [ShopController::class, 'shop'])->name('shop.view');
Route::get('/shop/filter', [ShopController::class, 'filterProducts'])->name('filter.products');

Route::get('/aboutus', [AboutUsController::class, 'about'])->name('about.view');
Route::get('/services', [ServiceController::class, 'service'])->name('services.view');
Route::get('/blogs', [BlogController::class, 'blog'])->name('blog.view');
Route::get('/contacts', [ContactUsController::class, 'contact'])->name('contact.view');
Route::get('/cart', [CartController::class, 'cart'])->name('cart.view');

Route::post('cart/add', [CartController::class, 'add'])->name('customer.cart');
Route::post('/product/increase', [CartController::class, 'increase'])->name('cart.product.increase');
Route::post('/product/decrease', [CartController::class, 'decrease'])->name('cart.product.decrease');
Route::post('/product/remove', [CartController::class, 'destroy'])->name('cart.product.remove');
Route::get('/product/detail/{id}', [ShopController::class, 'productDetail'])->name('product.detail');

Route::get('/checkout', [CheckOutController::class, 'checkout'])->name('checkout.view');

Route::post('/order/store', [CheckOutController::class, 'orderStore'])->name('order.store');

Route::post('/contact/store', [ContactUsController::class, 'store'])->name('message.store');
Route::get('/subcategory/{id}/products', [HomeController::class, 'showSubcategoryProducts'])->name('subcategory.products');

Route::get('/register', [FrontendAuthController::class, 'register'])->name('register.view');
Route::post('/store/user', [FrontendAuthController::class, 'storeUser'])->name('register');
Route::get('/login/view', [FrontendAuthController::class, 'loginView'])->name('login.view');
Route::post('/login/user', [FrontendAuthController::class, 'loginUser'])->name('user.login');
Route::middleware(['auth:user'])->group(function () {
    Route::get('/check-auth', [FrontendAuthController::class, 'checkAuth']);
    Route::post('/store/review',[ReviewController::class,'store'])->name('review.store');

});


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

    // order
    Route::get('/order/index', [OrderController::class, 'order'])->name('order.index');
    Route::get('/order/items/{id}', [OrderController::class, 'detail'])->name('order.detail');

    Route::get('/message/index', [ContactController::class, 'contact'])->name('contact.view');

    Route::get('/user/index',[UserController::class,'user'])->name('user.view');

    
});
