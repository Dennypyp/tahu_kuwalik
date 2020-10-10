<?php

Route::name('frontend.')->group(function(){
    Route::group(['namespace' => 'Frontend'], function () {

        Route::resource('/', 'HomeController');
        Route::resource('portofolio', 'PortofolioController');
        Route::resource('pesan', 'PesanController');

        Route::group(['aut' => ['CheckRole:customer']], function () {
            Route::resource('about-us', 'AboutController');
        });

    });
});


