<?php


Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => 'auth'
], function () {

    Route::resource('dashboard', 'DashboardController');
    Route::resource('varian', 'VarianController');
    Route::resource('team', 'TeamController');
    Route::resource('about-us', 'AboutController');
    Route::resource('service', 'ServiceController');
    Route::resource('carousel', 'CarouselController');
    Route::resource('pesan', 'PesanController');
});
