<?php

class Comment extends  BaseModel {

    public function getDisciplineComments($disciplineId) {

        $stmt = $this::$db->prepare("SELECT * from comments where discipline_id = ' $disciplineId '");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        while ($row = mysqli_fetch_object($result)) {
            $objectArray[] = $row;
        }

        $stmt = $this::$db->prepare("SELECT * from files WHERE id = '$slug'");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        $row = mysqli_fetch_object($result);

        return $row;


        $objectArray['files'] =
var_dump($objectArray);die;
        return isset($objectArray) && $objectArray ? $objectArray : null;
    }

    public function getCommentFiles($commentId) {

        $stmt = $this::$db->prepare("SELECT * from comments where discipline_id = ' $commentId '");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        while ($row = mysqli_fetch_object($result)) {
            $objectArray[] = $row;
        }

        return isset($objectArray) && $objectArray ? $objectArray : null;
    }

}