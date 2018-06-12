<?php

class MessageController extends Controller
{

    public static function message()
    {

        $model = self::model('Message');

        if (isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['content'])) {

            $user_id_sender = $_SESSION['email'];
            $stmt = $model::$db->prepare("SELECT id from users WHERE email = ? ");
            $stmt->bind_param("s", $user_id_sender);
            $stmt->execute();
            $stmt->bind_result($IdUser);
            $stmt->fetch();
            $stmt->close();
            $user_id_receiver = $_POST['email'];
            $stmt = $model::$db->prepare("SELECT id from users WHERE email = ? ");
            $stmt->bind_param("s", $user_id_receiver);
            $stmt->execute();
            $stmt->bind_result($IdUserReceiver);
            $stmt->fetch();
            $stmt->close();
            $subject = $_POST['subject'];
            $content = $_POST['content'];
            $date_time = date("Y-m-d H:i:s");

            $stmt = $model::$db->prepare("INSERT into messages (user_id_sender, user_id_receiver, subject, content, date_time ) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param('iisss', $IdUser, $IdUserReceiver, $subject, $content, $date_time);
            $stmt->execute();
            $stmt->close();
            header('Location: messages');

        }
    }
}
//