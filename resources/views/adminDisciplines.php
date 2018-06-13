<link rel="stylesheet" type="text/css" href="/css/adminDisciplines.css"/>

<div class="message">
<?php
if (isset($_SESSION['msg'])){
    ?>
    <img src="./images/checked.png" alt="" class="checkedImage">
<?php
    echo $_SESSION['msg'];

    unset($_SESSION['msg']);
}
if (isset($_SESSION['Error'])){
    ?>
    <img src="./images/xMark.png" alt="" class="checkedImage">
    <?php

    echo $_SESSION['Error'];

    unset($_SESSION['Error']);
}
?>
</div>

<div class="addDiscipline">

    <button onclick="myAddFunction()" type="button" class="addButton">Add a discipline</button>

    <form style="display:none;"  id="addForm" method="POST" action="/addDisciplines-action">
        <label for="name"><span>Name of the discipline:</span></label>
        <input id="name" name="name" type="text"  required placeholder="Enter the name of the discipline">

        <label for="year"><span>Year of the discipline:</span></label>
        <input id="year" name="year" type="text" title="Year must be a number between 1 and 6" required pattern="[1-9]" placeholder="Enter the year of the discipline">

        <label for="description"><span>Description:</span></label>
        <textarea id="description" name="description" title="Description must not be blank and contain only letters, numbers and underscores." required pattern="\w+" placeholder="Write the description for the discipline" style="height:150px"></textarea>

        <div class="button-wrapper">
            <input type="submit" id="buttonAdd" name="buttonAdd" value="ADD" >
        </div>
    </form>
</div>


<div class="removeDiscipline">

    <button onclick="myRemoveFunction2()" type="button" class="RemoveButton">Remove a discipline</button>

    <form style="display:none;" id="removeForm" method="POST" action="/removeDisciplines-action">
        <label for="name"><span>Name of the discipline</span></label>
        <input id="name" name="name" required type="text" placeholder="Enter the name of the discipline">

        <label for="name"><span>Year of the discipline</span></label>
        <input id="year" name="year" required type="text" placeholder="Enter the year of the discipline">

        <div class="button-wrapper">
            <input type="submit" id="buttonRemove" name="buttonRemove" value="REMOVE" />
        </div>
    </form>

</div>


<script>
    function myAddFunction() {
        var x = document.getElementById("addForm");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function myRemoveFunction2() {
        var x = document.getElementById("removeForm");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>