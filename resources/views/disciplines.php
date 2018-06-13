<?php

require_once('./../resources/elements/header.php') ?>
<div class="content-right">

    <!-- Add/Remove a discipline - only for the admin -->
    <?php

    if (getCurrentUserRole() && getCurrentUserRole() === 2 ) {
        require_once('adminDisciplines.php');
    }

    ?>




    <div class="disciplineswrapper">
        <?php if ($disciplines): ?>
        <?php foreach ($disciplines as $discipline): ?>
            <div class="disciplinewrapper">
                <div class="discipline-image">
                    <img src="./images/web-technologies.png" alt="">
                </div>
                <div class="discipline-information">
                    <h2 >Discipline:
                        <span ><?= $discipline->nume ?></span></h2>
                    <div class="discipline-extra-information">
                        <button class="btn">An: <?= $discipline->an ?></button>
                    </div>

                    <div class="discipline-small-description">
                        <?= $discipline->description ?>
                    </div>
                    <div class="discipline-read-more-button-wrapper">
                        <a href="/discipline/<?= $discipline->slug ?>">Read more</a>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
<?php endif; ?>
        <div class="disciplines-popular">

        </div>
    </div>




</div>
<?php require_once ("./../resources/elements/footer.php"); ?>
