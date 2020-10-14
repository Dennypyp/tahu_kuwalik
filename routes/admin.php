<?php


Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['auth'=>'CheckRole:admin,customer']
], function () {
    Route::get('laporan', 'PesanController@Laporan');
    Route::resource('dashboard', 'DashboardController');
    Route::resource('varian', 'VarianController');
    Route::resource('about-us', 'AboutController');
    Route::resource('service', 'ServiceController');
    Route::resource('carousel', 'CarouselController');
    Route::resource('pesan', 'PesanController');
});
