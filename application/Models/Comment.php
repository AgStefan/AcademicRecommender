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

        return isset($objectArray) && $objectArray ? $objectArray : null;
    }

    public static function getRecommendedComment($disciplineId) {

        $mostDownloadableFile = File::getMostDownloadableFile($disciplineId);

        $stmt = self::$db->prepare('SELECT * from comments  WHERE file_id = ?');
        $stmt->bind_param('i', $mostDownloadableFile->id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        $row = mysqli_fetch_object($result);

        return $row;
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