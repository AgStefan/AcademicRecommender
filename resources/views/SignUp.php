
<head>
    <link rel="stylesheet" type="text/css" href="/css/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="/css/general-styles.css"/>
    <link rel="stylesheet" type="text/css" href="/css/SignUp.css"/>
</head>
<body>
<?php require_once('./../resources/elements/navbar.php') ?>
<div class="container">

    <h1><img class="image2"  src="./images/sign_up_form.jpg"</img>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <img class="image1"  src="./images/username.png"</img>
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" >

    <img class="image1"  src="./images/email_icon.jpg"</img>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" >

    <img class="image1"  src="./images/password_icon.png"</img>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password">

    <img class="image1"  src="./images/password_icon.png"</img>
    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password">

    <img class="image1"  src="./images/gender_icon.jpg"</img>
    <label  for="gender"><b>Gender</b></label>

    <input type="radio" name="gender" id="male">
    <label for="male">Male</label>

    <input type="radio" name="gender" id="female">
    <label for="female">Female</label>

    <input type="radio" name="gender" id="rather not say">
    <label for="rather not say">Rather not say</label>


    <div class="clearfix">
        <button type="button" class="cancelbtn"> Back</button>
        <button type="submit" class="signupbtn">Sign Up</button>
</div>
    </div>
</div>




