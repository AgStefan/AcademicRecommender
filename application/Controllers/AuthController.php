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
                header('Location: signup');
                $_SESSION['Error'] = "User with this email already exists!";
            }
            else {
                $roleId = 1;
                $stmt = $model::$db->prepare("INSERT into users (username, email, password, roleId ) VALUES (?, ?, ?, ?)");
                $username = self::sanitizeInput($_POST['username']);
                $email = self::sanitizeInput($_POST['email']);
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $stmt->bind_param('sssi', $username, $email, $password, $roleId);
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

            if (mysqli_num_rows($result)<1) {
                header ('Location: login');
                $_SESSION['Error'] = "Invalid account!";
            }

            else
                if (password_verify($password,$row['password'])){
                $_SESSION ['email'] = $row['email'];
                $_SESSION ['username'] = $row['username'];

                $_SESSION ['role'] = $row['roleId'];

                $_SESSION['logged_in'] = 'true';

                header('Location: home');
            }
                else {
                    header ('Location: login');
                    $_SESSION['Error'] = "Invalid password!";
                }
        }

    }

    public function logout () {
        session_destroy();
        header ('Location: /');
    }

}