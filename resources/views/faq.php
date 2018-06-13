<?php

require_once('./../resources/elements/header.php') ?>

    <div class="content">


<div class="faq-wrapper">

    <p class="HaveaQ">
       <b style="padding-left: 80px"> Have a Question? </b>

    </p>
    <form method="POST" action="search-action">
        <label for="faq"></label>

        <input id="search" name="search" type="text" placeholder="" >

            <button class="buttons" type="submit" >
            Search
        </button>

    </form>
    <p class="HaveaQ">
        <b style="padding-left: 80px">Want to add a question? </b>

    </p>

        <form method="POST" action="addQuestion-action">

            <input id="add" name="add" type="text" placeholder="" >

            <button class="buttons" type="submit" >
                Add a Question
            </button>

        </form>
    <p class="Questions">
        <b > Most common questions: </b>

    </p>


        <?php foreach ($questions as $question): ?>
    <div class="faq_holder">

    <img class="QuestionIcon" src="./images/QuestionIcon.png" alt="">
        <p><b> Q: </b> <?= $question->question ?></p>
        <p><b> A: </b> <?= $question->answer ?></p>


    </div>
    <?php endforeach; ?>

</div>

<?php require_once('./../resources/elements/footer.php') ?>