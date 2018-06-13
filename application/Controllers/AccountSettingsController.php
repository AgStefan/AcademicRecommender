<?php


class AccountSettingsController extends  Controller
{

    public static function account_settings(){
        $model =self::model('AccountSetting');
        if(isset($_POST['username']) && isset($_POST['passwordchange'])&& isset($_POST['repeatpasswordchange'])&& isset($_POST['emailchange']))
        { $user_email= $_SESSION['email'];
            $username=$_POST['username'];
            $passwordchange=$_POST['passwordchange'];
            $repeatpasswordchange=$_POST['repeatpasswordchange'];
            $email_change=$_POST ['email_change'];
            $result = mysqli_query($model::$db, "SELECT * from users where email = '$email_change'");
            if (mysqli_num_rows($result)>=1) {
                header('Location: account-settings');
                $_SESSION['Error'] = "User with this email already exists!";
            }
            else{


                $stmt = $model::$db->prepare("INSERT into users (username, email, password ) VALUES (?, ?, ?)");
                $username = self::sanitizeInput($_POST['username']);
                $email = self::sanitizeInput($_POST['email']);
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $stmt->bind_param('sssi', $username, $email, $password);
                $stmt->execute();
                $stmt->close();
                header('Location: account-settings');
                die;
            }
        }
    }
}