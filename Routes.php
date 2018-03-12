<?php

Route::set('about-us', function () {
//    AboutUsController::showDefaultMessage();
    AboutUsController::view('AboutUs');
});

Route::set('home', function () {

    HomeController::view('home');
});


