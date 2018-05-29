<link rel="stylesheet" type="text/css" href="/css/adminDisciplines.css"/>

<div class="addDiscipline">
        <button onclick="myAddFunction()" type="button" class="addButton">Add a discipline</button>
        <form style="display:none;"  id="addForm" method="POST">

            <label for="name"><span>Name of the discipline:</span></label>
            <input id="name" name="name" type="text" placeholder="Enter the name of the discipline">

            <label for="year"><span>Year of the discipline:</span></label>
            <input id="year" name="year" type="text" placeholder="Enter the year of the discipline">

            <label for="description"><span>Description:</span></label>
            <textarea id="description" name="description" placeholder="Write the description for the discipline" style="height:150px"></textarea>

            <div class="button-wrapper">
                <input type="submit" id="buttonAdd" name="buttonAdd" value="ADD" />

                <?php
                $verify = 0;
                if (isset($_POST['name']) && isset($_POST['year']) && isset($_POST['description'])) {

                    $name = $_POST['name'];
                    $year = $_POST['year'];
                    $description = $_POST['description'];

                    if (isset($_POST['buttonAdd'])) {

                        $conn = mysqli_connect('localhost', 'root', '', 'twproject');
                        // Check connection
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        $sql =  $conn->prepare("INSERT INTO disciplines (nume, an, description)VALUES (?, ?, ?)");
                        $sql->bind_param('sss', $name, $year,$description);
                        $sql->execute();

                         //$sql = "INSERT INTO disciplines (nume, an, description)VALUES ('$name', '$year','$description')";
                        $sql->close();

                        if (mysqli_query($conn, $sql)) {
                            $verify = 1;
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                    }
                    //die();
                    //$conn->close();
                }

                ?>
            </div>
        </form>
        </div>




        <div class="removeDiscipline">
            <button onclick="myRemoveFunction2()" type="button" class="RemoveButton">Remove a discipline</button>
            <form style="display:none;" id="removeForm" method="POST">
                <label for="name"><span>Name of the discipline</span></label>
                <input id="name" name="name" type="text" placeholder="Enter the name of the discipline">
                <label for="name"><span>Year of the discipline</span></label>
                <input id="year" name="year" type="text" placeholder="Enter the year of the discipline">

                <div class="button-wrapper">
                    <input type="submit" id="buttonRemove" name="buttonRemove" value="REMOVE" />


    <?php
    $verify2 = 0;

    if (isset($_POST['name']) && isset($_POST['year'])){

        $name = $_POST['name'];
        $year = $_POST['year'];

        if (isset($_POST['buttonRemove'])) {

            $conn = mysqli_connect('localhost', 'root', '', 'twproject');
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = $conn->prepare( "DELETE FROM disciplines WHERE nume = '$name' and an = '$year'");
            $sql->execute();
            $sql->close();

            if (mysqli_query($conn, $sql)) {
                $verify2 = 1;
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            //mysqli_close($conn);
        }
    }
    ?>
                </div>
            </form>
        </div>
<?php
if ($verify2 == 1){
    echo "Record deleted successfully";
}
?>


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