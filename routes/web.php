<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'frontend.content.content');
Route::view('/shop', 'frontend.shop.shop')->name('shop.view');
Route::view('/aboutus', 'frontend.about.about')->name('about.view');
Route::view('/services', 'frontend.services.services')->name('services.view');
Route::view('/blogs', 'frontend.blog.blog')->name('blog.view');
Route::view('/contacts', 'frontend.contact.contact')->name('contact.view');
Route::view('/cart', 'frontend.cart.cart')->name('cart.view');



Route::view('/admin','admin.layout.app');
