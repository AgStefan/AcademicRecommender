<?php

class AuthController extends Controller {


    /**
     * Save user to database
     *
     */
    public static function save () {
        $model = self::model('SignUp');

        if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['email'])) {

            $email = $_POST['email'];
            $result = mysqli_query($model::$db, "SELECT * from users where email = '$email'");

            if (mysqli_num_rows($result)>=1) {
                $msg = "Exista deja un cont cu acest email.";
                echo $msg;
            }
            else {

                $stmt = $model::$db->prepare("INSERT into users (username, email, password ) VALUES (?, ?, ?)");
                $username = self::sanitizeInput($_POST['username']);
                $email = self::sanitizeInput($_POST['email']);
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $stmt->bind_param('sss', $username, $email, $password);
                $stmt->execute();
                $stmt->close();

                header('Location: login');
                die();
            }
        }
    }

    /**
     * Connect user
     *
     */
    public static function login () {
        session_start();
        $model = self::model('Login');
        if (isset($_POST['email']) && isset($_POST['password'])) {

            $email = $_POST ['email'];
            $password = $_POST ['password'];

            $email = stripcslashes($email);
            $password = stripcslashes($password);
            $email = mysqli_real_escape_string($model::$db,$email);
            $password = mysqli_real_escape_string($model::$db,$password);

            $stmt = $model::$db->prepare("SELECT * from users WHERE email = '$email'");
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();

            $row = mysqli_fetch_array($result);

            if (password_verify($password,$row['password'])) {
                $_SESSION ['id'] = $row['id'];
                header('Location: home');
            } else {
                echo("Cont invalid");
            }
        }

    }

}