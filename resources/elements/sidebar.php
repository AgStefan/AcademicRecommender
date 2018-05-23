<ul class="sidebar-items-container">
    <?php
    if (isset($_SESSION['email'])) {
        ?>
        <li class="sidebar-item">
            <a href="/account-settings">Account Settings</a>
        </li>

        <li class="sidebar-item">
            <a href="/messages">Messages</a>
        </li>
        <?php
    }
    ?>
    <li class="sidebar-item">
        <a href="/disciplines">Disciplines</a>
    </li>
<!--    <li class="sidebar-item">-->
<!--        <a href="/tops">Tops</a>-->
<!--    </li>-->
<!--    <li class="sidebar-item">-->
<!--        <a href="/latest">Latest</a>-->
<!--    </li>-->
    <li class="sidebar-item">
        <a href="/support">Support</a>
    </li>
</ul>

<!-- Highlight the active link in sidebar menu. -->
<script>
    for (var i = 0; i < document.links.length; i++) {
        if (document.links[i].href == document.URL) {
            document.links[i].className = 'active';
        }
    }
</script>
