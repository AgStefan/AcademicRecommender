

<?php require_once('./../resources/elements/header.php') ?>
<div class="content-right">

<div class="AccountSettings">
<h1 style="color:black"  >Account Settings </h1>

    <form class="wrapper-input">


        <label for="username">Username</label>
        <input id="username" type="text" placeholder="Enter username">

        <label for="passwordchange">Password</label>
        <input id="passwordchange" type="password" placeholder="Enter new password">

        <label for="repeatpasswordchange">Password</label>
        <input id="repeatpasswordchange1" type="password" placeholder="Reenter new password">

        <label for="emailchange">Email</label>
        <input id="emailchange" type="email" placeholder="Enter new email">

        <label for="telephonechange">Telephone</label>
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