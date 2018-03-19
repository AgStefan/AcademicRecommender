<?php


class Route {

    public static $routes = [];

    public static function set ($routeName, $routeFunction) {
        self::$routes[] = $routeName;

        $url = explode ('/', $_GET['url'])[0];

        if ($url == $routeName) {
            $routeFunction->__invoke();
        }
    }

}


