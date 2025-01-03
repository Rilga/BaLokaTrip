<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\FavoriteController;
use App\Http\Controllers\User\BookController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\VisualController;
use App\Http\Controllers\Admin\CheckoutController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');


Route::middleware('auth')->group(function (){
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/riwayatpesanan', [OrderController::class, 'riwayatPesanan']);
    
});

require __DIR__.'/auth.php';

// User Routes
Route::middleware(['auth','userMiddleware'])->group(function(){
    
    // Pemanggilan Content
    Route::get('dashboard',[UserController::class,'index'])->name('dashboard');
    Route::get('/dashboard', [ProductController::class, 'index2'])->name('dashboard');
    Route::get('/dashboard', [ProductController::class, 'index3'])->name('dashboard');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('show');
    // Routes Event
    Route::get('event',[EventController::class,'index2'])->name('user.event');
    // Routes Artikel
    Route::get('article',[ArticleController::class,'index2'])->name('user.article');
    Route::get('/articles', [ArticleController::class, 'index3'])->name('articles');
    Route::get('/articles/{id}', [ArticleController::class, 'show2'])->name('articles.show');
    Route::get('/article/{id}/download', [ArticleController::class, 'downloadPDF'])->name('article.download');
    // Routes FAQ
    Route::get('/faq', [FaqController::class, 'index2'])->name('faq');
    // Routes Ticket
    Route::get('/ticket', [TicketController::class, 'index2'])->name('user.ticket');
    Route::get('/ticket/{id}', [ProductController::class, 'show2'])->name('ticket.show');
    // Routes Diskon
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rute untuk menerapkan diskon
    Route::get('/checkout/{id}', [CheckoutController::class, 'showCheckout'])->name('checkout.show');
    Route::post('/checkout/apply-discount', [CheckoutController::class, 'applyDiscount'])->name('checkout.apply-discount');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/riwayat_pesanan', [OrderController::class, 'riwayatPesanan'])->name('riwayat.pesanan');
    Route::post('/midtrans/notification', [CheckoutController::class, 'notificationHandler'])->name('midtrans.notification');
    Route::get('/checkout/riwayatpesanan', [OrderController::class, 'riwayatPesanan'])->name('checkout.riwayatpesanan');

    Route::get('/order/{id}/download', [OrderController::class, 'downloadPDF'])->name('tiket.download');



    
    
});

// Admin Routes
Route::middleware(['auth','adminMiddleware'])->group(function(){
    
    Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');

    // Routes CRUD Wisata
    Route::get('/admin/product',[ProductController::class,'index'])->name('admin.product');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.Products.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');;
    Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.Products.edit');
    Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.Products.destroy');

    // Routes CRUD Ticket
    Route::get('/admin/ticket', [TicketController::class, 'index'])->name('admin.ticket');
    Route::get('/admin/tickets/create', [TicketController::class, 'create'])->name('admin.tickets.create');
    Route::post('/admin/tickets', [TicketController::class, 'store'])->name('admin.tickets.store');
    Route::get('/admin/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('admin.tickets.edit');
    Route::put('/admin/tickets/{ticket}', [TicketController::class, 'update'])->name('admin.tickets.update');
    Route::delete('/admin/tickets/{ticket}', [TicketController::class, 'destroy'])->name('admin.tickets.destroy');

    // Routes CRUD FAQ
    Route::get('/admin/faq', [FaqController::class, 'index'])->name('admin.faq');
    Route::get('/admin/faqs/create', [FaqController::class, 'create'])->name('admin.faq.create');
    Route::post('/admin/faqs', [FaqController::class, 'store'])->name('admin.faq.store');
    Route::get('/admin/faqs/{id}/edit', [FaqController::class, 'edit'])->name('admin.faq.edit');
    Route::put('/admin/faqs/{id}', [FaqController::class, 'update'])->name('admin.faq.update');
    Route::delete('/admin/faqs/{id}', [FaqController::class, 'destroy'])->name('admin.faq.destroy');

    // Routes CRUD Article
    Route::get('/admin/article', [ArticleController::class, 'index'])->name('admin.article');
    Route::get('/admin/article/create', [ArticleController::class, 'create'])->name('admin.article.create');
    Route::post('/admin/article', [ArticleController::class, 'store'])->name('admin.article.store');
    Route::get('/admin/article/{id}/edit', [ArticleController::class, 'edit'])->name('admin.article.edit');
    Route::put('/admin/article/{id}', [ArticleController::class, 'update'])->name('admin.article.update');
    Route::delete('/admin/article/{id}', [ArticleController::class, 'destroy'])->name('admin.article.destroy');

    // Routes CRUD Diskon
    Route::get('/admin/discount', [DiscountController::class, 'index'])->name('admin.discount');
    Route::get('/admin/discount/create', [DiscountController::class, 'create'])->name('admin.discount.create');
    Route::post('/admin/discount', [DiscountController::class, 'store'])->name('admin.discount.store');
    Route::get('/admin/discount/{id}/edit', [DiscountController::class, 'edit'])->name('admin.discount.edit');
    Route::put('/admin/discount/{id}', [DiscountController::class, 'update'])->name('admin.discount.update');
    Route::delete('/admin/discount/{id}', [DiscountController::class, 'destroy'])->name('admin.discount.destroy');

    // Routes CRUD Acara
    Route::get('/admin/event', [EventController::class, 'index'])->name('admin.event');
    Route::get('/admin/events/create', [EventController::class, 'create'])->name('admin.events.create');
    Route::post('/admin/event', [EventController::class, 'store'])->name('admin.events.store');
    Route::get('/admin/events/{id}/edit', [EventController::class, 'edit'])->name('admin.events.edit');
    Route::put('/admin/events/{id}', [EventController::class, 'update'])->name('admin.events.update');
    Route::delete('/admin/events/{id}', [EventController::class, 'destroy'])->name('admin.events.destroy');

    // Routes Visualisasi
    Route::get('/admin/visual', [VisualController::class, 'index'])->name('admin.visual');

});