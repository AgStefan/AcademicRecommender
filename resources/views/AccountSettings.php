

<?php require_once('./../resources/elements/header.php') ?>
<div class="content-right">

<div class="AccountSettings">

    <h1><img class="image2"  src="./images/login_icon.png"</img>Account Settings</h1>

    <form class="wrapper-input">
        <hr>
        <img class="image1"  src="./images/username.png"</img>
        <label for="username">Username</label>
        <input id="username" type="text" placeholder="Enter username">


        <label for="passwordchange">
            <img class="image1"  src="./images/password_icon.png"</img>
            <span>Password</span>
        </label>
        <input id="passwordchange" type="password" placeholder="Enter new password">


        <label for="repeatpasswordchange">
            <img class="image1"  src="./images/password_icon.png"</img>
            <span>Reenter Password</span>
        </label>
        <input id="repeatpasswordchange1" type="password" placeholder="Reenter new password">


        <label for="emailchange">
            <img class="image1"  src="./images/email_icon.jpg"</img>
            <span>Email</span>
        </label>
        <input id="emailchange" type="email" placeholder="Enter new email">


        <label for="telephonechange">
            <img class="image1"  src="./images/telephone.jpg"</img>
            <span>Telephone</span>
        </label>
        <input id="telephonechange" type="text" placeholder="Enter new telephone number">
        <div class="buttonwrapper">
        <button class="btn" type="submit" >
            Save
        </button>
        </div>
    </form>

</div>

</div>
<?php require_once ("./../resources/elements/footer.php"); ?>