<?php

class User extends BaseModel {

    public function getPersonOfInterest($disciplineId) {
        $recommendedComment = Comment::getRecommendedComment($disciplineId);

        $stmt = self::$db->prepare('SELECT * from users  WHERE id = ?');
        $stmt->bind_param('i', $recommendedComment->user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        $row = mysqli_fetch_object($result);

        return $row;
    }

}