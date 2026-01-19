<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\QuoteRequestController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;

// Admin Auth Routes (MUST be before wildcard routes)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Admin Protected Routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');

    // Sliders
    Route::resource('sliders', SliderController::class)->except(['show']);

    // Categories
    Route::resource('categories', CategoryController::class)->except(['show']);

    // Products
    Route::resource('products', AdminProductController::class)->except(['show']);

    // Features
    Route::resource('features', FeatureController::class)->except(['show']);

    // FAQs
    Route::resource('faqs', FaqController::class)->except(['show']);

    // Blog
    Route::resource('blog', BlogPostController::class)->except(['show']);

    // Pages
    Route::resource('pages', AdminPageController::class)->except(['show']);

    // Testimonials
    Route::resource('testimonials', TestimonialController::class)->except(['show']);

    // Projects
    Route::resource('projects', AdminProjectController::class)->except(['show']);

    // Quote Requests
    Route::get('/quotes', [QuoteRequestController::class, 'index'])->name('quotes.index');
    Route::get('/quotes/{quote}', [QuoteRequestController::class, 'show'])->name('quotes.show');
    Route::put('/quotes/{quote}/status/{status}', [QuoteRequestController::class, 'updateStatus'])->name('quotes.status');
    Route::delete('/quotes/{quote}', [QuoteRequestController::class, 'destroy'])->name('quotes.destroy');

    // Messages
    Route::get('/messages', [ContactMessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{message}', [ContactMessageController::class, 'show'])->name('messages.show');
    Route::delete('/messages/{message}', [ContactMessageController::class, 'destroy'])->name('messages.destroy');

    // Activity Logs
    Route::get('/activity-logs', [ActivityLogController::class, 'index'])->name('activity-logs.index');
});

// SEO Routes
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Frontend Routes (wildcard routes MUST be last)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/hakkimizda', [PageController::class, 'about'])->name('about');
Route::get('/iletisim', [ContactController::class, 'index'])->name('contact');
Route::post('/iletisim', [ContactController::class, 'store'])->name('contact.store');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/projeler', [ProjectController::class, 'index'])->name('projects');
Route::get('/projeler/{slug}', [ProjectController::class, 'show'])->name('project.show');
Route::get('/teklif-al', [QuoteController::class, 'index'])->name('quote');
Route::post('/teklif-al', [QuoteController::class, 'store'])->name('quote.store');
Route::get('/ara', [SearchController::class, 'index'])->name('search');

// These wildcard routes MUST be at the very end
Route::get('/{categorySlug}', [ProductController::class, 'category'])->name('category');
Route::get('/{categorySlug}/{productSlug}', [ProductController::class, 'show'])->name('product');
