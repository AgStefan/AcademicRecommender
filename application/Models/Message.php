<?php

class Message extends BaseModel {

    public function getAllMessages() {
        $currentUserId = getCurrentUserId();

        if (getCurrentUserId()) {
            $stmt = $this::$db->prepare("SELECT * from messages WHERE user_id_receiver = ?");
            $stmt->bind_param("i", $currentUserId);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();

            while ($row = mysqli_fetch_object($result)) {


                $stmt2 = $this::$db->prepare("SELECT username from users WHERE id = ?");
                $stmt2->bind_param("i", $currentUserId);
                $stmt2->execute();
                $stmt2->bind_result($username);
                $stmt2->fetch();
                $stmt2->close();

                $row->username = $username;

                $objectArray[] = $row;
            }
        }

        return isset($objectArray) && $objectArray ? $objectArray : null;
    }

}