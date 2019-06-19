<?php

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
$baseAdminUrl = config('avored.admin_url');

Route::middleware(['web'])
    ->prefix($baseAdminUrl)
    ->namespace('AvoRed\\Framework')
    ->name('admin.')
    ->group(function () {

        Route::get('login', 'System\Controllers\LoginController@loginForm')
            ->name('login');
        Route::post('login', 'System\Controllers\LoginController@login')
            ->name('login.post');

        Route::post('logout', 'System\Controllers\LoginController@logout')
            ->name('logout');
    });

Route::middleware(['web', 'admin.auth'])
    ->prefix($baseAdminUrl)
    ->namespace('AvoRed\\Framework')
    ->name('admin.')
    ->group(function () {
        Route::get('', 'System\Controllers\DashboardController@index')
            ->name('dashboard');

        Route::get('configuration', 'System\Controllers\ConfigurationController@index')
            ->name('configuration.index');
        Route::post('configuration', 'System\Controllers\ConfigurationController@store')
            ->name('configuration.store');
        
        Route::get('menu', 'Cms\Controllers\MenuController@index')
            ->name('menu.index');
        Route::post('menu', 'Cms\Controllers\MenuController@store')
            ->name('menu.store');
        
        Route::post('admin-user-image', 'System\Controllers\AdminUserController@upload')
            ->name('admin-user-image-upload');

        Route::resource('admin-user', 'System\Controllers\AdminUserController');
        Route::resource('attribute', 'Catalog\Controllers\AttributeController');
        Route::resource('category', 'Catalog\Controllers\CategoryController');
        Route::resource('currency', 'System\Controllers\CurrencyController');
        Route::resource('language', 'System\Controllers\LanguageController');
        Route::resource('order-status', 'Order\Controllers\OrderStatusController');
        Route::resource('page', 'Cms\Controllers\PageController');
        Route::resource('property', 'Catalog\Controllers\PropertyController');
        Route::resource('product', 'Catalog\Controllers\ProductController');
        Route::resource('role', 'System\Controllers\RoleController');
        Route::resource('state', 'System\Controllers\StateController');
        Route::resource('user-group', 'User\Controllers\UserGroupController');
        Route::resource('tax-group', 'System\Controllers\TaxGroupController');
        Route::resource('tax-rate', 'System\Controllers\TaxRateController');
    });