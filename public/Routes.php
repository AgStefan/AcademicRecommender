<?php

Route::set('discipline/{discipline_slug}', 'DisciplineController@render');

Route::set('upload-comment', 'DisciplineController@uploadComment');
Route::set('download-file/{file_id}', 'DisciplineController@downloadFile');


Route::set('/about-us', function () {
    HomeController::view('about-us');
});


Route::set('home', function () {

    HomeController::view('home');
});
Route::set('account-settings', function () {

    HomeController::view('account-settings');
});
Route::set('disciplines', 'DisciplinesController@render');

Route::set('messages', function () {

    HomeController::view('messages');
});

Route::set('message-action', function() {
    MessageController::message();
});

Route::set('messages', 'MessageController@render');

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



Route::set('FaqModel', function () {

    HomeController::view('FaqModel');
});

Route::set('seeder', function () {

    BaseModel::seeder();
});

Route::set('logout', 'AuthController@logout');

Route::set('addDisciplines-action', function(){

    AdminDisciplinesController::addDiscipline('disciplines');
});

Route::set('removeDisciplines-action', function(){

    AdminDisciplinesController::removeDiscipline('disciplines');
});

Route::set('addQuestion-action', function(){

    FaqController::addQuestion('faq');
});

Route::set('removeQuestion-action', function(){

    FaqController::removeQuestion('faq');
});

Route::set('faq', 'FaqController@render');

Route::set('addAnswer-action', function(){

    FaqController::addAnswer('faq');
});
