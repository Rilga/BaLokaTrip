<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// user routes
Route::middleware(['auth','userMiddleware'])->group(function(){
    
    // Pemanggilan Content
    Route::get('dashboard',[UserController::class,'index'])->name('dashboard');
    Route::get('/dashboard', [ProductController::class, 'index2'])->name('dashboard');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('show');

});

// admin routes
Route::middleware(['auth','adminMiddleware'])->group(function(){
    
    Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');

    // CRUD Wisata
    Route::get('/admin/product',[ProductController::class,'index'])->name('admin.product');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.Products.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');;
    Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.Products.edit');
    Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.Products.destroy');

});



