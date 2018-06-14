<?php


class BaseModel {
    public static $db;

    function __construct() {
        self::$db = Database::connection();
    }


    /**
     * Database seeder preparing function
     *
     */
    public static function seeder () {
        session_destroy();
        self::$db = Database::connection();
        self::executeSeeder();
    }


    /**
     * Database seeder execution function
     *
     */
    public static function executeSeeder () {


        $con = self::$db;

        ob_start();
        include "./../resources/seeder.php";
        $sqlQueries = ob_get_clean();

        if (mysqli_multi_query($con, $sqlQueries))
        {
            do
            {
                if ($result = mysqli_store_result($con)) {
                    mysqli_free_result($result);
                }
            }
            while (mysqli_next_result($con));
        }

        header('Location: /');
    }

}