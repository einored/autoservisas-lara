<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController as Company;
use App\Http\Controllers\ServiceController as Service;
use App\Http\Controllers\FixerController as Fixer;
use App\Http\Controllers\OrderController as Order;

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

//Companies routes
//index
Route::get('/companies', [Company::class, 'index'])->name('companies-index');
//create
Route::get('/companies/create', [Company::class, 'create'])->name('companies-create');
Route::post('/companies', [Company::class, 'store'])->name('companies-store');
//edit
Route::get('/companies/edit/{company}', [Company::class, 'edit'])->name('companies-edit');
Route::put('/companies/edit/{company}', [Company::class, 'update'])->name('companies-update');
//delete
Route::delete('/companies/{company}', [Company::class, 'destroy'])->name('companies-delete');
//show
Route::get('/companies/show/{id}', [Company::class, 'show'])->name('companies-show');

//Services routes
//index
Route::get('/services', [Service::class, 'index'])->name('services-index');
//create
Route::get('/services/create', [Service::class, 'create'])->name('services-create');
Route::post('/services', [Service::class, 'store'])->name('services-store');
//edit
Route::get('/services/edit/{service}', [Service::class, 'edit'])->name('services-edit');
Route::put('/services/edit/{service}', [Service::class, 'update'])->name('services-update');
//delete
Route::delete('/services/{service}', [Service::class, 'destroy'])->name('services-delete');
//show
Route::get('/services/show/{id}', [Service::class, 'show'])->name('services-show');

//Fixers routes
//index
Route::get('/fixers', [Fixer::class, 'index'])->name('fixers-index');
//create
Route::get('/fixers/create', [Fixer::class, 'create'])->name('fixers-create');
Route::post('/fixers', [Fixer::class, 'store'])->name('fixers-store');
//edit
Route::get('/fixers/edit/{fixer}', [Fixer::class, 'edit'])->name('fixers-edit');
Route::put('/fixers/edit/{fixer}', [Fixer::class, 'update'])->name('fixers-update');
//delete
Route::delete('/fixers/{fixer}', [Fixer::class, 'destroy'])->name('fixers-delete');
//show
Route::get('/fixers/show/{id}', [Fixer::class, 'show'])->name('fixers-show');

//Orders routes
//index
Route::get('/orders', [Order::class, 'index'])->name('orders-index');
//create
Route::get('/orders/create', [Order::class, 'create'])->name('orders-create');
Route::post('/orders', [Order::class, 'store'])->name('orders-store');
//edit
Route::get('/orders/edit/{order}', [Order::class, 'edit'])->name('orders-edit');
Route::put('/orders/edit/{order}', [Order::class, 'update'])->name('orders-update');
//delete
Route::delete('/orders/{order}', [Order::class, 'destroy'])->name('orders-delete');
//show
Route::get('/orders/show/{id}', [Order::class, 'show'])->name('orders-show');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


