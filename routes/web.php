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
    Route::resource('productAccessories', 'ProductAccessoryController');
    Route::resource('productCategories', 'ProductCategoryController');
    Route::resource('productDetails', 'ProductDetailController');
    Route::resource('productImages', 'ProductImageController');
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