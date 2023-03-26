<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendUserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/' ,[FrontendUserController::class ,'index']);
Route::get('category' ,[FrontendUserController::class ,'category']);
Route::get('view-category/{id}' ,[FrontendUserController::class ,'viewCategory']);
Route::get('category/{cat_title}/{prod_title}' ,[FrontendUserController::class ,'productView']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Route::middleware(['auth','isAdmin'], function (){
    Route::get('/dashboard', function () {
        return 'this is admin';
     });
//}) ;
Route::middleware(['auth'])->group(function () 
{
    Route::get('cart', [CartController::class, 'viewCart']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('place-order' , [CheckoutController::class, 'placeorder']);
    Route::get('my-orders' , [UserController::class, 'index']);
    Route::get('view-order/{id}' , [UserController::class, 'view']);
});

Route::post('/add-to-cart' , [CartController::class, 'addToCart']);
Route::post('/delete-cart-item' , [CartController::class, 'deleteProduct']);
Route::post('/update-cart' , [CartController::class, 'updatecart']);



Route::group(['middleware' => ['auth','isAdmin']], function () {

    Route::get('/dashboard', [FrontendController::class, 'index']);
    
    Route::get('categories',[CategoryController::class, 'index']);
    Route::get('add-category',[CategoryController::class, 'add']);
    Route::post('insert-category', [CategoryController::class, 'insert']);
    Route::get('edit-categ/{id}', [CategoryController::class, 'edit']);
    Route::post('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);

    //products
    Route::get('products', [ProductController::class, 'index']);
    Route::get('add-product',[ProductController::class, 'add']);
   Route::post('insert-product', [ProductController::class, 'insert']);
   Route::get('edit-product/{id}', [ProductController::class, 'edit']);
   Route::post('update-product/{id}', [ProductController::class, 'update']);
   Route::get('delete-product/{id}', [ProductController::class, 'destroy']);


 
 });
