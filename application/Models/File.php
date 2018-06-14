<?php

class File extends BaseModel{


    public function getDisciplineFiles($disciplineId) {


        $stmt = $this::$db->prepare("SELECT file_id from comments where discipline_id = ' $disciplineId '");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        while ($row = mysqli_fetch_object($result)) {
            $commentItems[] = $row;
        }
        $fileItems = [];
        if (!empty($commentItems) && $commentItems) {
            foreach ($commentItems as $commentItem) {
                $stmt = $this::$db->prepare("SELECT * from files WHERE id = ? ");
                $stmt->bind_param("i", $commentItem->file_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $stmt->close();

                while ($row = mysqli_fetch_object($result)) {
                    $fileItems[] = $row;
                }

            }
        }


        return $fileItems;

    }


    public static function getMostDownloadableFile($disciplineId) {

        $stmt = self::$db->prepare("SELECT * from comments WHERE discipline_id = '$disciplineId'");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $comments = [];
        while ($row = mysqli_fetch_object($result)) {
            $comments[] = $row;
        }

        foreach ($comments as $comment) {
            $ids[] = $comment->id;
        }

        $in = !empty($ids) && $ids ?  '(' . implode(',', $ids) .')' : '(0)';

        $stmt = self::$db->prepare('SELECT * from files  WHERE id IN '. $in . ' ORDER BY nr_downloads DESC LIMIT 1');
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        $row = mysqli_fetch_object($result);

        return $row;
    }

}

