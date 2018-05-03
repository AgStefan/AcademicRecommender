<?php

class HomeController {

    public static function view ($viewName) {

        $con = new Database();

        require_once ('./../resources/views/' . $viewName . '.php');
    }
}