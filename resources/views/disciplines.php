<?php
session_start();
require_once('./../resources/elements/header.php') ?>
<div class="content-right">

    <!-- Add/Remove a discipline - only for the admin -->
    <?php
    if ($_SESSION['email'] == 'admin' ) {
        require_once('adminDisciplines.php');
    }
    ?>


    <div class="disciplineswrapper">

            <div class="disciplinewrapper">
                <div class="discipline-image">
                    <img src="./images/web-technologies.png" alt="">
                </div>
                <div class="discipline-information">
                    <h2 >Discipline:
                        <span >Web Technologies</span></h2>
                    <div class="discipline-extra-information">
                        <button class="btn">Rating: 3.4 </button>
                        <span>/</span>
                        <button class="btn">3 Comments</button>
                        <span>/</span>
                        <button class="btn">Other info</button>
                    </div>

                    <div class="discipline-small-description">
                        Web technologies is a general term referring to the many languages and multimedia packages that are used in conjunction with one another, to produce dynamic web sites such as this one.
                    </div>
                    <div class="discipline-read-more-button-wrapper">
                        <a href="/matematica">Read more</a>
                    </div>
                </div>
            </div>

            <div class="disciplinewrapper">
                <div class="discipline-image">
                    <img src="./images/data-base.png" alt="">
                </div>
                <div class="discipline-information">
                    <h2>Discipline:<span  class="Ratting"> Data bases</span></h2>
                    <div class="discipline-extra-information">
                        <button class="btn">Rating: 3.4 </button>
                        <span>/</span>
                        <button class="btn">3 Comments</button>
                        <span>/</span>
                        <button class="btn">Other info</button>
                    </div>
                    <div class="discipline-small-description">
                        A databyase is an organized collection of data. A relational database, more restrictively, is a collection of schemas, tables, queries, reports, views, and other elements.
                    </div>
                    <div class="discipline-read-more-button-wrapper">
                        <a href="/discipline/matematica">Read more</a>
                    </div>
                </div>
            </div>

            <div class="disciplinewrapper">
                <div class="discipline-image">
                    <img src="./images/machine-learning.png" alt="">
                </div>
                <div class="discipline-information">
                    <h2>Discipline:<span  class="Ratting"> Machine Learning</span></h2>
                    <div class="discipline-extra-information">
                        <button class="btn">Rating: 3.4 </button>
                        <span>/</span>
                        <button class="btn">3 Comments</button>
                        <span>/</span>
                        <button class="btn">Other info</button>
                    </div>
                    <div class="discipline-small-description">
                        Evolved from the study of pattern recognition and computational learning theory in artificial intelligence, machine learning explores the study and construction of algorithms.
                    </div>
                    <div class="discipline-read-more-button-wrapper">
                        <a href="/discipline/matematica">Read more</a>
                    </div>
                </div>
            </div>

            <div class="disciplinewrapper">
                <div class="discipline-image">
                    <img src="./images/oop.png" alt="">
                </div>
                <div class="discipline-information">
                    <h2>Discipline:<span  class="Ratting"> OOP</span></h2>
                    <div class="discipline-extra-information">
                        <button class="btn">Rating: 3.4 </button>
                        <span>/</span>
                        <button class="btn">3 Comments</button>
                        <span>/</span>
                        <button class="btn">Other info</button>
                    </div>
                    <div class="discipline-small-description">
                        Object-oriented programming (OOP) is a programming paradigm based on the concept of "objects", which may contain data, in the form of fields, often known as attributes.
                    </div>
                    <div class="discipline-read-more-button-wrapper">
                        <a href="matematica">Read more</a>
                    </div>
                </div>
            </div>



        <div class="disciplines-popular">

        </div>
    </div>




</div>
<?php require_once ("./../resources/elements/footer.php"); ?>
