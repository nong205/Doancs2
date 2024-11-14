<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Client\AuthController as ClientAuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Backend\CategoryController;

Route::get('/', [HomeController::class, 'home'])->name('client.home');

Route::get('auth/google', [ClientAuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [ClientAuthController::class, 'handleGoogleCallback']);

Route::get('/dang-ky', [ClientAuthController::class, 'register'])->name('client.register');
Route::post('/dang-ky', [ClientAuthController::class, 'handle_register']);
Route::get('/verify/{token}', [ClientAuthController::class, 'verify'])->name('client.verify');

Route::get('/dang-nhap', [ClientAuthController::class, 'login'])->name('client.login');
Route::post('/dang-nhap', [ClientAuthController::class, 'handle_login']);

Route::get('/quen-mat-khau', [ClientAuthController::class, 'forgot'])->name('client.forgot');
Route::post('/quen-mat-khau', [ClientAuthController::class, 'handle_forgot']);
Route::get('/reset/{token}', [ClientAuthController::class, 'reset_password'])->name('client.reset');
Route::post('/reset/{token}', [ClientAuthController::class, 'handle_reset_password']);

Route::get('/contact', [HomeController::class, 'contact'])->name('client.contact');

Route::get('danh-muc/{slug}', [HomeController::class, 'blogCategory'])->name('client.blog.category');

Route::get('bai-viet/{slug}.html', [HomeController::class, 'blogDetail'])->name('client.blog.detail');

Route::get('/bai-viet/tag/{name}', [HomeController::class, 'blogTag'])->name('client.blog.tag');

Route::get('/search/', [HomeController::class, 'search'])->name('client.blog.search');

Route::prefix('panel')->group(function() {

    Route::get('/login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'handleLogin']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');


    Route::group(['middleware' => 'check.login'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::group(['middleware' => 'admin'], function () {

            Route::get('/user', [UserController::class, 'index'])->name('admin.user.index');
            Route::get('/user/create', [UserController::class, 'create_user'])->name('admin.user.create');
            Route::post('/user/create', [UserController::class, 'handle_create_user']);

            Route::get('/user/update/{id}', [UserController::class, 'update_user'])->name('admin.user.update');
            Route::put('/user/update/{id}', [UserController::class, 'handle_update_user'])->name('admin.user.update');
            Route::get('/user/delete/{id}', [UserController::class, 'delete_user'])->name('admin.user.delete');

            Route::get('/category', [CategoryController::class, 'index'])->name('admin.category.index');
            Route::get('/category/create', [CategoryController::class, 'create_category'])->name('admin.category.create');
            Route::post('/category/create', [CategoryController::class, 'handle_create_category']);

            Route::get('/category/update/{id}', [CategoryController::class, 'update_category'])->name('admin.category.update');
            Route::put('/category/update/{id}', [CategoryController::class, 'handle_update_category'])->name('admin.category.update');
            Route::get('/category/delete/{id}', [CategoryController::class, 'delete_category'])->name('admin.category.delete');
        });
        Route::get('/blog', [BlogController::class, 'blog'])->name('admin.blog');
        Route::get('/blog/recycle', [BlogController::class, 'recycle'])->name('admin.blog.recycle');
        Route::get('/blog/create', [BlogController::class, 'create_blog'])->name('admin.blog.create');
        Route::post('/blog/create', [BlogController::class, 'handle_create_blog']);

        Route::get('/blog/update/{id}', [BlogController::class, 'update_blog'])->name('admin.blog.update');
        Route::put('/blog/update/{id}', [BlogController::class, 'handle_update_blog']);
        Route::get('/blog/delete/{id}', [BlogController::class, 'delete_blog'])->name('admin.blog.delete');
        Route::get('/blog/restore/{id}', [BlogController::class, 'restore'])->name('admin.blog.restore');

        Route::get('/blog/force-delete/{id}', [BlogController::class, 'force_delete'])->name('admin.blog.force-delete');
    });

});
