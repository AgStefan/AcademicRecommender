<?php

class FaqController extends Controller{

    public function render() {

        $questions = $this->model('FaqModel')->getAllQuestions();

        return $this->view('faq', ['questions' => $questions]);

    }

    public static function addQuestion () {
        $model = self::model('FaqModel');

        if (isset($_POST['add'])){

            $question = $_POST['add'];

            $stmt = $model::$db->prepare("INSERT INTO faq (question, answer) VALUES ('$question','(no answer - Wait until an admin answers)')");
            $stmt->execute();
            $stmt->close();

            header('Location: faq');

        }
    }

    public static function removeQuestion(){

        $model = self::model('FaqModel');

        if (isset($_POST['id']) ) {

        }
            $id = $_POST['id'];

            $name = mysqli_real_escape_string($model::$db, $id);

            if (isset($_POST['buttonRemove'])) {

                if ($model::$db === false) {
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }

                $stmt = $model::$db->prepare("SELECT * from faq WHERE id = '$id'");
                $stmt->execute();
                $result = $stmt->get_result();
                $stmt->close();

                $row = mysqli_fetch_array($result);

                if (mysqli_num_rows($result) < 1) {
                    header('Location: faq');
                    $_SESSION['Error'] = "Question not found! ";

                } else {

                        $stmt = $model::$db->prepare("DELETE FROM faq WHERE id = '$id'");
                        $stmt->execute();

                        if ($stmt) {
                            $_SESSION['msg'] = "Questoin deleted successfully! ";
                        } else {
                            echo "Error: " . $stmt . "<br>" . $model::$db->error;
                        }
                        $stmt->close();

                    header('Location: faq');
                }
            }
            die();
    }


    public static function addAnswer() {

        $model = self::model('FaqModel');

        if (isset($_POST['answer']) && isset($_POST['id'])){

            $answer = $_POST['answer'];
            $id = $_POST['id'];

                $stmt = $model::$db->prepare("UPDATE faq SET answer = '$answer' WHERE id = $id");
            $stmt->execute();
            $stmt->close();

            header('Location: faq');

        }

}


}