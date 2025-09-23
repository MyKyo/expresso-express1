<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\BlogController as PublicBlogController;
use App\Http\Controllers\AboutController as PublicAboutController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CoffeeItemController;
use App\Http\Controllers\Admin\KategoriController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Clear All:
Route::get('/clear', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('optimize');
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('config:cache');
    return '<h1>Berhasil dibersihkan</h1>';
});

Route::get('/', function () {
    return view('home');
});

// Authentication
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard
Route::get('/keluar', [HomeController::class, 'keluar']);
Route::get('/admin/home', [HomeController::class, 'index']);
Route::get('/admin/change', [HomeController::class, 'change']);
Route::post('/admin/change_password', [HomeController::class, 'change_password']);

// Kategori
Route::prefix('admin/kategori')
    ->name('admin.kategori.')
    ->middleware('cekLevel:1 2')
    ->controller(KategoriController::class)
    ->group(function () {
        Route::get('/', 'read')->name('read');
        Route::get('/add', 'add')->name('add');
        Route::post('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'delete')->name('delete');
    });

// Banner
Route::prefix('admin/banner')
    ->name('admin.banner.')
    ->middleware('cekLevel:1 2')
    ->controller(BannerController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/add', 'create')->name('add');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{banner}', 'edit')->name('edit');
        Route::post('/update/{banner}', 'update')->name('update');
        Route::get('/delete/{banner}', 'destroy')->name('delete');
        Route::post('/toggle/{banner}', 'toggle')->name('toggle');
    });

// Blog Admin
Route::prefix('admin/blog')
    ->name('admin.blog.')
    ->middleware('cekLevel:1 2')
    ->controller(BlogPostController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/add', 'create')->name('add');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{blog}', 'edit')->name('edit');
        Route::post('/update/{blog}', 'update')->name('update');
        Route::get('/delete/{blog}', 'destroy')->name('delete');
    });

// Blog Public
Route::get('/blog', [PublicBlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [PublicBlogController::class, 'show'])->name('blog.show');
Route::get('/about', [PublicAboutController::class, 'show'])->name('about.show');

// Product Admin
Route::prefix('admin/product')
    ->name('admin.product.')
    ->middleware('cekLevel:1 2')
    ->controller(ProductController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/add', 'create')->name('add');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{product}', 'edit')->name('edit');
        Route::post('/update/{product}', 'update')->name('update');
        Route::get('/delete/{product}', 'destroy')->name('delete');
    });

// Coffee Items Admin
Route::prefix('admin/coffee')
    ->name('admin.coffee.')
    ->middleware('cekLevel:1 2')
    ->controller(CoffeeItemController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/add', 'create')->name('add');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{coffee}', 'edit')->name('edit');
        Route::post('/update/{coffee}', 'update')->name('update');
        Route::get('/delete/{coffee}', 'destroy')->name('delete');
    });

// About Admin
use App\Http\Controllers\Admin\AboutController as AdminAboutController;
Route::prefix('admin/about')
    ->name('admin.about.')
    ->middleware('cekLevel:1 2')
    ->controller(AdminAboutController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/add', 'create')->name('add');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{about}', 'edit')->name('edit');
        Route::post('/update/{about}', 'update')->name('update');
        Route::get('/delete/{about}', 'destroy')->name('delete');
    });

// Team Admin
use App\Http\Controllers\Admin\TeamController;
Route::prefix('admin/team')
    ->name('admin.team.')
    ->middleware('cekLevel:1 2')
    ->controller(TeamController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/add', 'create')->name('add');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{team}', 'edit')->name('edit');
        Route::post('/update/{team}', 'update')->name('update');
        Route::get('/delete/{team}', 'destroy')->name('delete');
    });