<?php

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

Route::get('/home', 'HomeController@index')->name('home');

// Users
Route::get('user/', 'UserController@index')->name('user.index');
Route::get('user/create', 'UserController@create')->name('user.create'); // создание пользователя
Route::get('user/edit/{id}', 'UserController@edit')->name('user.edit'); // редактирование пользователя по id
Route::post('user/', 'UserController@store')->name('user.store'); // новая запись в нашей БД при создании пользователя
Route::patch('user/{id}', 'UserController@update')->name('user.update'); // метод patch поскольку будем изменять уже существующую запись в БД
Route::delete('user/{id}', 'UserController@destroy')->name('user.destroy'); // удаление пользователя

//Route::post('users/{user}/change_password', 'ChangePasswordController@change_password')->name('user.change.password');

// Posts
Route::get('post/', 'PostController@index')->name('post.index');
Route::get('post/create', 'PostController@create')->name('post.create');
Route::get('post/edit/{id}', 'PostController@edit')->name('post.edit');
Route::post('post/', 'PostController@store')->name('post.store');
Route::patch('post/{id}', 'PostController@update')->name('post.update');
Route::delete('post/{id}', 'PostController@destroy')->name('post.destroy');

// Employees
Route::get('employee/', 'EmployeeController@index')->name('employee.index');
Route::get('employee/create', 'EmployeeController@create')->name('employee.create');
Route::get('employee/edit/{id}', 'EmployeeController@edit')->name('employee.edit');
Route::post('employee/', 'EmployeeController@store')->name('employee.store');
Route::patch('employee/{id}', 'EmployeeController@update')->name('employee.update');
Route::delete('employee/{id}', 'EmployeeController@destroy')->name('employee.destroy');

// Buyers
Route::get('buyer/', 'BuyerController@index')->name('buyer.index');
Route::get('buyer/create', 'BuyerController@create')->name('buyer.create');
Route::get('buyer/edit/{id}', 'BuyerController@edit')->name('buyer.edit');
Route::post('buyer/', 'BuyerController@store')->name('buyer.store');
Route::patch('buyer/{id}', 'BuyerController@update')->name('buyer.update');
Route::delete('buyer/{id}', 'BuyerController@destroy')->name('buyer.destroy');

// Orders
Route::get('order/', 'OrderController@index')->name('order.index');
Route::get('order/create', 'OrderController@create')->name('order.create');
Route::get('order/edit/{id}', 'OrderController@edit')->name('order.edit');
Route::post('order/', 'OrderController@store')->name('order.store');
Route::patch('order/{id}', 'OrderController@update')->name('order.update');
Route::delete('order/{id}', 'OrderController@destroy')->name('order.destroy');

// Order Products
Route::get('order_product/', 'OrderProductController@index')->name('order_product.index');
Route::get('order_product/create', 'OrderProductController@create')->name('order_product.create');
Route::get('order_product/edit/{id}', 'OrderProductController@edit')->name('order_product.edit');
Route::post('order_product/', 'OrderProductController@store')->name('order_product.store');
Route::patch('order_product/{id}', 'OrderProductController@update')->name('order_product.update');
Route::delete('order_product/{id}', 'OrderProductController@destroy')->name('order_product.destroy');

// Products
Route::get('product/', 'ProductController@index')->name('product.index');
Route::get('product/create', 'ProductController@create')->name('product.create');
Route::get('product/edit/{id}', 'ProductController@edit')->name('product.edit');
Route::post('product/', 'ProductController@store')->name('product.store');
Route::patch('product/{id}', 'ProductController@update')->name('product.update');
Route::delete('product/{id}', 'ProductController@destroy')->name('product.destroy');

// Purchases
Route::get('purchase/', 'PurchaseController@index')->name('purchase.index');
Route::get('purchase/create', 'PurchaseController@create')->name('purchase.create');
Route::get('purchase/edit/{id}', 'PurchaseController@edit')->name('purchase.edit');
Route::post('purchase/', 'PurchaseController@store')->name('purchase.store');
Route::patch('purchase/{id}', 'PurchaseController@update')->name('purchase.update');
Route::delete('purchase/{id}', 'PurchaseController@destroy')->name('purchase.destroy');

// Purchase Products
Route::get('purchase_product/', 'PurchaseProductController@index')->name('purchase_product.index');
Route::get('purchase_product/create', 'PurchaseProductController@create')->name('purchase_product.create');
Route::get('purchase_product/edit/{id}', 'PurchaseProductController@edit')->name('purchase_product.edit');
Route::post('purchase_product/', 'PurchaseProductController@store')->name('purchase_product.store');
Route::patch('purchase_product/{id}', 'PurchaseProductController@update')->name('purchase_product.update');
Route::delete('purchase_product/{id}', 'PurchaseProductController@destroy')->name('purchase_product.destroy');

// Transactions
Route::get('transaction/', 'TransactionController@index')->name('transaction.index');
Route::get('transaction/create', 'TransactionController@create')->name('transaction.create');
Route::get('transaction/edit/{id}', 'TransactionController@edit')->name('transaction.edit');
Route::post('transaction/', 'TransactionController@store')->name('transaction.store');
Route::patch('transaction/{id}', 'TransactionController@update')->name('transaction.update');
Route::delete('transaction/{id}', 'TransactionController@destroy')->name('transaction.destroy');

// Vue Employees
/*Route::get('{any}', function () {
    return view('orders.index');
})->where('{any}', '.*');*/
