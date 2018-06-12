<?php

class Controller {

    /**
     * Create view instance
     *
     * @param $viewName
     */
    public static function view ($viewName, $data = []) {

        $arrayKey = !empty($data) && $data ? array_keys($data)[0] : null;
        $arrayValue = !empty($data) && $data ? array_values($data)[0] : null;
        $$arrayKey = $arrayValue;

        require_once ('./../resources/views/' . $viewName . '.php');
    }

    /**
     * Create model instance
     *
     * @param $modelName
     * @return mixed
     */
    public function model ($modelName) {
        require_once ('./../application/models/' . $modelName . '.php');

        return (new $modelName());
    }

    /**
     * Sanitize input fields if needed
     *
     * @param $input
     * @return string
     */
    public function sanitizeInput ($input) {
        $con = Database::connection();

        $input = stripslashes($input);
        $input = mysqli_real_escape_string($con,  $input);

        return $input;
    }

}
