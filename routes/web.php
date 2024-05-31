<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Other Pages
Route::get('/', [PageController::class, 'homepage'])->name('homepage');

Route::post('contact-us/form/submit', [ContactUsController::class, 'contact'])->name('contact.us.store');

Route::get('news/{blog}', [PageController::class, 'singleNews'])->name('news.single');

Route::get('product/{name}', [PageController::class, 'singleProduct'])->name('product.single');

Route::get('project/{id}', [PageController::class, 'singleProject'])->name('project.single');

Route::get('gallery/{gallery}', [PageController::class, 'gallery'])->name('gallery');

Route::resource('orders', OrderController::class);


// Auth Routes
Auth::routes();

Route::post('register', [AuthController::class, 'registerSubmit']);
Route::get('email-verify/{id}', [AuthController::class, 'emailVerify'])->name('emailVerify');
Route::get('resend-email-verify/{id}', [AuthController::class, 'resendVerifyLink'])->name('resendVerifyLink');
Route::get('email-verify-check/{id}', [AuthController::class, 'emailVerifyCheck'])->name('emailVerifyCheck');

// Custom Sitemap
Route::get('sitemap.xml', [SitemapController::class, 'index'])->name('sitemap.index');
Route::prefix('sitemap')->group(function() {
    Route::get('articles.xml', [SitemapController::class, 'articles'])->name('sitemap.articles');
    // Route::get('article-categories.xml', [SitemapController::class, 'articleCategories'])->name('sitemap.article.categories');
    Route::get('projects.xml', [SitemapController::class, 'projects'])->name('sitemap.projects');
    Route::get('pages.xml', [SitemapController::class, 'pages'])->name('sitemap.pages');
});

// Test Routes
Route::get('cache-clear',      [TestController::class, 'cacheClear'])->name('cacheClear');
Route::get('config',           [TestController::class, 'config'])->name('config');
// Route::get('products-import',  [TestController::class, 'productsImport'])->name('productsImport');
// Route::get('product-imports', [TestController::class, 'productImports'])->name('productImports');


Route::get('{slug}',[PageController::class, 'commonPage'])->name('common.page');
