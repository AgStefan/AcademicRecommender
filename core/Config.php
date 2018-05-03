<?php

require_once ('../config/database-config.php');

class Config {

    public static function get($path = null) {
        if ($path) {

            $paths = explode ('.', $path);
            $configSetting = $GLOBALS['config'];

            foreach ($paths as $singlePath) {
                if (isset($configSetting[$singlePath])) {
                    $configSetting =  $configSetting[$singlePath];
                }
            }

            return $configSetting;

        } else {
            return new \Exception('Path not set');
        }
    }
}