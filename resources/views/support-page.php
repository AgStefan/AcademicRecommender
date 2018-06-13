<?php
require_once('./../resources/elements/header.php'); ?>

<!DOCTYPE html>
<html>
<head>

    <title>Support</title>
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
    <div class="support">
        <h1><img class="image"  src="./images/download.png" alt="">Support</h1>
        <p>In case you need help, please fill in the form.</p>
        <hr>

        <form class="support-wrapper" id="forms" method="POST" action="support-action">


            <label for="name"><img class="image3"  src="./images/name_icon.png" alt=""><span>Name</span></label>
            <input id="name" title="Name must not be blank and contain only letters, numbers and underscores." required pattern="\w+" name="name" type="text" placeholder="Enter name">

            <label for="email"><img class="image3"  src="./images/email_icon.jpg" alt=""><span>Email</span></label>
            <input id="email" name="email" title="Invalid Email" required pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" type="email" placeholder="Enter email">


            <label for="subject"><img class="image4"  src="./images/message_icon.png" alt=""><span>Message</span></label>
            <textarea id="subject" name="subject" placeholder="Write your message" style="height:100px" required></textarea>

            <div class="button-wrapper">
                <button class="buttons" type="submit" name="submit" >
                    Send
                </button>
            </div>
        </form>

    </div>

</div>
</body>
</html>
<?php require_once ("./../resources/elements/footer.php"); ?>
