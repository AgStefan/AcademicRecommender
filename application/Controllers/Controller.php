<?php

class Controller {

    public static function view ($viewName) {
        require_once ('./../resources/views/' . $viewName . '.php');
    }

    public function model ($modelName) {
        require_once ('./models/' . $modelName . '.php');

        return new $modelName();
    }

}
