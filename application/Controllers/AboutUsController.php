<?php

class AboutUsController extends Controller {

    public static function showDefaultMessage() {
        print_r('My god, this is a fine message about us!');
    }

    public static function view($viewName) {
        require_once ('/../../resources/views/' . $viewName . '.php');
    }

}
