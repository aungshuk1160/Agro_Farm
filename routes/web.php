<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


route::get('/redirect', [HomeController::class, 'redirect']);
route::get('/', [HomeController::class, 'index']);

route::get('/view_category', [AdminController::class, 'view_category']);
route::post('/add_category', [AdminController::class, 'add_category']);

/* ADMIN PAGE */
route::post('/add_product', [AdminController::class, 'add_product']);
route::get('/view_product', [AdminController::class, 'view_product']);
route::get('/show_all_product', [AdminController::class, 'show_all_product']);
route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
route::get('/edit_product/{id}', [AdminController::class, 'edit_product']);
route::post('/update_product/{id}', [AdminController::class, 'update_product']);


Route::get('/show_orders',[AdminController::class,'show_orders']);




/* USER PAGE */

route::get('/edit_profile', [HomeController::class, 'edit_profile']);
route::post('/update_profile', [HomeController::class, 'update_profile']);

route::get('/view_product_details/{id}', [HomeController::class, 'view_product_details']);
route::get('/product_details/{id}',[HomeController::class,'product_details']);
route::get('/search',[HomeController::class,'search']);


route::post('/add_cart/{id}',[HomeController::class,'add_cart']);
route::get('/show_cart', [HomeController::class, 'show_cart']);
route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);

route::get('/cash_order', [HomeController::class, 'cash_order']);

route::post('/add_comment', [HomeController::class, 'add_comment']);
route::post('/add_reply',[HomeController::class, 'add_reply']);




Route::get('/OrderHistory', function () {
    return "Order History";
});


Route::get('/Info', function () {
    return "All the info of the farm including plant availabiity.";
});