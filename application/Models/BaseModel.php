<?php


class BaseModel {
    protected $db;

    function __construct() {
        $this->db = Database::connection();

        var_dump($this->db);
    }
}