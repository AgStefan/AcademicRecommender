<?php

require_once('./../resources/elements/header.php') ?>
<div class="content-right">

    <!-- Add/Remove a discipline - only for the admin -->
    <?php

    $_SESSION['role'] = 2;

    if (isset($_SESSION) && isset($_SESSION['role']) && $_SESSION['role'] == '2' ) {
        require_once('adminDisciplines.php');
    }

    ?>




    <div class="disciplineswrapper">

        <?php foreach ($disciplines as $discipline): ?>
            <div class="disciplinewrapper">
                <div class="discipline-image">
                    <img src="./images/web-technologies.png" alt="">
                </div>
                <div class="discipline-information">
                    <h2 >Discipline:
                        <span ><?= $discipline->nume ?></span></h2>
                    <div class="discipline-extra-information">
                        <button class="btn">Rating: 3.4 </button>
                        <span>/</span>
                        <button class="btn">3 Comments</button>
                        <span>/</span>
                        <button class="btn">An: <?= $discipline->an ?></button>
                        <span>/</span>

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

        <div class="disciplines-popular">

        </div>
    </div>




</div>
<?php require_once ("./../resources/elements/footer.php"); ?>
