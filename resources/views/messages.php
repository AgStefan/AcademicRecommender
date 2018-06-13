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

    <?php foreach ($messages as $message): ?>
      <?= $message->content ?>
    <?php endforeach; ?>

    <div class="messages-wrapper">
        <h1><img class="img"  src="./images/message_icon.png" alt="">Messages</h1>
        <div class="message-wrapper">
            <div class="message-author">
                <p><img class="image5" src="./images/alpaca.jpg" alt="">John Doe</p>
            </div>

            <div class="message-content">
                <time>21:35</time>
                <p>I can't make it today.</p>
            </div>
            <div class="messages-button-wrapper">
                <button type="button">Reply</button>
            </div>
        </div>

        <div class="message-wrapper">
            <div class="message-author">

                <p><img class="image5" src="./images/dog.jpg" alt="">John Doe</p>

            </div>

            <div class="message-content">
                <time>19:41</time>
                <p>I am on my way.</p>
                <button type="button">Reply</button>
            </div>
        </div>

        <div class="message-wrapper">
            <div class="message-author">

                <p><img class="image5" src="./images/tattoo.jpg" alt="">John Doe</p>

            </div>

            <div class="message-content">
                <time>13:17</time>
                <p>Can you buy some food?</p>
                <button type="button">Reply</button>
            </div>
        </div>

        <div class="message-wrapper">
            <div class="message-author">

                <p><img class="image5" src="./images/pink.jpg" alt="">John Doe</p>

            </div>

            <div class="message-content">
                <time>12:12</time>
                <p>I will stay home.</p>
                <button type="button">Reply</button>
            </div>
        </div>

        <div class="message-wrapper">
            <div class="message-author">

                <p><img class="image5" src="./images/guy.jpg" alt="">John Doe</p>

            </div>
            <div class="message-content">
                <time>10:10</time>
                <p>Will you come today?</p>
            </div>
        </div>

        <div class="message-wrapper">
            <div class="message-author">

                <p><img class="image5" src="./images/alpaca.jpg" alt="">John Doe</p>

            </div>
            <div class="message-content">
                <time>09:20</time>
                <p>I have to be there by 4 p.m.</p>

            </div>
            <div class="messages-button-wrapper">
                <button type="button">Reply</button>
            </div>

        </div>


    </div>
</div>
</body>
</html>

    <?php require_once("./../resources/elements/footer.php"); ?>
