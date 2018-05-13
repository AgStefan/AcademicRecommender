<?php

class AuthController extends Controller {


    /**
     * Save user to database
     *
     */
    public static function save () {
        $model = self::model('SignUp');

        if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['email'])) {

            $stmt= $model::$db->prepare("INSERT into users (username, email, password ) VALUES (?, ?, ?)");

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

    /**
     * Connect user
     *
     */
    public static function login () {
        $model = self::model('Login');

        if (isset($_POST['email']) && isset($_POST['password'])) {

            $email = $_POST ['email'];
            $password = $_POST ['password'];

            $email = stripcslashes($email);
            $password = stripcslashes($password);
            $email = mysqli_real_escape_string($model::$db,$email);
            $password = mysqli_real_escape_string($model::$db,$password);

            $stmt = $model::$db->prepare("SELECT * from users WHERE email = '$email' and password = '$password'");
            $result = $stmt->execute();
            $stmt->close();
            $row = mysqli_fetch_array($result);
            if (($row['email'] == $email) && ($row['password'] == $password)) {
                echo ("DA");
            } else {
                echo("NU");
            }
        }

    }

}