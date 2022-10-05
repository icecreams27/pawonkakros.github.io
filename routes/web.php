<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\master;
use App\Http\Controllers\user;
use App\Models\customer;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [master::class,'loaddata']);
route::get('cart',function () {
    return view('cart');
});
Route::get('checkout', function () {
    return view('checkout');
});
route::get('contact-us',function () {
    return view('contact-us');
});
route::get('about',function () {
    return view('about');
});
Route::get('gallery', function () {
    return view('gallery');
});
route::get('my-account',function () {
    return view('my-account');
});
Route::get('detail', function () {
    return view('shop-detail');
});
route::get('shop',function () {
    return view('shop');
});
route::get('wishlist',function () {
    return view('wishlist');
});
route::get('login',function () {
    return view('login');
});
route::get('register',function () {
    return view('register');
});

route::get('addtype',function () {
    return view('addtype');
});

route::get('additem',[admin::class,'viewitem']);

route::get('register',function () {
    return view('register');
});

Route::prefix('admin')->group(function(){
    route::post('addtipe',[admin::class,'addtipe']);
    route::get('loadtipe',[admin::class,'loadtipe']);
    route::post('additem',[admin::class,'additem']);
    // route::get('loaditem/{$jenis}',[admin::class,'loaditem']);
    route::get('loaditem/{jenis}',[admin::class,'loaditem']);
    route::post('status/{id_barang}',[admin::class,'editstatus']);
});

Route::prefix('master')->group(function(){
    route::post('addcart',[master::class,'addcart']);
    route::get('loadtipe',[master::class,'loadtipe']);
    route::post('additem',[master::class,'additem']);
    // route::get('loaditem/{$jenis}',[master::class,'loaditem']);
    route::get('loaditem/{jenis}',[master::class,'loaditem']);
    route::post('status/{id_barang}',[master::class,'editstatus']);
});



Route::post('registerr',[user::class,'register']);
Route::post('loginn',[user::class,'login']);
Route::get('logout',[user::class,'logout']);
