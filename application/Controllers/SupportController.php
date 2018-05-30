<?php
session_start();
class SupportController extends Controller
{

    public static function support()
    {


        $model = self::model('Support');

        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject'])) {

            $name = $_POST ['name'];
            $email = $_POST ['email'];
            $subject = $_POST ['subject'];

            $stmt = $model::$db->prepare("INSERT into support (name, email, subject ) VALUES (?, ?, ?)");
            $nume = self::sanitizeInput($_POST['name']);
            $email = self::sanitizeInput($_POST['email']);
            $message = self:: sanitizeInput($_POST['subject']);


            $stmt->bind_param('sss', $name, $email, $subject);
            $stmt->execute();
            $stmt->close();
        }
    }
}

