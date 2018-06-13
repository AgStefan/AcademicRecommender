<?php

    class FaqModel extends BaseModel {

        public function getAllQuestions() {

            $stmt = $this::$db->prepare("SELECT * from faq");
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            while ($row = mysqli_fetch_object($result)) {
                $objectArray[] = $row;
            }

            return isset($objectArray) && $objectArray ? $objectArray : null;
        }


    }