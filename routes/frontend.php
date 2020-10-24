<?php

Route::name('frontend.')->group(function(){
    Route::group(['namespace' => 'Frontend'], function () {
        Route::get('kwitansi/{id}', 'AboutController@kwitansi');
        Route::resource('/', 'HomeController');
        Route::resource('portofolio', 'PortofolioController');
        Route::resource('pesan', 'PesanController');

        Route::group([  'middleware' => ['auth'=>'CheckRole:customer']], function () {
            Route::resource('about-us', 'AboutController');
        });


    });
});


