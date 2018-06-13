<?php

class DisciplineController extends Controller
{
    public function render($disciplineSlug = '')
    {

        $discipline = $this->model('Discipline')->getDisciplineBySlug($disciplineSlug);
        $disciplineComments = $this->model('Comment')->getDisciplineComments($discipline->id);
        $disciplineFiles = $this->model('File')->getDisciplineFiles($discipline->id);
        $recommendedComment = $this->model('Comment')->getRecommendedComment($discipline->id);
        $personOfInterest = $this->model('User')->getPersonOfInterest($discipline->id);

        if ($disciplineComments) {
            foreach ($disciplineComments as $disciplineComment) {
                $disciplineComment->file_name = $this->getFileName($disciplineComment->file_id);
            }
        }

        return $this->view('discipline', [
            'discipline' => $discipline,
            'disciplineComments' => $disciplineComments,
            'disciplineFiles' => $disciplineFiles,
            'recommendedComment' => $recommendedComment,
            'personOfInterest' => $personOfInterest
        ]);
    }

    /**
     * Get the name of a file by it's id
     *
     * @param $fileId
     * @return mixed
     */
    public function getFileName($fileId) {
        $model = self::model('File');
        $fileId = (int) $fileId;
            $stmt = $model::$db->prepare("SELECT name from files WHERE id = ? ");
            $stmt->bind_param("i", $fileId);
            $stmt->execute();
            $stmt->bind_result($name);
            $stmt->fetch();
            $stmt->close();

        return $name;

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
            echo "Sorry, your file is too large.";die;
            $uploadOk = 0;
        }

            if ($imageFileType != "zip" && $imageFileType != "rar") {
            echo "Sorry, only zip files are allowed.";die;
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";die;

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

            $userModel= self::model('User');
            $currentUserEmail = $_SESSION['email'];
            $stmt = $userModel::$db->prepare("SELECT id from users WHERE email = ? ");
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

    public function downloadFile ($fileId) {

        $fileName = 'uploads/' . $this->getFileName($fileId);

        $fileModel = self::model('File');

        $stmt = $fileModel::$db->prepare("SELECT nr_downloads from files WHERE id = ? ");
        $stmt->bind_param("s", $fileId);
        $stmt->execute();
        $stmt->bind_result($nr_downloads);
        $stmt->fetch();
        $stmt->close();

        $nr_downloads = $nr_downloads ? $nr_downloads + 1 : 1 ;

        $stmt = $fileModel::$db->prepare("UPDATE files SET nr_downloads = ? WHERE id = ?");
        $stmt->bind_param("ii", $nr_downloads, $fileId);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();


        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"".$fileName."\"");
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: ".filesize($fileName));
        ob_end_flush();
        readfile($fileName);


    }

}