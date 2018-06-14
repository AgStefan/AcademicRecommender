<?php
session_start();
error_reporting(E_ALL); // or E_STRICT
ini_set("display_errors",1);
ini_set("memory_limit","5000M");



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

function getCurrentUserRole () {
    if (isset($_SESSION) && isset($_SESSION['email']) && $_SESSION['email']) {
        $stmt = BaseModel::$db->prepare('SELECT roleId from users  WHERE email = ?');
        $stmt->bind_param('s', $_SESSION['email']);
        $stmt->execute();
        $stmt->bind_result($userRoleId);
        $stmt->fetch();
        $stmt->close();


        return $userRoleId;
    }
    return false;
}

function getCurrentUserId () {
    if (isset($_SESSION) && isset($_SESSION['email']) && $_SESSION['email']) {
        $stmt = BaseModel::$db->prepare('SELECT id from users  WHERE email = ?');
        $stmt->bind_param('s', $_SESSION['email']);
        $stmt->execute();
        $stmt->bind_result($userId);
        $stmt->fetch();
        $stmt->close();


        return $userId;
    }
    return false;
}

function slugify($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, '-');

    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
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


