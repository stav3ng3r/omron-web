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

Auth::routes();


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'HomeController@index');
    Route::resource('users', 'UserController');
    Route::resource('clients', 'ClientController');
    Route::resource('clients', 'ClientController');
    Route::resource('clients', 'ClientController');
    Route::resource('clientContacts', 'ClientContactController');
    Route::resource('clientAddresses', 'ClientAddressController');
    Route::resource('clientPaymentMethods', 'ClientPaymentMethodController');
    Route::resource('clientPaymentMethods', 'ClientPaymentMethodController');
    Route::resource('clientPaymentMethods', 'ClientPaymentMethodController');
    Route::resource('currencies', 'CurrencyController');
    Route::resource('countries', 'CountryController');
    Route::resource('people', 'PersonController');
    Route::resource('userTypes', 'UserTypeController');
    Route::resource('cnUsers', 'CnUserController');
    Route::resource('salesmen', 'SalesmanController');
    Route::resource('distributionCenters', 'DistributionCenterController');
    Route::resource('distributors', 'DistributorController');
    Route::resource('distributorMarkups', 'DistributorMarkupController');
    Route::resource('distributorMultipliers', 'DistributorMultiplierController');
    Route::resource('regionalOffices', 'RegionalOfficeController');
    Route::resource('products', 'ProductController');
//    Route::resource('productAccessories', 'ProductAccessoryController');
    Route::resource('productCategories', 'ProductCategoryController');

    Route::prefix('products/{product}/details')->group(function () {
        Route::get('create', 'ProductDetailController@create')->name('productDetails.create');
        Route::post('/', 'ProductDetailController@store')->name('productDetails.store');
        Route::patch('{productDetail}', 'ProductDetailController@update')->name('productDetails.update');
        Route::delete('{productDetail}', 'ProductDetailController@destroy')->name('productDetails.destroy');
        Route::get('/', 'ProductDetailController@index')->name('productDetails.index');
        Route::get('{productDetail}/edit', 'ProductDetailController@edit')->name('productDetails.edit');
    });

    Route::prefix('products/{product}/accessories')->group(function () {
        Route::post('/', 'ProductAccessoryController@store')->name('productAccessories.store');
        Route::delete('{productAccessory}', 'ProductAccessoryController@destroy')->name('productAccessories.destroy');
    });

    Route::prefix('products/{product}/images')->group(function () {
        Route::post('/', 'ProductImageController@store')->name('productImages.store');
        Route::delete('{productImage}', 'ProductImageController@destroy')->name('productImages.destroy');
    });


//    Route::resource('productImages', 'ProductImageController');
    Route::resource('productBrands', 'ProductBrandController');
    Route::resource('productPromotions', 'ProductPromotionController');
    Route::resource('productTypes', 'ProductTypeController');
    Route::resource('stockMovements', 'StockMovementController');
    Route::resource('stocks', 'StockController');

});


Route::get('/test', function () {
    $role = \Bouncer::role()->firstOrCreate(['name' => 'superadmin', 'title' => 'Super Administrador']);

    Bouncer::allow($role)->everything();

    return $role;
});


Route::resource('cities', 'CityController');