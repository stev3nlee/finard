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

//Route::get('/', function () {
    //return view('index');
Route::get('/', 'HomeController@view');
//});
Route::get('/shop/{slug}', 'ShopController@view');
Route::get('/shop/category/{slug}', 'ShopController@category');
Route::get('/shop-detail/{slug}', 'ShopController@detail');
Route::get('/faq', 'ShopController@faq');
Route::get('/journal', 'JournalController@view');
Route::get('/journal-detail/{slug}', 'JournalController@detail');
Route::post('/contact-submit', 'HomeController@contact');
Route::post('/quotation-submit', 'HomeController@quotation');
Route::get('/about', 'HomeController@about');
Route::post('/newsletter', 'HomeController@newsletter');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/quotation-form', function () {
    return view('quotation-form');
});

Route::get('/ring-sizer', function () {
    return view('ring-sizer');
});

Route::group(['prefix' => 'finard-admin'], function () {
    Route::get('/', function () {
        return redirect('finard-admin/login');
    });
    Route::get('login', 'Admin\AuthController@checkLogin');
    Route::post('auth/login', 'Admin\AuthController@login');
    Route::get('auth/logout', 'Admin\AuthController@logout');

    Route::group(['middleware' => ['checksession']], function () {
        Route::get('dashboard', 'Admin\DashboardController@view');

        Route::get('banner', 'Admin\BannerController@view')
            ->name('banner_view');
        Route::get('banner/create', 'Admin\BannerController@create');
        Route::get('banner/edit/{id}', 'Admin\BannerController@edit');
        Route::post('banner/insert', 'Admin\BannerController@insert');
        Route::post('banner/update', 'Admin\BannerController@update');
        Route::get('banner/delete/{id}', 'Admin\BannerController@delete');
        Route::get('banner/status/{id}/{status}', 'Admin\BannerController@status');

        Route::get('category', 'Admin\CategoryController@view')
            ->name('category_view');
        Route::get('category/create', 'Admin\CategoryController@create');
        Route::get('category/edit/{id}', 'Admin\CategoryController@edit');
        Route::post('category/insert', 'Admin\CategoryController@insert');
        Route::post('category/update', 'Admin\CategoryController@update');
        Route::get('category/delete/{id}', 'Admin\CategoryController@delete');
        Route::get('category/status/{id}/{status}', 'Admin\CategoryController@status');

        Route::get('sub_category', 'Admin\SubCategoryController@view')
            ->name('sub_category_view');
        Route::get('sub_category/create', 'Admin\SubCategoryController@create');
        Route::get('sub_category/edit/{id}', 'Admin\SubCategoryController@edit');
        Route::post('sub_category/insert', 'Admin\SubCategoryController@insert');
        Route::post('sub_category/update', 'Admin\SubCategoryController@update');
        Route::get('sub_category/delete/{id}', 'Admin\SubCategoryController@delete');
        Route::get('sub_category/status/{id}/{status}', 'Admin\SubCategoryController@status');

        Route::get('journal', 'Admin\JournalController@view')
            ->name('journal_view');
        Route::get('journal/create', 'Admin\JournalController@create');
        Route::get('journal/edit/{id}', 'Admin\JournalController@edit');
        Route::post('journal/insert', 'Admin\JournalController@insert');
        Route::post('journal/update', 'Admin\JournalController@update');
        Route::get('journal/delete/{id}', 'Admin\JournalController@delete');
        Route::get('journal/status/{id}/{status}', 'Admin\JournalController@status');

        Route::get('faq_category', 'Admin\FaqCategoryController@view')
            ->name('faq_category_view');
        Route::get('faq_category/create', 'Admin\FaqCategoryController@create');
        Route::get('faq_category/edit/{id}', 'Admin\FaqCategoryController@edit');
        Route::post('faq_category/insert', 'Admin\FaqCategoryController@insert');
        Route::post('faq_category/update', 'Admin\FaqCategoryController@update');
        Route::get('faq_category/delete/{id}', 'Admin\FaqCategoryController@delete');
        Route::get('faq_category/status/{id}/{status}', 'Admin\FaqCategoryController@status');

        Route::get('faq', 'Admin\FaqController@view')
            ->name('faq_view');
        Route::get('faq/create', 'Admin\FaqController@create');
        Route::get('faq/edit/{id}', 'Admin\FaqController@edit');
        Route::post('faq/insert', 'Admin\FaqController@insert');
        Route::post('faq/update', 'Admin\FaqController@update');
        Route::get('faq/delete/{id}', 'Admin\FaqController@delete');
        Route::get('faq/status/{id}/{status}', 'Admin\FaqController@status');

        Route::get('product', 'Admin\ProductController@view')
            ->name('product_view');
        Route::get('product/create', 'Admin\ProductController@create');
        Route::get('product/edit/{id}', 'Admin\ProductController@edit');
        Route::post('product/insert', 'Admin\ProductController@insert');
        Route::post('product/update', 'Admin\ProductController@update');
        Route::get('product/delete/{id}', 'Admin\ProductController@delete');
        Route::get('product/status/{id}/{status}', 'Admin\ProductController@status');

        Route::get('contact', 'Admin\ContactController@view')
            ->name('contact_view');
        Route::get('contact/detail/{id}', 'Admin\ContactController@detail');
        Route::get('contact/delete/{id}', 'Admin\ContactController@delete');

        Route::get('quotation', 'Admin\QuotationController@view')
            ->name('quotation_view');
        Route::get('quotation/detail/{id}', 'Admin\QuotationController@detail');
        Route::get('quotation/delete/{id}', 'Admin\QuotationController@delete');

        Route::get('color', 'Admin\ColorController@view')
            ->name('color_view');
        Route::get('color/create', 'Admin\ColorController@create');
        Route::get('color/edit/{id}', 'Admin\ColorController@edit');
        Route::post('color/insert', 'Admin\ColorController@insert');
        Route::post('color/update', 'Admin\ColorController@update');
        Route::get('color/delete/{id}', 'Admin\ColorController@delete');
        Route::get('color/status/{id}/{status}', 'Admin\ColorController@status');

        Route::get('about', 'Admin\DashboardController@about')
            ->name('about_view');
        Route::post('about/update', 'Admin\DashboardController@about_update');

        Route::get('company_data', 'Admin\DashboardController@company_data')
            ->name('company_data_view');
        Route::post('company_data/update', 'Admin\DashboardController@company_data_update');

        Route::get('ring_sizer', 'Admin\DashboardController@ring_sizer')
            ->name('ring_sizer_view');
        Route::post('ring_sizer/update', 'Admin\DashboardController@ring_sizer_update');

        Route::get('admin', 'Admin\AdminController@view')
            ->name('admin_view');
        Route::get('admin/create', 'Admin\AdminController@create');
        Route::get('admin/edit/{id}', 'Admin\AdminController@edit');
        Route::post('admin/insert', 'Admin\AdminController@insert');
        Route::post('admin/update', 'Admin\AdminController@update');
        Route::get('admin/delete/{id}', 'Admin\AdminController@delete');
        Route::get('admin/status/{id}/{status}', 'Admin\AdminController@status');
    });
});

