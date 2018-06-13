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
        <?php
        if (isset($_SESSION) && isset($_SESSION['role']) && $_SESSION['role'] == '2' ){

            ?>
            <form method="POST" action="removeQuestion-action">
             <div class="button-wrapper">
            <input type="submit" id="buttonRemove" name="buttonRemove" value="Delete Question" />
        </div>

            </form>
            <?php
        }
        ?>
    <img class="QuestionIcon" src="./images/QuestionIcon.png" alt="">
        <p><b> Q: </b> <?= $question->question ?></p>

        <p><b> A: </b> <?= $question->answer ?></p>


    </div>
    <?php endforeach; ?>

</div>

    <script>
        function checkUsername () {
            var status = document.getElementById("usernamestatus");
            var u = document.getElementById("username").value;
            if(u != "")
            {
                status.innerHTML = 'Se verifica...';
                var hr = new XMLHttpRequest();
                hr.open("POST","/register-check",true);
                hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                hr.onreadystatechange = function(){
                    console.log(hr.responseText);
                    if (hr.readyState == 4){
                        status.innerHTML = hr.responseText;
                        if (hr.status == 200) {
                            document.getElementById('submit').className = "btn btn-primary";
                        } else {
                            document.getElementById('submit').className = "btn btn-primary disabled" ;

                        }
                    }
                }


                var v = "username="+u;
                hr.send(v);



            }

        }

    </script>

<?php require_once('./../resources/elements/footer.php') ?>