<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>

    <title>Login</title>

    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="/css/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="/css/general-styles.css"/>
    <link rel="stylesheet" type="text/css" href="/css/login.css"/>
</head>
<body>
<?php require_once('./../resources/elements/navbar.php') ?>
<div class="container">
    <form method="POST" action="/login-action">
    <h1><img class="image2"  src="./images/login_icon.png" alt="">Login</h1>
    <p>Please fill in this form to acces your account.</p>
        <div class="msgErr">
        <?php
        if( isset($_SESSION['Error']) )
        {
            echo $_SESSION['Error'];

            unset($_SESSION['Error']);

        }
        ?>
        </div>
    <hr>

    <img class="image1"  src="./images/email_icon.jpg" alt="">
    <label for="email"><b>Email</b></label>
    <input id="email" name="email" title="Invalid Email" required pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" type="text" placeholder="Enter Email" >

    <img class="image1"  src="./images/password_icon.png" alt="">
    <label for="psw"><b>Password</b></label>
    <input id="psw" name="password" type="password" placeholder="Enter Password">

    <div>

        <button type="submit" class="signinbtn">Sign in</button>

</div>
</form>
    </div>

</body>
</html>