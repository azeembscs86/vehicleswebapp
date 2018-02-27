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

Route::get('/', function () {
    return view('welcome');
});

//FRONTEND
Route::get('/', ['uses' => 'PagesController@homeVersion']);
Route::get('satellitephone', ['uses' => 'PagesController@satellitephone']);
Route::get('travelinsurance', ['uses' => 'PagesController@tavelinsurance']);
Route::get('payments', ['uses' => 'PagesController@payments']);
Route::get('contact', ['uses' => 'PagesController@contact']);
Route::get('search', ['uses' => 'PagesController@search']);
Route::post('faredetails', ['uses' => 'PagesController@faredetails']);
Route::get('booking/{id}', ['uses' => 'PagesController@booking']);
Route::post('order', ['uses' => 'PagesController@ordernow']);
Route::post('search', ['uses' => 'PagesController@searchingForm']);
Route::post('fare_addservices', ['uses' => 'PagesController@fare_addservices']);
Route::post('booknow', ['uses' => 'PagesController@booknow']);
Route::post('bookinginfo', ['uses' => 'PagesController@submitbooking_info']);
Route::get('review', ['uses' => 'PagesController@review']);
Route::get('thanks', ['uses' => 'PagesController@thanks']);
Route::post('get-vehicles-companies', ['uses' => 'PagesController@getVehiclesByCompany']);
Route::post('get-vehicles-categories', ['uses' => 'PagesController@getVehiclesByCategory']);

Route::get('/admin/dashboard', 'Admin\AdminController@index');

Route::prefix('admin')->group(function(){    
    
    Route::get('/login', 'Auth\AuthorController@showLoginForm')->name('admin.login');
    
    Route::post('/login', 'Auth\AuthorController@login')->name('admin.login.submit');        
    
    Route::get('/cities',  'Admin\Cities\CitiesController@index');  //get cities list
    
    Route::post('/cities/add-city',  'Admin\Cities\CitiesController@addCity');  //add new  city
    
    Route::post('/cities/update-city',  'Admin\Cities\CitiesController@updateCity');  //update city
    
    Route::get('/cities/destroy/{slug}', 'Admin\Cities\CitiesController@destroy');//delete cotu
    
    Route::get('/companies',  'Admin\Companies\CompaniesController@index');  //get companies list
    
    Route::post('/companies/add-company',  'Admin\Companies\CompaniesController@addCompany');  //add new  company
    
    Route::post('/companies/update-company',  'Admin\Companies\CompaniesController@updateCompany');  //update company
    
    Route::get('/companies/destroy/{slug}', 'Admin\Companies\CompaniesController@destroy');//delete comapny        
    
    Route::get('/cities-companies',  'Admin\CitiesCompanies\CitiesCompaniesController@index');  //get cities companies list
    
    Route::post('/cities-companies/add-citycompany',  'Admin\CitiesCompanies\CitiesCompaniesController@create');  //get cities companies list
    
    Route::post('/cities-companies//update-citycompany',  'Admin\CitiesCompanies\CitiesCompaniesController@update');  //get cities companies list
    
    Route::get('/cities-companies/destroy/{slug}',  'Admin\CitiesCompanies\CitiesCompaniesController@destroy');  //get cities companies list
    
    
    
    
    
    
    Route::get('/inclusions',  'Admin\Inclusions\InclusionsController@index');  //get Inclusions list
    
    Route::post('/inclusions/add-inclusions',  'Admin\Inclusions\InclusionsController@addInclusions');  //add new  Inclusions
    
    Route::post('/inclusions/update-inclusions',  'Admin\Inclusions\InclusionsController@updateInclusion');  //update Inclusions
    
    Route::get('/inclusions/destroy/{slug}', 'Admin\Inclusions\InclusionsController@destroy');//delete Inclusions
        
    Route::get('/equipments',  'Admin\Equipments\EquipmentsController@index');  //get Equipments list
    
    Route::post('/equipments/add-equipment',  'Admin\Equipments\EquipmentsController@addEquipment');  //add new  Inclusions
    
    Route::post('/equipments/update-equipment',  'Admin\Equipments\EquipmentsController@updateEquipment');  //update Inclusions
    
    Route::get('/equipments/destroy/{slug}', 'Admin\Equipments\EquipmentsController@destroy');//delete Inclusions
    
    
    Route::get('/additional-services',  'Admin\Additionalservices\AdditionalServicesController@index');  //get Additionalservices list
    
    Route::post('/additional-services/add-services',  'Admin\Additionalservices\AdditionalServicesController@addServices');  //add new  Additionalservices
    
    Route::post('/additional-services/update-services',  'Admin\Additionalservices\AdditionalServicesController@updateServices');  //update Additionalservices
    
    Route::get('/additional-services/destroy/{slug}', 'Admin\Additionalservices\AdditionalServicesController@destroy');//delete Additionalservices
    
    Route::get('/vehicle-types',  'Admin\VehicleTypes\VehicleTypesController@index');  //get VehicleTypes list
    
    Route::get('/categories',  'Admin\Categories\CategoriesController@index');  //get Categories list
    
    Route::post('/categories/add-categories',  'Admin\Categories\CategoriesController@addCategory');  //add new  categories
    
    Route::post('/categories/update-categories',  'Admin\Categories\CategoriesController@updateCategory');  //update categories
    
    Route::get('/categories/destroy/{slug}', 'Admin\Categories\CategoriesController@destroy');//delete categories
    
    Route::get('/currencies',  'Admin\Currencies\CurrenciesController@index');  //get Currencies list
    
    Route::post('/currencies/add-currencies',  'Admin\Currencies\CurrenciesController@addCurrency');  //add new  Currencies
    
    Route::post('/currencies/update-currencies',  'Admin\Currencies\CurrenciesController@updateCurrency');  //update Currencies
    
    Route::get('/currencies/destroy/{slug}', 'Admin\Currencies\CurrenciesController@destroy');//delete Currencies
    
    
    Route::get('/seasons',  'Admin\Seasons\SeasonsController@index');  //get Seasons list
    
    Route::get('/seasons/add-season',  'Admin\Seasons\SeasonsController@addSeason');  //get Season Form
    
    Route::post('/seasons/create',  'Admin\Seasons\SeasonsController@create');  //get Season Form
    
    Route::post('/seasons/get-companies',  'Admin\Seasons\SeasonsController@getCompaniesByCity');  //get Season Form
    
    Route::get('/seasons/edit-season/{slug}',  'Admin\Seasons\SeasonsController@updateSeason');  //get edit Season Form
    
    Route::post('/seasons/update',  'Admin\Seasons\SeasonsController@update');  //get edit Season Form
    
    Route::post('/seasons/get-company',  'Admin\Seasons\SeasonsController@getCompaniesCity');  //get Season Form
    
    Route::get('/seasons/destroy/{slug}', 'Admin\Seasons\SeasonsController@destroy');//delete Seasons
    
    Route::get('/seasons-rates',  'Admin\SeasonsPrices\SeasonsPriceController@index');  //get Seasons rates list
    
    Route::get('/seasons-rates/add-season-rate',  'Admin\SeasonsPrices\SeasonsPriceController@addSeasonRate');  //get Season rates Form
    
    Route::post('/seasons-rates/create',  'Admin\SeasonsPrices\SeasonsPriceController@create');  //save Season rates 
    
    Route::post('/seasons-rates/get-season-companies',  'Admin\SeasonsPrices\SeasonsPriceController@getCompaniesByCity');  //get Season Form
    
    Route::post('/seasons-rates/get-companies-season',  'Admin\SeasonsPrices\SeasonsPriceController@getCompaniesSeasons');  //get Season Form    
   
    Route::get('/seasons-rates/edit-season-rate/{slug}',  'Admin\SeasonsPrices\SeasonsPriceController@updateSeasonRates');  //get Season rates Form
    
    Route::post('/seasons-rates/update',  'Admin\SeasonsPrices\SeasonsPriceController@update');
   
    Route::get('/vehicles',  'Admin\Vehicles\VehiclesController@index');  //get Vehicle list
    
    Route::get('/vehicles/add-vehicle',  'Admin\Vehicles\VehiclesController@createVehichle');  //Add New Vehicle
    
    Route::post('/vehicles/create',  'Admin\Vehicles\VehiclesController@create');  //Add New Vehicle
    
    Route::post('/vehicles/get-seasons',  'Admin\Vehicles\VehiclesController@getSeasonByCompanies');  //get Season Form
    
    Route::post('/vehicles/get-seasons-rates',  'Admin\Vehicles\VehiclesController@getSeasonRatesBySeason');  //get Season Form
    
    Route::get('/vehicles/edit-vehicle/{slug}',  'Admin\Vehicles\VehiclesController@updateVehicle');  //Add New Vehicle
    
    Route::post('/vehicles/update',  'Admin\Vehicles\VehiclesController@update');  //Add New Vehicle
    
    Route::get('/vehicles/destroy/{slug}', 'Admin\Vehicles\VehiclesController@destroy');//delete Seasons
    
    Route::get('/booking-orders',  'Admin\BookingOrders\BookingOrdersController@index');  //get Orders list
    
    Route::get('/booking-orders/view-order/{slug}',  'Admin\BookingOrders\BookingOrdersController@index');  //view Order detail
    
    Route::get('/booking-orders/view-order/{slug}',  'Admin\BookingOrders\BookingOrdersController@viewOrder');  //get Orders list
    
    Route::get('/booking-orders/destroy/{slug}',  'Admin\BookingOrders\BookingOrdersController@destroy');  //delete order list
    
    
    Route::get('/change-password', 'Admin\AdminController@changePassword');
    
    Route::get('/logout', 'Admin\AdminController@adminLogout');
    
    Route::post('/password-reset', 'Admin\AdminController@resetPassword');
    
    Route::get('/', 'Admin\AdminController@index');  
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
