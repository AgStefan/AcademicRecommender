<?php

Route::set('discipline/{discipline_slug}', 'DisciplineController@render');

Route::set('upload-comment', 'DisciplineController@uploadComment');



Route::set('/about-us', function () {
//    AboutUsController::showDefaultMessage();
    HomeController::view('about-us');
});



//Route::set('/discipline/{discipline_slug}', function ($asdf) {
//    var_dump($asdf);die;
////    AboutUsController::showDefaultMessage();
//    DisciplineController::view('discipline');
//});




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

Route::set('message-action', function() {
    MessageController::message();
});

Route::set('support', function () {

    HomeController::view('support');
});

Route::set('support-action', function () {
    SupportController::support();
});

Route::set('signup', function () {

    HomeController::view('sign-up');
});

Route::set('sign-up-action', function () {
    AuthController::save();
});

Route::set('login-action', function (){
    AuthController::login();
});

Route::set('login', function () {

    HomeController::view('login');
});



Route::set('faq', function () {

    HomeController::view('faq');
});


Route::set('seeder', function () {

    BaseModel::seeder();
});

Route::set('logout', function () {

    HomeController::view('logout');
});

Route::set('addDisciplines-action', function(){

    AdminDisciplinesController::addDiscipline('disciplines');
});

Route::set('removeDisciplines-action', function(){

    AdminDisciplinesController::removeDiscipline('disciplines');
});

