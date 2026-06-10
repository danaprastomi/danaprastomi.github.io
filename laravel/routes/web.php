<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\UserController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about');
Route::get('/visi-misi', [HomeController::class, 'visiMisi'])->name('visi-misi');
Route::get('/produk', [HomeController::class, 'produk'])->name('produk');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');
Route::get('/klien-kami', [HomeController::class, 'klienKami'])->name('klien');
Route::post('/contact', [HomeController::class, 'contact'])->name('contact.send');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('sliders', SliderController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('company-profile', CompanyProfileController::class);
    Route::resource('contacts', ContactController::class)->only(['index', 'show', 'destroy']);
    Route::post('contacts/{contact}/send-whatsapp', [ContactController::class, 'sendWhatsApp'])->name('contacts.send-whatsapp');
    Route::get('contacts/{contact}/download-attachment', [ContactController::class, 'downloadAttachment'])->name('contacts.download-attachment');
    Route::resource('users', UserController::class);
});
