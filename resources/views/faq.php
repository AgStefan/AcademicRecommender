<?php

require_once('./../resources/elements/header.php') ?>

    <div class="content">


<div class="faq-wrapper">

    <p class="HaveaQ">
       <b> Have a Question? </b>

    </p>
    <form method="POST" action="search-action">
        <label for="faq"></label>

        <input id="search" name="search" type="text" placeholder="" >

            <button class="buttons" type="submit" >
            Search
        </button>

    </form>
    <p class="HaveaQ">
        <b>Want to add a question? </b>

    </p>

        <form method="POST" action="addQuestion-action">

            <input id="add" name="add" type="text" placeholder="" >

            <button class="buttons" type="submit" >
                Add a Question
            </button>

        </form>

    <?php
    if (isset($_SESSION) && isset($_SESSION['role']) && $_SESSION['role'] == '2' ){

        ?>
        <p class="HaveaQ">
            <b>ADMIN: </b>
        </p>
        <button onclick="removeQuestion()" type="button2" class="removeButton">Delete a question by ID</button>
        <form style="display:none;" method="POST" id="removeForm"  action="/removeQuestion-action">

            <input id="id" name="id" type="text"  required placeholder="Enter the ID">
            <div class="button-wrapper">
                <input type="submit" id="buttonRemove" name="buttonRemove" value="Delete Question" />
            </div>
        </form>
            <br><br>
        <button onclick="addAnswer()" type="button2" class="addAnswerButton">Delete a question by ID</button>

            <form style="display:none;" method="POST" id="answerForm"  action="/addAnswer-action">
                <input id="id" name="id" type="text"  required placeholder="Enter the ID">
                <input id="answer" name="answer" type="text"  required placeholder="Enter the answer"/>
                <div class="button-wrapper">
                    <input type="submit" id="buttonAnswer" name="buttonAnswer" value="Insert Answer" />
                </div>

            </form>




        <?php
    }
    ?>
    <p class="Questions">
        <b > Most common questions: </b>
    </p>


        <?php
        if (is_null($questions)){

        }
        else{

        foreach ($questions as $question): ?>
    <div class="faq_holder">


        <?php
        if (isset($_SESSION) && isset($_SESSION['role']) && $_SESSION['role'] == '2' ){

            ?>
            <p><b>ID: <?= $question->id ?></b></p>
            <?php
        }
        ?>

        <p><b> Q: </b> <?= $question->question ?></p>

        <p><b> A: </b> <?= $question->answer ?></p>
    </div>
    <?php endforeach;} ?>

</div>


<?php require_once('./../resources/elements/footer.php') ?>

        <script>
            function removeQuestion() {
                var x = document.getElementById("removeForm");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }

            function addAnswer() {
                var x = document.getElementById("answerForm");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
        </script>
