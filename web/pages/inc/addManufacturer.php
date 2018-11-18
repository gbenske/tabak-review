<?php
    if($chooseManufacturer == '') {
        if (!empty($_POST['addManufacturer'])) {

            //Überprüfe, ob Hersteller schon vorhanden ist
            if(!$error) { 
                $statement = $pdo->prepare("SELECT * FROM manufacturer WHERE name = :name");
                $result = $statement->execute(array('name' => $addManufacturer));
                $tobaccoManufacturer = $statement->fetch();
                
                if($tobaccoManufacturer !== false) {
                        echo 'Dieser Hersteller ist bereits gespeichert!';
                    $error = true;
                }  else {
                    $statement = $pdo->prepare("INSERT INTO manufacturer (name) VALUES (:name)");
                    $result = $statement->execute(array('name' => $addManufacturer));

                    if (isset($_POST['addManufacturer'])) {
                        if($result) { 
                            echo 'Hersteller wurde hinzufügt.';
                        } else {
                            echo 'Beim Abspeichern ist leider ein Fehler aufgetreten';
                        }
                    }
                }
            }
        }
    }
?>