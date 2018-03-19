<?php require_once('./../resources/elements/header.php') ?>
<div class="content-right">

    <div class="Support">
        <h1><img class="image"  src="./images/download.png"</img>Support</h1>
        <p>In case you need help, please fill in the form.</p>
        <hr>

        <form class="support-wrapper">


            <label for="name"><img class="image3"  src="./images/name_icon.png"</img><span>Name</span></label>
            <input id="name" type="text" placeholder="Enter name">

            <label for="email"><img class="image3"  src="./images/email_icon.jpg"</img><span>Email</span></label>
            <input id="email" type="email" placeholder="Enter email">

            <label for="subject"><img class="image4"  src="./images/message_icon.png"</img><span>Message</span></label>
            <textarea id="subject" name="subject" placeholder="Write your message" style="height:100px"></textarea>

            <div class="button-wrapper">
                <button class="buttons" type="submit" >
                    Send
                </button>
            </div>
        </form>

    </div>

</div>
<?php require_once ("./../resources/elements/footer.php"); ?>
