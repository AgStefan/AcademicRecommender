<?php

class Route
{

    public static $routes = [];

    public static function set($routeName, $routeParameter)
    {
        self::$routes[] = $routeName;

        $parameter = get_string_between($routeName);

        $routeName = removeIfFirstLetter($routeName, '/');

        $routeNamesArray = explode('/', $routeName);


        $routeName = isset($routeNamesArray) && $routeNamesArray ? $routeNamesArray[0] : null;

        $urlArray = isset($_GET['url']) && $_GET['url'] ? explode('/', $_GET['url']) : null;

        $parameter = isset($urlArray) && $urlArray[1] ? $urlArray[1] : '';






        $url = isset($urlArray) && $urlArray[0] ? $urlArray[0] : 'home';


        if ($url == $routeName) {
            if (gettype($routeParameter) === 'string') {

                $callableMethodPath = explode('@', $routeParameter);

                $class = new $callableMethodPath[0];
                $method = $callableMethodPath[1];

                $class->$method($parameter);

            } else {
                $routeParameter->__invoke();
            }
        }


    }

}

