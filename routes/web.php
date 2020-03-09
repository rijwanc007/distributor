<?php
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//Users Route
Route::resource('user','Admin\UserController');
Route::get('/employee','Admin\UserController@employee')->name('employee');
Route::get('/vendor','Admin\UserController@vendor')->name('vendor');
Route::get('/distributor','Admin\UserController@distributor')->name('distributor');
Route::post('/user/search','Admin\UserController@search')->name('exist.user.search');
Route::post('/employee/search','Admin\UserController@employeeSearch')->name('exist.employee.search');
Route::post('/vendor/search','Admin\UserController@vendorSearch')->name('exist.vendor.search');
Route::post('/distributor/search','Admin\UserController@distributorSearch')->name('exist.distributor.search');
Route::post('/employee/delete','Admin\UserController@employeeDestroy')->name('exist.employee.delete');
Route::post('/vendor/delete','Admin\UserController@vendorDestroy')->name('exist.vendor.delete');
Route::post('/distributor/delete','Admin\UserController@distributorDestroy')->name('exist.distributor.delete');
Route::get('/all/user/edit/{id}','Admin\UserController@allUserEdit')->name('all.user.edit');
Route::post('/all/user/update','Admin\UserController@allUserUpdate')->name('all.user.update');
//purchase route
Route::resource('purchase','Admin\PurchaseController');
//product_category route
Route::resource('product_category','Admin\ProductCategoryController');
Route::post('/product_category/search','Admin\ProductCategoryController@search')->name('exist.product_category.search');
Route::post('/select/product/brand','Admin\ProductCategoryController@select')->name('select.product.brand');
//brand route
Route::resource('brand','Admin\BrandController');
Route::post('/brand/search','Admin\BrandController@search')->name('exist.brand.search');
//unit route
//Route::resource('unit','Admin\UnitController');
//Route::post('/unit/update','Admin\UnitController@update')->name('unit.update');
//Route::post('/unit/search','Admin\UnitController@search')->name('exist.unit.search');
//tax route
Route::resource('tax','Admin\TaxController');
//stock route
Route::resource('stock','Admin\StockController');
Route::get('/brand/select/{product_brand}','Admin\StockController@brandSelect');
Route::post('/stock/brand/select','Admin\StockController@stockBrandSelect')->name('stock.brand.select');
Route::post('/stock/search','Admin\StockController@stockSearch')->name('stock.search');
Route::get('/stock/pdf/download/{id}','Admin\StockController@stockPDFdownload')->name('stock.pdf.download');
//sale route
Route::resource('sale','Admin\SaleController');
Route::post('/sale/search','Admin\SaleController@saleSearch')->name('exist.sale.search');
Route::post('/all/sale/search','Admin\SaleController@allSaleSearch')->name('exist.all.sale.search');
Route::get('/all/sale','Admin\SaleController@allSale')->name('all.sale');
//warehouse route
Route::resource('warehouse','Admin\WarehouseController');
Route::post('/warehouse/brand/select','Admin\WarehouseController@warehouseBrandSelect')->name('warehouse.brand.select');
Route::post('/warehouse/search','Admin\WarehouseController@warehouseSearch')->name('warehouse.search');
//offer route
Route::resource('offer','Admin\OfferController');
Route::get('/offer/brand/name/{brand}','Admin\OfferController@offerBrandName');
Route::get('/offer/product/code/{code}/{brand}','Admin\OfferController@offerProductCode');
Route::post('/offer/search','Admin\OfferController@offerSearch')->name('exist.offer.search');
//invoice route
Route::resource('invoice','Admin\InvoiceController');



