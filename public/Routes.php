<?php

Route::set('about-us', function () {
//    AboutUsController::showDefaultMessage();
    HomeController::view('AboutUs');
});

Route::set('home', function () {

    HomeController::view('home');
});
Route::set('account-settings', function () {

    HomeController::view('AccountSettings');
});
Route::set('disciplines', function () {

    HomeController::view('Disciplines');
});

Route::set('tops', function () {

    HomeController::view('Tops');
});
Route::set('messages', function () {

    HomeController::view('Messages');
});

Route::set('latest', function () {

    HomeController::view('Latest');
});
Route::set('support', function () {

    HomeController::view('Support');
});

Route::set('signup', function () {

    HomeController::view('SignUp');
});
Route::set('login', function () {

    HomeController::view('Login');
});Route::set('tops', function () {
//    AboutUsController::showDefaultMessage();
    HomeController::view('Tops');
});