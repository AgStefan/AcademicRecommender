<?php

class Message extends BaseModel {

    public function getAllMessages() {

        $stmt = $this::$db->prepare("SELECT * from messages");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        //$user_email = $_SESSION['email'];

        while ($row = mysqli_fetch_object($result)) {

            $objectArray[] = $row;
        }

        return isset($objectArray) && $objectArray ? $objectArray : null;
    }

}