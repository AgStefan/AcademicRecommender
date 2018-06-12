<?php

class  AdminDisciplinesController extends Controller
{

    public static function addDiscipline()
    {

        $model = self::model('AdminDisciplines');

        if (isset($_POST['name']) && isset($_POST['year']) && isset($_POST['description'])) {

            $name = $_POST['name'];
            $slug = slugify($_POST['name']);

            $year = $_POST['year'];
            $description = $_POST['description'];

            if (isset($_POST['buttonAdd'])) {

                if ($model::$db === false) {

                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }

                $stmt = $model::$db->prepare("SELECT * from disciplines where nume = '$name'");
                $stmt->execute();
                $result = $stmt->get_result();
                $stmt->close();

                if (mysqli_num_rows($result) >= 1) {

                    header('Location: disciplines');
                    $_SESSION['Error'] = "Discipline ". $name ." already exists!";

                } else {

                    $stmt = $model::$db->prepare("INSERT INTO disciplines (nume, an, description, slug)VALUES (?, ?, ?, ?)");
                    $stmt->bind_param('ssss', $name, $year, $description, $slug);
                    $stmt->execute();
                    if ($stmt) {
                        $_SESSION['msg'] = "Discipline " . $name . " added successfully!";
                    } else {
                        echo "Error: " . $stmt . "<br>" . $model::$db->error;
                    }
                    $stmt->close();
                }

            }
            header('Location: disciplines');

        }
        die();
    }


    public static function removeDiscipline()
    {

        $model = self::model('AdminDisciplines');

        if (isset($_POST['name']) && isset($_POST['year'])) {

            $name = $_POST['name'];
            $year = $_POST['year'];
            $name = mysqli_real_escape_string($model::$db, $name);

            if (isset($_POST['buttonRemove'])) {

                if ($model::$db === false) {
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }

                $stmt = $model::$db->prepare("SELECT * from disciplines WHERE nume = '$name'");
                $stmt->execute();
                $result = $stmt->get_result();
                $stmt->close();

                $row = mysqli_fetch_array($result);

                if (mysqli_num_rows($result) < 1) {
                    header('Location: disciplines');
                    $_SESSION['Error'] = "Discipline " . $name . " does not exists!";

                } else {

                    if ($row['an'] == $year ) {

                        $stmt = $model::$db->prepare("DELETE FROM disciplines WHERE nume = '$name' and an = '$year'");
                        $stmt->execute();

                        if ($stmt) {
                            $_SESSION['msg'] = "Discipline " . $name . " deleted successfully!";
                        } else {
                            echo "Error: " . $stmt . "<br>" . $model::$db->error;
                        }
                        $stmt->close();

                    } else {

                        $_SESSION['Error'] = "Invalid year!";

                    }
                    header('Location: disciplines');

                }
            }
            die();
        }
    }
}
