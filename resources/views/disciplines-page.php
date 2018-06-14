<?php

require_once('./../resources/elements/header.php') ?>
<div class="content-right">

    <!-- Add/Remove a discipline - only for the admin -->
    <?php

    if (getCurrentUserRole() && getCurrentUserRole() === 2 ) {
        require_once('adminDisciplines.php');
    }

    ?>
    <?php if ($disciplines): ?>
<div class="container" style="margin-bottom: 50px;">
    <label for="an">
        <input onclick="handleClick(this);" id="an-1" type="radio" name="an" value="1">
        Anul 1
    </label>
    <label for="an">
        <input onclick="handleClick(this);" id="an-2" type="radio" name="an" value="2">
        Anul 2
    </label>
</div>
    <?php endif; ?>

    <div class="disciplineswrapper" id="disciplineswrapper">
        <?php if ($disciplines): ?>
        <?php foreach ($disciplines as $discipline): ?>
            <div class="disciplinewrapper">
                <div class="discipline-information">
                    <h2 >Discipline: <span ><?= $discipline->nume ?></span></h2>
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

<script>

        function handleClick(myRadio) {

            var u = myRadio.value;
            var hr = new XMLHttpRequest();
            hr.open("POST", "/disciplines-filter", true);
            hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            hr.onreadystatechange = function () {
                console.log(hr.responseText);
                if (hr.readyState == 4) {
                    var html = '';
                    if (hr.status == 200 && hr.responseText) {
                        var items = JSON.parse(hr.responseText);
                        var html = '';
                        for(var i = 0; i < items.length; ++i) {

                            html += '<div class="disciplinewrapper">';



                            html += '<div class="discipline-information">';
                            html += '<h2>Discipline: <span >' + items[i]['nume'] +'</span></h2>';

                            html += '<div class="discipline-extra-information">';
                            html += '<button class="btn">An: ' + items[i]['an'] + '</button>';
                            html += '</div>';

                            html += '<div class="discipline-small-description">';
                            html += '<span>'+ items[i]['description'] +'</span>';
                            html += '</div>';


                            html += '<div class="discipline-read-more-button-wrapper">';
                            html += '<a href="/discipline/'+ items[i]['slug'] +'">Read more</a>';
                            html += '</div>';

                            html += '</div>';



                            html += '</div>';

                        }



                    } else {
//                        document.getElementById('submit').className = "btn btn-primary disabled";
                    }
                    document.getElementById("disciplineswrapper").innerHTML = html;
                }
            }

            var v = "an="+u;
            hr.send(v);
        };


</script>

<?php require_once ("./../resources/elements/footer.php"); ?>
