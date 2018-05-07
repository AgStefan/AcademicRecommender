<?php

class AuthController extends Controller {


    /**
     * Save user to database
     *
     */
    public static function save () {
        $model = self::model('SignUp');

        if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['email'])) {

            $stmt= $model->db->prepare("INSERT into users (username, email, password ) VALUES (?, ?, ?)");

            $username = self::sanitizeInput($_POST['username']);
            $email =  self::sanitizeInput($_POST['email']);
            $password =  md5($_POST['password']);

            $stmt->bind_param('sss', $username, $email, $password);
            $stmt->execute();
            $stmt->close();

            header('Location: login');
            die();

        }
    }

}