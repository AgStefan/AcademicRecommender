<?php

require_once("./../resources/elements/header.php"); ?>

<!DOCTYPE html>
<html>
<head>

        <meta charset="UTF-8">

        <link rel="stylesheet" type="text/css" href="/css/sidebar.css"/>
        <link rel="stylesheet" type="text/css" href="/css/general-styles.css"/>
        <link rel="stylesheet" type="text/css" href="/css/support.css"/>


    </head>

<body>
<div class="msgErr">
        <?php
       if (isset($_SESSION['Error']))
       {
           echo $_SESSION['Error'];

           unset($_SESSION['Error']);




       }

    ?>
</div>


<div class="content-right">
    <form class="support-wrapper" id="forms" method="POST" action="message-action">

                <label for="email"><span>Email</span></label>
                <input id="email" name="email" title="Invalid Email" required pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" type="email" placeholder="Enter email">

                <label for="subject"><span>Subject</span></label>
                <input id="subject" name="subject" type="subject" placeholder="Enter subject">

                <label for="content"><span>Message</span></label>
                <textarea id="content" name="content" placeholder="Write your message" style="height:100px" required></textarea>

                <div class="button-wrapper">
                        <button class="buttons" type="submit" name="submit" >
                                Send
                            </button>
                    </div>
            </form>




    <div class="messages-wrapper">
        <h1><img class="img"  src="./images/message_icon.png" alt="">Messages</h1>

        <?php if (isset($messages) && $messages): ?>
            <?php foreach ($messages as $message): ?>
            <div class="message-wrapper">
                <div class="message-author">
                    <p><?= $message ? $message->username : '' ?></p>
                </div>

                <div class="message-content">
                    <time><?= $message ? $message->date_time : '' ?></time>
                    <p><?= $message ? $message->content : '' ?></p>
                </div>
            </div>

            <?php endforeach; ?>
        <?php endif; ?>

    </div>
</div>
</body>
</html>

    <?php require_once("./../resources/elements/footer.php"); ?>
