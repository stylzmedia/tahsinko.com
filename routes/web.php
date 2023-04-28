<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

// Other Pages
Route::get('/', [PageController::class, 'homepage'])->name('homepage');

// Route::get('/home', [PageController::class, 'frontpage'])->name('frontpage');

Route::get('contact-us', [PageController::class, 'contactUs'])->name('contactUs');
Route::get('about-us', [PageController::class, 'aboutUs'])->name('aboutUs');
Route::get('our-ceo', [PageController::class, 'ourCeo'])->name('ourCeo');
Route::post('contact-us/form/submit', [ContactUsController::class, 'contact'])->name('contact.us.store');

Route::get('page/{slug}',[PageController::class, 'commonPage'])->name('common.page');



// Auth Routes
Auth::routes();

Route::post('register', [AuthController::class, 'registerSubmit']);
Route::get('email-verify/{id}', [AuthController::class, 'emailVerify'])->name('emailVerify');
Route::get('resend-email-verify/{id}', [AuthController::class, 'resendVerifyLink'])->name('resendVerifyLink');
Route::get('email-verify-check/{id}', [AuthController::class, 'emailVerifyCheck'])->name('emailVerifyCheck');

// single pages
Route::get('news/{blog}', [PageController::class, 'singleNews'])->name('news.single');
Route::get('product/{name}', [PageController::class, 'singleProduct'])->name('product.single');

// Test Routes
// Route::get('test',             [TestController::class, 'test'])->name('test');
Route::get('cache-clear',      [TestController::class, 'cacheClear'])->name('cacheClear');
Route::get('config',           [TestController::class, 'config'])->name('config');

