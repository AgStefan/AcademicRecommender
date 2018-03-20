<?php

Route::set('about-us', function () {
//    AboutUsController::showDefaultMessage();
    HomeController::view('about-us');
});

Route::set('home', function () {

    HomeController::view('home');
});
Route::set('account-settings', function () {

    HomeController::view('account-settings');
});
Route::set('disciplines', function () {

    HomeController::view('disciplines');
});

Route::set('messages', function () {

    HomeController::view('messages');
});

Route::set('support', function () {

    HomeController::view('support');
});

Route::set('signup', function () {

    HomeController::view('sign-up');
});
Route::set('login', function () {

    HomeController::view('login');
});

Route::set('matematica', function () {
//    AboutUsController::showDefaultMessage();
    HomeController::view('discipline');
});
Route::set('faq', function () {

    HomeController::view('faq');
});