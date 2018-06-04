<?php

require_once('Routes.php');

function get_string_between($string, $start = '{', $end = '}') {
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

function removeIfFirstLetter($haystack, $character) {
    $pos = $haystack[0] === $character;
    return $pos ? substr($haystack, 1) : $haystack;
}




function __autoload($class) {
    if (file_exists('./../core/' . $class . '.php')) {
        require_once ('./../core/' . $class . '.php');
    } else if (file_exists('./../application/controllers/' . $class . '.php')) {
        require_once('./../application/controllers/' . $class . '.php');
    } else if (file_exists('./../application/models/' . $class . '.php')) {
        require_once('./../application/models/' . $class . '.php');
    }
}


