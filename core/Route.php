<?php


class Route {

    public static $routes = [];

    public static function set ($routeName, $routeFunction) {
        self::$routes[] = $routeName;

        if ($_GET['url'] == $routeName) {
            $routeFunction->__invoke();
        }

    }
}