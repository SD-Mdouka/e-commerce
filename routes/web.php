<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
/*******************Home************************* */
Route::get('/', 'HomeController@index')->name('home');
/************************************************ */
 //activate user account routes
Route::get('/activate/{code}', 'ActivationController@activateUserAccount')->name('user.activate');
Route::get('/resend/{email}', 'ActivationController@resendActivationCode')->name('code.resend');
//home route
Route::resource('products', 'ProductController');
Route::get('products/category/{category}', 'HomeController@getProductByCategory')->name("category.products");
//cart routes
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/add/cart/{product}', 'CartController@addProductToCart')->name('add.cart');
Route::delete('/remove/{product}/cart', 'CartController@removeProductFromCart')->name('remove.cart');
Route::put('/update/{product}/cart', 'CartController@updateProductOnCart')->name('update.cart');
//payment routes
Route::get('/handle-payment', 'PaypalPaymentController@handlePayment')->name('make.payment');
Route::get('/cancel-payment', 'PaypalPaymentController@paymentCancel')->name('cancel.payment');
Route::get('/payment-success', 'PaypalPaymentController@paymentSuccess')->name('success.payment');
//admin routes
Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::get('/admin/login', 'AdminController@showAdminLoginForm')->name('admin.login');
Route::post('/admin/login', 'AdminController@adminLogin')->name('admin.login');
Route::get('/admin/logout', 'AdminController@adminLogout')->name('admin.logout');
Route::get('/admin/products_auth', 'AdminController@getProducts')->name('admin.products');
Route::get('/admin/orders', 'AdminController@getOrders')->name('admin.orders');
Route::get('/admin/categories', 'AdminController@getCategories')->name('admin.categories');
Route::get('/admin/users', 'AdminController@getUsers')->name('admin.users');
//orders routes
Route::resource('orders', 'OrderController');
//categories routes
Route::resource('categories', 'CategoryController');
//users route
Route::resource('users', 'UserController');

