<!DOCTYPE html>
<html>
<head>

    <title>Sign Up</title>
    <meta charset="UTF-8">


    <link rel="stylesheet" type="text/css" href="/css/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="/css/general-styles.css"/>
    <link rel="stylesheet" type="text/css" href="/css/sign-up.css"/>
</head>

<body>
<?php require_once('./../resources/elements/navbar.php') ?>
<div class="container">
    <form>
        <h1><img class="image2" src="./images/sign_up_form.jpg" alt="">Sign Up</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>
        <img class="image1" src="./images/username.png" alt="">
        <label for="username"><b>Username</b></label>
        <input id="username" type="text" placeholder="Enter Username">

        <img class="image1" src="./images/email_icon.jpg" alt="">
        <label for="email"><b>Email</b></label>
        <input id="email" type="text" placeholder="Enter Email">

        <img class="image1" src="./images/password_icon.png" alt="">
        <label for="psw"><b>Password</b></label>
        <input id="psw" type="password" placeholder="Enter Password">

        <img class="image1" src="./images/password_icon.png" alt="">
        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input id="psw-repeat" type="password" placeholder="Repeat Password">

        <img class="image1" src="./images/gender_icon.jpg" alt="">
        <span><b>Gender</b></span>

        <input type="radio" name="gender" id="male">
        <label for="male">Male</label>

        <input type="radio" name="gender" id="female">
        <label for="female">Female</label>

        <input type="radio" name="gender" id="rather-not-say">
        <label for="rather-not-say">Rather not say</label>


        <div class="clearfix">
            <button type="button" class="cancelbtn"> Back</button>
            <button type="submit" class="signupbtn">Sign Up</button>
        </div>
    </form>
</div>
</body>
</html>






