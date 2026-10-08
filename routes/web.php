<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectController;
use App\Http\Middleware\IsAdmin;

Route::get('/', function () {
    return view('home');
});

Route::get('/contact', function () {
    return view('contact');
});

// Public Projects Route
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

// Shop Routes
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/category/{slug}', [ShopController::class, 'index'])->name('shop.category');

// User Auth Routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showUserLogin'])->name('login');
Route::post('/login', [AuthController::class, 'userLogin']);
Route::post('/logout', [AuthController::class, 'userLogout'])->name('logout');

// User Dashboard
Route::get('/dashboard', [AuthController::class, 'userDashboard'])->name('user.dashboard');

// Admin Auth Routes
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Admin CRUD Routes (Protected)
Route::middleware([IsAdmin::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Products Management
    Route::get('/admin/products', [AdminController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/create', [AdminController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products/store', [AdminController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/{id}/edit', [AdminController::class, 'edit'])->name('admin.products.edit');
    Route::post('/admin/products/{id}/update', [AdminController::class, 'update'])->name('admin.products.update');
    Route::post('/admin/products/{id}/delete', [AdminController::class, 'destroy'])->name('admin.products.delete');

    // Categories Management
    Route::get('/admin/categories', [AdminController::class, 'categoriesIndex'])->name('admin.categories.index');
    Route::get('/admin/categories/create', [AdminController::class, 'categoriesCreate'])->name('admin.categories.create');
    Route::post('/admin/categories/store', [AdminController::class, 'categoriesStore'])->name('admin.categories.store');
    Route::get('/admin/categories/{id}/edit', [AdminController::class, 'categoriesEdit'])->name('admin.categories.edit');
    Route::post('/admin/categories/{id}/update', [AdminController::class, 'categoriesUpdate'])->name('admin.categories.update');
    Route::post('/admin/categories/{id}/delete', [AdminController::class, 'categoriesDestroy'])->name('admin.categories.delete');

    // Projects Management
    Route::get('/admin/projects', [AdminController::class, 'projectsIndex'])->name('admin.projects.index');
    Route::get('/admin/projects/create', [AdminController::class, 'projectsCreate'])->name('admin.projects.create');
    Route::post('/admin/projects/store', [AdminController::class, 'projectsStore'])->name('admin.projects.store');
    Route::get('/admin/projects/{id}/edit', [AdminController::class, 'projectsEdit'])->name('admin.projects.edit');
    Route::post('/admin/projects/{id}/update', [AdminController::class, 'projectsUpdate'])->name('admin.projects.update');
    Route::post('/admin/projects/{id}/delete', [AdminController::class, 'projectsDestroy'])->name('admin.projects.delete');
});
