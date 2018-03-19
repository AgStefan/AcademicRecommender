
<head>
    <link rel="stylesheet" type="text/css" href="/css/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="/css/general-styles.css"/>
    <link rel="stylesheet" type="text/css" href="/css/Login.css"/>
</head>
<body>
<?php require_once('./../resources/elements/navbar.php') ?>
<div class="container">
<form>
    <h1><img class="image2"  src="./images/login_icon.png"</img>Login</h1>
    <p>Please fill in this form to acces your account.</p>
    <hr>

    <img class="image1"  src="./images/email_icon.jpg"</img>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" >

    <img class="image1"  src="./images/password_icon.png"</img>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password">

    <div>
        <button type="button" class="cancelbtn"> Back</button>
        <button type="submit" class="signinbtn">Sign in</button>
</div>
</form>
    </div>
</div>
</body>