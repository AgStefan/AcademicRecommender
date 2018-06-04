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

        return $this->view('discipline', ['discipline' => $discipline]);
    }


    public function uploadComment()
    {

        if (!file_exists('uploads')) {
            mkdir('uploads');
        }

        $comment = $_POST['comment'];

        $target_dir = "uploads/";
        $target_file = $target_dir . time() . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if ($imageFileType != "txt" && $imageFileType != "pdf") {
            echo "Sorry, only TXT and PDF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";

        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                $model = self::model('File');


                $stmt = $model::$db->prepare("INSERT into files (nume) VALUES (?)");


            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }


//        $model = self::model('Discipline');
//
//
//        if (isset($comment) && $comment) {
//
//            $stmt = $model::$db->prepare("INSERT into comments (user_id, file_id, discipline_id, subject, comment ) VALUES (?, ?, ?, ?, ?)");
//
//            $username = self::sanitizeInput($_POST['username']);
//            $email = self::sanitizeInput($_POST['email']);
//
//
//            $stmt->bind_param('sss', $userId, $fileId, $disciplineId, $email, $comment);
//            $stmt->execute();
//            $stmt->close();
//
//            header('Location: login');
//            die();
//        }

    }

}