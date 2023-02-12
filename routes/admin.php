<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Models\BlogCategory;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\MailController;

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



//====================Admin Authentication=========================

Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('login.admin');
Route::post('admin/login', [AdminLoginController::class, 'login'])->name('admin.login');
Route::get('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');


Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth:admin'], 'where' => ['locale' => '[a-zA-Z]{2}']], function () {
    // {{--('BRAND')--}}
Route::get('/view',[NewsLetterController::class,'index'])->name('newsletter.list');


Route::get('/brand',[BrandController::class,'view'])->name('brand.index');
Route::get('/add', [BrandController::class, 'create'])->name('brand.create');
Route::post('/add', [BrandController::class, 'store'])->name('brand.store');
Route::get('/edit/{brand}', [BrandController::class, 'edit'])->name('admin.brand.edit');
Route::put('/update/{brand}', [BrandController::class, 'update'])->name('admin.brand.update');
Route::get('/{brand:slug}/ads', [BrandController::class, 'show'])->name('admin.brand.show');
Route::delete('/destroy/{brand}', [BrandController::class, 'destroy'])->name('admin.brand.destroy');


Route::get('/sc',[SettingsController::class,'setview'])->name('settings.MobileApp.index');
Route::get('/currency',[CurrencyController::class,'currenview'])->name('settings.Currency.index');
Route::get('/languages',[LanguageController::class,'index'])->name('settings.Language.index');
Route::get('/general',[GeneralController::class,'genview'])->name('settings.General.general');
Route::get('/smtp',[MailController::class,'mailview'])->name('settings.Smtp.mail');



    Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@dashboard']);
    Route::get('/cc', 'DashboardController@cacheClear')->name('cacheClear');
    Route::get('settings', ['as' => 'settings', 'uses' => 'SettingsController@settings']);

    //Custom Page
    Route::get('cpage/index', ['as' => 'cpage.index', 'uses' => 'CustomPageController@index']);
    Route::get('cpage/create', ['as' => 'cpage.create', 'uses' => 'CustomPageController@create']);
    Route::post('cpage/id/store', ['as' => 'cpage.store', 'uses' => 'CustomPageController@store']);
    Route::get('cpage/edit', ['as' => 'cpage.edit', 'uses' => 'CustomPageController@edit']);
    Route::get('cpage/view', ['as' => 'cpage.view', 'uses' => 'CustomPageController@view']);
    Route::post('cpage/{id}/update', ['as' => 'cpage.update', 'uses' => 'CustomPageController@update']);
    Route::get('cpage/{id}/delete', ['as' => 'cpage.delete', 'uses' => 'CustomPageController@delete']);

    Route::get('ajax/text-editor/image', ['as' => 'text-editor.image', 'uses' => 'CustomPageController@postEditorImageUpload']);


    //Faq
    Route::group(['prefix' => 'faq', 'as' => 'faq.'], function () {
        Route::get('/', 'FaqController@index')->name('index');
        Route::get('create', 'FaqController@create')->name('create');
        Route::post('store', 'FaqController@store')->name('store');
        Route::get('view/{id}', 'FaqController@view')->name('view');
        Route::get('edit/{id}', 'FaqController@edit')->name('edit');
        Route::post('update/{id}', 'FaqController@update')->name('update');
        Route::get('delete', 'FaqController@delete')->name('delete');
    });



    // Account Setting
    // Route::get('account', ['as'=>'account','uses'=>'AccountController@account']);
    // Route::get('edit-account', ['as'=>'edit.account','uses'=>'AccountController@editAccount']);
    // Route::post('update-account', ['as'=>'update.account','uses'=>'AccountController@updateAccount']);
    // Route::get('change-password', ['as'=>'change.password','uses'=>'AccountController@changePassword']);
    // Route::post('update-password', ['as'=>'update.password','uses'=>'AccountController@updatePassword']);



    // Setting
    Route::get('pages', 'SettingsController@pages')->name('pages');
    Route::get('page/{home}', 'SettingsController@editHomePage')->name('edit.home');
    Route::post('page/{home}/update', 'SettingsController@updateHomePage')->name('update.home');

    Route::get('settings', 'SettingsController@settings')->name('settings');
    Route::post('change-settings', 'SettingsController@changeSettings')->name('change.settings');
    Route::get('tax-setting', 'SettingsController@taxSetting')->name('tax.setting');
    Route::post('update-tex-setting', 'SettingsController@updateTaxSetting')->name('update.tax.setting');
    Route::post('update-email-setting', 'SettingsController@updateEmailSetting')->name('update.email.setting');
    Route::get('test-email', 'SettingsController@testEmail')->name('test.email');
    //cards
    //  Route::get('cards', 'CardController@index')->name('cards');
    // Route::get('card/trash', 'CardController@getTrashList')->name('card.trash');
    // Route::get('card/edit/{card_id}', 'CardController@edit')->name('card.edit');
    // Route::get('card/delete/{card_id}', 'CardController@delete')->name('card.delete');
    // Route::get('card/change-status/{card_id}', 'CardController@changeStatus')->name('card.change-status');
    // Route::get('card/active/{card_id}', 'CardController@activeCard')->name('card.active');

    // Plans
    // Route::get('plans', 'PlanController@plans')->name('plans');
    // Route::get('add-plan', 'PlanController@addPlan')->name('add.plan');
    // Route::post('save-plan', 'PlanController@savePlan')->name('save.plan');
    // Route::get('edit-plan/{id}', 'PlanController@editPlan')->name('edit.plan');
    // Route::get('shareable-update/{id}', 'PlanController@shareableUpdate')->name('shareable-update');
    // Route::post('update-plan', 'PlanController@updatePlan')->name('update.plan');
    // Route::get('plan/{id}/{period}/getstripe', 'PlanController@getstripe')->name('plan.getstripe');
    // Route::get('plan/{id}/{period}/getpaypal', 'PlanController@createPaypalPlan')->name('plan.getpaypal');
    // Route::get('delete-plan', 'PlanController@deletePlan')->name('delete.plan');

    // Users
    Route::get('roles', 'RolesController@index')->name('roles.index');
    Route::get('roles/create', 'RolesController@create')->name('roles.create');
    Route::post('roles/store', 'RolesController@store')->name('roles.store');
    Route::get('roles/{id}/show', 'RolesController@show')->name('roles.show');
    Route::get('roles/{id}/edit', 'RolesController@edit')->name('roles.edit');
    Route::post('roles/{id}/update', 'RolesController@update')->name('roles.update');
    Route::delete('roles/{id}/destroy', 'RolesController@destroy')->name('roles.destroy');


    Route::get('permissions', 'PermissionsController@index')->name('permissions.index');
    Route::get('permissions/create', 'PermissionsController@create')->name('permissions.create');
    Route::post('permissions/store', 'PermissionsController@store')->name('permissions.store');
    Route::get('permissions/{id}/show', 'PermissionsController@show')->name('permissions.show');
    Route::get('permissions/{id}/edit', 'PermissionsController@edit')->name('permissions.edit');
    Route::post('permissions/{id}/update', 'PermissionsController@update')->name('permissions.update');
    Route::post('permissions/{id}/destroy', 'PermissionsController@destroy')->name('permissions.destroy');

    Route::get('user', 'UserController@index')->name('user.index');
    Route::get('user/create', 'UserController@create')->name('user.create');
    Route::post('user/store', 'UserController@store')->name('user.store');
    Route::get('user/{id}/edit', 'UserController@edit')->name('user.edit');
    Route::post('user/{id}/update', 'UserController@update')->name('user.update');
    Route::post('user/{id}/destroy', 'UserController@destroy')->name('user.destroy');

    // Route::resource('roles', RolesController::class);
    // Route::resource('permissions', PermissionsController::class);

    Route::get('edit-user/{id}', 'UserController@editUser')->name('edit.user');
    Route::post('update-user', 'UserController@updateUser')->name('update.user');
    Route::get('view-user/{id}', 'UserController@viewUser')->name('view.user');
    Route::get('change-user-plan/{id}', 'UserController@ChangeUserPlan')->name('change.user.plan');
    Route::post('update-user-plan', 'UserController@UpdateUserPlan')->name('update.user.plan');
    Route::get('update-status', 'UserController@updateStatus')->name('update.status');
    Route::get('active-user/{id}', 'UserController@activeStatus')->name('update.active-user');
    Route::get('delete-user', 'UserController@deleteUser')->name('delete.user');
    Route::get('login-as/{id}', 'UserController@authAs')->name('login-as.user');
    Route::get('user/trash-list', 'UserController@getTrashList')->name('user.trash-list');


    // industry
    Route::group(['prefix' => 'insdustries', 'as' => 'industry.'], function () {
        Route::get('/', 'InsdustryController@index')->name('index');
        Route::get('create', 'InsdustryController@create')->name('create');
        Route::post('store', 'InsdustryController@store')->name('store');
        Route::get('edit/{slug}', 'InsdustryController@edit')->name('edit');
        Route::post('update/{slug}', 'InsdustryController@update')->name('update');
        Route::get('delete/{id}', 'InsdustryController@delete')->name('delete');
    });

    // location
    Route::group(['prefix' => 'locations', 'as' => 'location.'], function () {
        Route::get('/', 'LocationController@index')->name('index');
        Route::get('create', 'LocationController@create')->name('create');
        Route::post('store', 'LocationController@store')->name('store');
        Route::get('edit/{slug}', 'LocationController@edit')->name('edit');
        Route::post('update/{slug}', 'LocationController@update')->name('update');
        Route::get('delete', 'LocationController@delete')->name('delete');
    });

    // investment
    Route::group(['prefix' => 'investments', 'as' => 'investment.'], function () {
        Route::get('/', 'InvestmentController@index')->name('index');
        Route::get('create', 'InvestmentController@create')->name('create');
        Route::post('store', 'InvestmentController@store')->name('store');
        Route::get('edit/{slug}', 'InvestmentController@edit')->name('edit');
        Route::post('update/{slug}', 'InvestmentController@update')->name('update');
        Route::get('delete', 'InvestmentController@delete')->name('delete');
    });

    // admin profile
    Route::get('profile', 'DashboardController@adminProfile')->name('profile');


    // franchises list
    Route::get('franchises', 'FranchisesController@index')->name('franchises.index');
    Route::get('franchise/create', 'FranchisesController@create')->name('franchises.create');
    Route::post('franchise/store', 'FranchisesController@store')->name('franchises.store');
    Route::get('franchise/{slug}/edit', 'FranchisesController@edit')->name('franchises.edit');
    Route::post('franchise/{slug}/update', 'FranchisesController@update')->name('franchises.update');
    Route::get('franchise/view/{slug}', 'FranchisesController@view')->name('franchises.view');
    Route::get('franchise/delete/{id}', 'FranchisesController@delete')->name('franchises.delete');


     //Category
     Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('/', 'CategoryController@index')->name('index');
        Route::post('/store', 'CategoryController@store')->name('store');
        Route::get('/{id}/edit', 'CategoryController@edit')->name('edit');
        Route::post('/{id}/update', 'CategoryController@update')->name('update');
        Route::get('/{id}/delete', 'CategoryController@delete')->name('delete');
    });

    //SubCategory
    Route::group(['prefix' => 'subcategory', 'as' => 'subcategory.'], function () {
        Route::get('/', 'SubCategoryController@index')->name('index');
        Route::post('/store', 'SubCategoryController@store')->name('store');
        Route::get('/{id}/edit', 'SubCategoryController@edit')->name('edit');
        Route::post('/{id}/update', 'SubCategoryController@update')->name('update');
        Route::get('/{id}/delete', 'SubCategoryController@delete')->name('delete');
    });


    //Blog Category
    Route::group(['prefix' => 'blog-category', 'as' => 'blog-category.'], function () {
        Route::get('/', 'BlogCategoryController@index')->name('index');
        Route::post('/store', 'BlogCategoryController@store')->name('store');
        Route::get('/{id}/edit', 'BlogCategoryController@edit')->name('edit');
        Route::post('/{id}/update', 'BlogCategoryController@update')->name('update');
        Route::get('/{id}/delete', 'BlogCategoryController@delete')->name('delete');
    });

    //Blog Post
    Route::group(['prefix' => 'blog-post', 'as' => 'blog-post.'], function () {
        Route::get('/', 'BlogPostController@index')->name('index');
        Route::get('create', 'BlogPostController@create')->name('create');
        Route::post('store', 'BlogPostController@store')->name('store');
        Route::get('{id}/edit', 'BlogPostController@edit')->name('edit');
        Route::post('{id}/update', 'BlogPostController@update')->name('update');
        Route::get('{id}/view', 'BlogPostController@view')->name('view');
        Route::get('{id}/delete', 'BlogPostController@delete')->name('delete');
    });

    //Contact
    Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
        Route::get('/', 'ContactController@index')->name('index');
        Route::get('create', 'ContactController@create')->name('create');
        Route::post('store', 'ContactController@store')->name('store');
        Route::get('{id}/edit', 'ContactController@edit')->name('edit');
        Route::post('{id}/update', 'ContactController@update')->name('update');
        Route::get('{id}/view', 'ContactController@view')->name('view');
        Route::get('{id}/delete', 'ContactController@delete')->name('delete');
    });



});
