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
    <form id="myForm" method="POST" action="/sign-up-action">
        <h1><img class="image2" src="./images/sign_up_form.jpg" alt="">Sign Up</h1>
        <p>Please fill in this form to create an account.</p>
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
        <img class="image1" src="./images/username.png" alt="">
        <label for="username"><b>Username</b></label>
        <input id="username" title="Username must not be blank and contain only letters, numbers and underscores." required pattern="\w+" name="username" type="text" placeholder="Enter Username">

        <img class="image1" src="./images/email_icon.jpg" alt="">
        <label for="email"><b>Email</b></label>
        <input id="email" name="email" title="Email incorect" required pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" type="text" placeholder="Enter Email">

        <img class="image1" src="./images/password_icon.png" alt="">
        <label for="psw"><b>Password</b></label>
        <input id="psw" title="Password must contain at least 6 characters, including UPPER/lowercase and numbers." required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"  name="password" type="password" placeholder="Enter Password">

        <img class="image1" src="./images/password_icon.png" alt="">
        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input id="psw-repeat" title="Please enter the same Password as above." required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" name="repeat-password" type="password" placeholder="Repeat Password">

        <img class="image1" src="./images/gender_icon.jpg" alt="">
        <span><b>Gender</b></span>

        <input type="radio" name="gender[]" id="male">
        <label for="male">Male</label>

        <input type="radio" name="gender[]" id="female">
        <label for="female">Female</label>

        <input type="radio" name="gender[]" id="rather-not-say">
        <label for="rather-not-say">Rather not say</label>


        <div class="clearfix">

            <button type="submit" class="signupbtn">Sign Up</button>

        </div>
    </form>
</div>
</body>
</html>







