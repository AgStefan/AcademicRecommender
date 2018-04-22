<?php

class Database {
    private $host = null;
    private $database = null;
    private $username = null;
    private $password = null;


    /**
     * Database connection
     */
    public static function connection () {
        $con = mysqli_connect(
            Config::get('connections.mysql.host'),
            Config::get('connections.mysql.username'),
            Config::get('connections.mysql.password'),
            Config::get('connections.mysql.database')
        );

        if (mysqli_connect_errno()) {
            return "Failed to connect to MySQL: " . mysqli_connect_error();
        } else {
            return $con;
        }
    }
}