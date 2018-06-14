<?php require_once('./../resources/elements/header.php') ?>
<div class="content-right">


    <div class="discipline-wrapp">

        <div class="discipline-title-wrapp">
            <h1><?= $discipline ? $discipline->nume : '' ?></h1>
        </div>

        <div class="discipline-menu-wrapp">
            <div class="discipline-menu">
                <div onclick="openTab(event, 'discipline-info-tab')" class="active discipline-menu-item discipline-menu-information">Discipline Information</div>
                <div onclick="openTab(event, 'discipline-persons-tab')" class="discipline-menu-item discipline-menu-persons">Persons of interest</div>
                <div onclick="openTab(event, 'discipline-materials-tab')" class="discipline-menu-item discipline-menu-materials">Materials</div>
                <div onclick="openTab(event, 'discipline-comments-tab')" class="discipline-menu-item discipline-menu-comments">Top Comments </div>
            </div>


            <div id="discipline-info-tab" class="discipline-tab tab-content">
                <p>Anul: <span><?= $discipline ? $discipline->an : '' ?></span></p>
                <p>Numar comentarii: <span><?= isset($disciplineComments) ? count($disciplineComments) : '0' ?></span></p>
            </div>

            <div id="discipline-persons-tab" class="discipline-tab tab-content">
                <?php if ($personOfInterest): ?>
                <h2><?= $personOfInterest ? $personOfInterest->username : '' ?></h2>

                <blockquote>
                    <p>Email: <span><?= $personOfInterest ? $personOfInterest->email : '' ?></span></p>
                </blockquote>
                <?php endif; ?>
            </div>

            <div id="discipline-materials-tab" class="discipline-tab tab-content">

                <?php foreach ($disciplineFiles as $disciplineFile): ?>
                    <p><a href="/download-file/<?= $disciplineFile->id ?>"><?= $disciplineFile->name ?></a></p>
                <?php endforeach; ?>


            </div>

            <div id="discipline-comments-tab" class="discipline-tab tab-content">
                <h3><?= $recommendedComment ? $recommendedComment->subject : '' ?></h3>

                <blockquote>
                    <?= $recommendedComment ? $recommendedComment->content : '' ?>
                </blockquote>
            </div>
        </div>


        <?php if (isset($_SESSION) && isset($_SESSION['role'])): ?>
        <div class="comments-write-wrapper">
            <form action="/upload-comment" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="discipline_id" value="<?= $discipline->id ?>">

                <div class="comments-holder">
                    <input type="text" name="subject" id="subject" placeholder="Write a subject">
                    <textarea placeholder="Write a comment" name="comment" id="comment-write-holder" cols="30" rows="10"></textarea>
                </div>

                <div class="file-upload">
                    Select file to upload:
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>

                <div class="comments-bottom-menu">
                    <button type="submit" class="publish-comment-button">Publish Comment</button>
                    <button class="reset-comment-button">Reset</button>
                </div>

            </form>

        </div>


        <?php endif; ?>

        <div class="user-comments-holder">
            <?php if ($disciplineComments): ?>
                <?php foreach($disciplineComments as $disciplineComment): ?>

                    <div class="container">
                        <div class="dialogbox">
                            <div class="body">
                                <div class="message">
                                    <p style="color: green;"><?= $disciplineComment->subject ?></p>
                                    <p><?= $disciplineComment->content ?></p>

                                    <?php if ($disciplineComment->file_id): ?>

                                        <hr>
                                        <p><a href="/download-file/<?= $disciplineComment->file_id ?>"><?= $disciplineComment->file_name ?></a></p>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            <?php endif; ?>

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