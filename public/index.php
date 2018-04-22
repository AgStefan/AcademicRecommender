<?php

require_once('Routes.php');

function __autoload($class) {
    if (file_exists('./../core/' . $class . '.php')) {
        require_once ('./../core/' . $class . '.php');
    } else if (file_exists('./../application/controllers/' . $class . '.php')) {
        require_once('./../application/controllers/' . $class . '.php');
    } else if (file_exists('./../application/models/' . $class . '.php')) {
        require_once('./../application/models/' . $class . '.php');
    }
}


