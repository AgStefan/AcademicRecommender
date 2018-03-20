<?php

class HomeController extends Controller {

    public static function view ($viewName) {

        require_once ('./../resources/views/' . $viewName . '.php');
    }
}