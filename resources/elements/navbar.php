<div class="navbar-wrapper" id="myTopnav">
    <ul>
        <li><img src="./images/about_us.png" alt=""> <a href="/about-us">About</a></li>
        <li><img src="./images/faq_icon.png"  alt="" > <a href="/faq">F A Q</a></li>
        <?php
        if (!isset($_SESSION['email'])){
            ?>
            <li><img src="./images/user_login.png" alt=""> <a href="/login">Login</a></li>
            <li><img src="./images/user_image.png" alt=""> <a href="/signup"> Sign Up</a></li>
            <?php
         } else {
            ?>
            <li><img src="./images/Logout.png" alt=""> <a href="/logout">Logout</a></li>
            <?php
        }
        ?>
        <li> <img src="./images/home_icon.png" alt=""> <a href="/home"> Home</a></li>
    </ul>

    <!-- Highlight the active link in navigation menu. -->
    <script>
        for (var i = 0; i < document.links.length; i++) {
            if (document.links[i].href == document.URL) {
                document.links[i].className = 'active';
            }
        }
    </script>
</div>
