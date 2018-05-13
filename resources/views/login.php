<!DOCTYPE html>
<html>
<head>

    <title>Login</title>
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="/css/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="/css/general-styles.css"/>
    <link rel="stylesheet" type="text/css" href="/css/Login.css"/>
</head>
<body>
<?php require_once('./../resources/elements/navbar.php') ?>
<div class="container">
    <form method="POST" action="/login-action">
    <h1><img class="image2"  src="./images/login_icon.png" alt="">Login</h1>
    <p>Please fill in this form to acces your account.</p>
    <hr>

    <img class="image1"  src="./images/email_icon.jpg" alt="">
    <label for="email"><b>Email</b></label>
    <input id="email" name="email" type="text" placeholder="Enter Email" >

    <img class="image1"  src="./images/password_icon.png" alt="">
    <label for="psw"><b>Password</b></label>
    <input id="psw" name="password" type="password" placeholder="Enter Password">

    <div>
        <button type="button" class="cancelbtn"> Back</button>
        <button type="submit" class="signinbtn">Sign in</button>
</div>
</form>
    </div>

</body>
</html>