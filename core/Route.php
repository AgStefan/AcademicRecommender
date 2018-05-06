<?php

class Route {

    public static $routes = [];

    public static function set ($routeName, $routeFunction) {
        self::$routes[] = $routeName;

        $url = isset($_GET['url']) && $_GET['url'] ? $_GET['url'] : 'home';

        if ($url == $routeName) {
            $routeFunction->__invoke();
        }
    }

}

