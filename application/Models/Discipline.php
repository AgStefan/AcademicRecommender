<?php

class Discipline extends  BaseModel {

    public function getAllDisciplines() {

        $stmt = $this::$db->prepare("SELECT * from disciplines");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        while ($row = mysqli_fetch_object($result)) {
            $objectArray[] = $row;
        }

        return isset($objectArray) && $objectArray ? $objectArray : null;
    }

    public function getDisciplineBySlug($slug) {

        $stmt = $this::$db->prepare("SELECT * from disciplines WHERE slug = '$slug'");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        $row = mysqli_fetch_object($result);

        return $row;
    }

}