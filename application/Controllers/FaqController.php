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


    }





}