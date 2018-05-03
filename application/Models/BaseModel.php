<?php


class BaseModel {
    protected static $db;

    function __construct() {
        $this->db = Database::connection();
        var_dump(1);
    }

    public static function seeder () {
        self::$db = Database::connection();
        self::executeSeeder();
    }

    public function executeSeeder () {


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

        echo 'Database seeding took place!';
    }

}