<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\Back\FaqController;
use App\Http\Controllers\Back\MenuController;
use App\Http\Controllers\Back\NewsController;
use App\Http\Controllers\Back\PageController;
use App\Http\Controllers\Back\RoleController;
use App\Http\Controllers\Back\TeamController;
use App\Http\Controllers\Back\AdminController;
use App\Http\Controllers\Back\SliderController;
use App\Http\Controllers\Back\GalleryController;
use App\Http\Controllers\Back\ProductController;
use App\Http\Controllers\Back\ProjectController;
use App\Http\Controllers\Back\ServiceController;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Back\CustomerController;
use App\Http\Controllers\Back\FrontendController;
use App\Http\Controllers\Back\OtherPageController;
use App\Http\Controllers\Back\PortfolioController;
use App\Http\Controllers\Back\PermissionController;
use App\Http\Controllers\Back\HomeSectionController;
use App\Http\Controllers\Back\TestimonialController;
use App\Http\Controllers\Back\FooterWidgetController;
use App\Http\Controllers\Back\NotificationController;
use App\Http\Controllers\Back\RequestContactController;
use App\Http\Controllers\Back\ProductSpecificationController;
use App\Http\Controllers\Back\ProductSpecificationValueController;

// Auth
// Route::get('login',             [AuthController::class, 'login'])->name('back.login');

Route::middleware('auth', 'isAdmin')->group(function () {
    // Other pages
    Route::get('/', [OtherPageController::class, 'dashboard']);
    Route::get('dashboard', [OtherPageController::class, 'dashboard'])->name('dashboard');

    // Page CRUD
    Route::get('pages/remove-image/{page}', [PageController::class, 'removeImage'])->name('admin.pages.removeImage');
    Route::resource('pages', PageController::class, ['as' => 'back']);

    /* gallery related routes */
    Route::post('galleries/upload-photo/{id}', [GalleryController::class, 'uploadPhoto'])->name('back.galleries.uploadPhoto');
    Route::post('galleries/upload-video/{id}', [GalleryController::class, 'uploadVideo'])->name('back.galleries.uploadVideo');
    Route::post('galleries/upload-embade/code/{id}', [GalleryController::class, 'uploadEmbedCode'])->name('back.galleries.uploadEmbedCode');
    Route::post('galleries/upload-pdf/{id}', [GalleryController::class, 'uploadPdf'])->name('back.galleries.uploadPdf');

    Route::get('galleries/delete-photo/{id}', [GalleryController::class, 'deletePhoto'])->name('back.galleries.deletePhoto');
    Route::post('galleries/change-photo-position', [GalleryController::class, 'changePhotoPosition'])->name('back.galleries.changePhotoPosition');
    Route::get('galleries/category', [GalleryController::class, 'category'])->name('back.galleries.category');
    Route::get('galleries/category/create', [GalleryController::class, 'categoryCreate'])->name('back.galleries.categoryCreate');

    Route::get('galleries/item/{id}/edit', [GalleryController::class, 'galleryEdit'])->name('back.galleries.editImage');
    Route::patch('back/gallery/item/{id}/update', [GalleryController::class, 'updateGalleryItem'])->name('back.galleries.item');

    Route::resource('galleries', GalleryController::class, ['as' => 'back']);



    // Category CRUD
    Route::get('categories/remove-image/{category}', [CategoryController::class, 'removeImage'])->name('back.categories.removeImage');
    Route::get('categories/delete/{category}', [CategoryController::class, 'delete'])->name('back.categories.delete');
    Route::get('categories/get-sub-options', [CategoryController::class, 'getSubOptions'])->name('back.categories.getSubOptions');
    Route::post('categories/update-ajax', [CategoryController::class, 'updateAjax'])->name('back.categories.updateAjax');
    Route::resource('categories', CategoryController::class, ['as' => 'back']);


    // News
    Route::resource('news', NewsController::class, ['as' => 'back']);
    Route::get('back/news/categories', [NewsController::class, 'categories'])->name('back.news.categories');
    Route::get('back/news/categories/edit/{id}', [NewsController::class, 'categoriesCreate'])->name('back.news.categories.edit');
    Route::get('news/remove-image/{news}', [NewsController::class, 'removeImage'])->name('back.news.removeImage');

    //Project
    Route::get('back/projects', ProjectController::class, 'index');

    // Product Controller
    Route::resource('product',ProductController::class, ['as`' => 'back']);
    Route::resource('product-specification', ProductSpecificationController::class, ['as' => 'back']);
    Route::resource('product-specification-value', ProductSpecificationValueController::class, ['as' => 'back']);

    Route::get('product/remove-image/{news}', [ProductController::class, 'removeImage'])->name('back.product.removeImage');

    Route::get('products/category', [ProductController::class, 'category'])->name('back.product.category');

    // portfolio controller
    Route::resource('portfolio', PortfolioController::class, ['as' => 'back']);



    // Client controller
    Route::resource('customer', CustomerController::class, ['as' => 'back']);

    // FAQ controller
    Route::resource('faq', FaqController::class, ['as' => 'back']);

    // Testimonial Controller
    Route::resource('testimonial', TestimonialController::class, ['as' => 'back']);

    // Service Controller
    Route::resource('service', ServiceController::class, ['as' => 'back']);

    // Team Controller
    Route::resource('team', TeamController::class, ['as' => 'back']);

    // Request Contact Controller
    Route::resource('request-contact', RequestContactController::class, ['as' => 'back']);


    // Admin CRUD
    // Update admin profile
    Route::get('profile/update-profile', [AdminController::class, 'update_profile_page'])->name('admin.update-profile');
    Route::post('profile/update-profile/action', [AdminController::class, 'update_profile'])->name('back.admins.update.action');
    Route::post('profile/update-password', [AdminController::class, 'update_password'])->name('admin.password-update');
    Route::get('admins/remove-image/{user}', [AdminController::class, 'removeImage'])->name('back.admins.removeImage');
    Route::resource('admins', AdminController::class, ['as' => 'back']);
    // role & permission
    Route::resource('role', RoleController::class, ['as' => 'back']);
    Route::resource('permission', PermissionController::class, ['as' => 'back']);

    // Media
    Route::get('media/settings', [MediaController::class, 'settings'])->name('back.media.settings');
    Route::post('media/settings', [MediaController::class, 'settingsUpdate']);
    Route::post('media/upload', [MediaController::class, 'upload'])->name('back.media.upload');
    // Image Upload
    Route::post('media/image-upload',  [MediaController::class, 'imageUpload'])->name('imageUpload');

    // Frontend
    Route::get('frontend/general', [FrontendController::class, 'general'])->name('back.frontend.general');
    Route::post('frontend/general', [FrontendController::class, 'generalStore']);

    /*frontend home section controller*/
    Route::get('frontend/section', [HomeSectionController::class, 'index'])->name('back.frontend.section');
    Route::post('frontend/section/store', [HomeSectionController::class, 'store'])->name('back.frontend.section.store');
    Route::get('frontend/section/edit{home_section}', [HomeSectionController::class, 'edit'])->name('back.frontend.section.edit');
    Route::post('frontend/section/update{home_section}', [HomeSectionController::class, 'update'])->name('back.frontend.section.update');
    Route::get('frontend/section/remove{home_section}', [HomeSectionController::class, 'remove'])->name('back.frontend.section.remove');
    Route::post('frontend/section/position/change', [HomeSectionController::class, 'positionUpdate'])->name('back.frontend.section.position.update');
    Route::post('frontend/section/type/store', [HomeSectionController::class, 'sectionTypeStore']);

    // Footer Widgets CRUD
    Route::resource('footer-widgets', FooterWidgetController::class, ['as' => 'back']);


    Route::post('sliders/position', [SliderController::class, 'position'])->name('back.sliders.position');
    Route::get('sliders/delete/{slider}', [SliderController::class, 'destroy'])->name('back.sliders.delete');
    Route::post('sliders/store', [SliderController::class, 'store']);
    Route::resource('sliders', SliderController::class, ['as' => 'back']);


    // Notification
    Route::get('notification/email', [NotificationController::class, 'email'])->name('back.notification.email');
    Route::get('notification/email/send', [NotificationController::class, 'emailSend'])->name('back.notification.emailSend');
    Route::post('notification/email/send', [NotificationController::class, 'emailSendSubmit']);
    Route::get('notification/email/show/{email}', [NotificationController::class, 'emailShow'])->name('back.notification.emailShow');
    Route::get('members-select-lists', [NotificationController::class, 'selectList'])->name('back.members.selectList');
    Route::get('notification/push', [NotificationController::class, 'push'])->name('back.notification.push');
    Route::post('notification/push', [NotificationController::class, 'pushSend']);

    // Menus
    Route::get('menus', [MenuController::class, 'index'])->name('back.menus.index');
    Route::post('menus/store', [MenuController::class, 'store'])->name('back.menus.store');
    Route::post('menus/store/menu-item', [MenuController::class, 'storeMenuItem'])->name('back.menus.storeMenuItem');
    Route::post('menus/menu-item/position', [MenuController::class, 'menuItemPosition'])->name('back.menus.menuItemPosition');
    Route::get('menus/destroy/{menu}', [MenuController::class, 'destroy'])->name('back.menus.destroy');
    Route::get('menus/item/destroy/{menu_item}', [MenuController::class, 'destroyItem'])->name('back.menus.destroyItem');
    Route::post('menus/item/edit-ajax', [MenuController::class, 'editItemAjax'])->name('back.menus.editItemAjax');
    Route::post('menus/item/update', [MenuController::class, 'updateItem'])->name('back.menus.updateItem');
});
