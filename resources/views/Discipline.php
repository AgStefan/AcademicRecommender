<?php require_once('./../resources/elements/header.php') ?>
<div class="content-right">


    <div class="discipline-wrapp">

        <div class="discipline-title-wrapp">
            <h1>Titlu Disciplina</h1>
        </div>

        <div class="discipline-menu-wrapp">
            <div class="discipline-menu">
                <div onclick="openTab(event, 'discipline-info-tab')" class="active discipline-menu-item discipline-menu-information">Discipline Information</div>
                <div onclick="openTab(event, 'discipline-persons-tab')" class="discipline-menu-item discipline-menu-persons">Persons of interest</div>
                <div onclick="openTab(event, 'discipline-materials-tab')" class="discipline-menu-item discipline-menu-materials">Materials</div>
                <div onclick="openTab(event, 'discipline-comments-tab')" class="discipline-menu-item discipline-menu-comments">Top Comments </div>
            </div>


            <div id="discipline-info-tab" class="discipline-tab tab-content">
                <p>Anul: <span>2</span></p>
                <p>Profesori: <span>Profesor1, Profesor 2</span></p>
                <p>Numar comentarii: <span>421</span></p>
                <p>Other <span>...</span></p>
            </div>

            <div id="discipline-persons-tab" class="discipline-tab tab-content">
                <h2>Nume student 1</h2>

                <blockquote>
                    <p>Email: <span>exemplu@exemplu.exemplu</span></p>
                    <p>Nr telefon: <span>01846861</span></p>
                </blockquote>
            </div>

            <div id="discipline-materials-tab" class="discipline-tab tab-content">



            </div>

            <div id="discipline-comments-tab" class="discipline-tab tab-content">
                <h3>Comment 1</h3>

                <blockquote>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda blanditiis ducimus iusto maxime necessitatibus nisi nobis saepe. Ab alias, aspernatur cum eius explicabo modi neque nisi quasi, quidem saepe, voluptatum.
                </blockquote>
            </div>
        </div>


        <div class="comments-write-wrapper">
            <form action="#" method="POST">
                <div class="comments-holder">
                    <textarea placeholder="Write a comment" name="comment" id="comment-write-holder" cols="30" rows="10"></textarea>
                </div>

                <div class="comments-bottom-menu">
                    <button type="submit" class="publish-comment-button">Publish Comment</button>
                    <button class="reset-comment-button">Reset</button>
                </div>

            </form>

        </div>

        <div class="user-comments-holder">

        </div>


    </div>
</div>

    <script>
        function openTab(event, tab) {
            var elementClassNames = event.currentTarget.className,
                menuItems = document.getElementsByClassName("tab-content");

            for (i = 0; i < menuItems.length; i++) {
                menuItems[i].style.display = "none";
            }

            var menuItem = document.getElementsByClassName("discipline-menu-item");

            for (i = 0; i < menuItem.length; i++) {
                menuItem[i].className = menuItem[i].className.replace("active", "");
            }

            document.getElementById(tab).style.display = "block";

            event.currentTarget.className += ' active';
        }
    </script>

<?php require_once ("./../resources/elements/footer.php"); ?>