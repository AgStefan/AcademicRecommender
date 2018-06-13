<?php

class DisciplineController extends Controller
{

    public function __construct()
    {
        $user = $this->model('UserModel');
    }

    public function render($disciplineSlug = '')
    {

        $discipline = $this->model('Discipline')->getDisciplineBySlug($disciplineSlug);
        $disciplineComments = $this->model('Comment')->getDisciplineComments($discipline->id);


        return $this->view('discipline', ['discipline' => $discipline, 'disciplineComments' => $disciplineComments]);
    }


    public function uploadComment()
    {

        if (!file_exists('uploads')) {
            mkdir('uploads');
        }

        $comment = $_POST['comment'];

        $target_dir = "uploads/";
        $fileName = time() . basename($_FILES["fileToUpload"]["name"]);
        $target_file = $target_dir . time() . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if ($_FILES["fileToUpload"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

            if ($imageFileType != "zip" && $imageFileType != "rars") {
            echo "Sorry, only zip files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";

        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                $model = self::model('File');

                $stmt = $model::$db->prepare("INSERT into files (name) VALUES (?)");

                $stmt->bind_param('s', $fileName);
                $stmt->execute();

                $fileId = $stmt->insert_id;

                $stmt->close();

            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }





        if (isset($comment) && $comment) {

            $currentUserEmail = $_SESSION['email'];
            $stmt = $model::$db->prepare("SELECT id from users WHERE email = ? ");
            $stmt->bind_param("s", $currentUserEmail);
            $stmt->execute();
            $stmt->bind_result($userId);
            $stmt->fetch();
            $stmt->close();


            $model = self::model('Discipline');
            $stmt = $model::$db->prepare("INSERT into comments (user_id, file_id, discipline_id, subject, content ) VALUES (?, ?, ?, ?, ?) ");


            $disciplineId = (int) $_POST['discipline_id'];
            $subject = self::sanitizeInput($_POST['subject']);



            $stmt->bind_param('iiiss', $userId, $fileId, $disciplineId, $subject, $comment);
            $stmt->execute();
            $stmt->close();

            header('Location: ' . $_SERVER['HTTP_REFERER']);

        }

    }

}