<?php
    if($chooseFlavor == '') {
        if (!empty($_POST['addFlavor'])) {
            
            //Überprüfe, ob Hersteller schon vorhanden ist
            if(!$error) { 
                $statement = $pdo->prepare("SELECT * FROM flavir WHERE name = :name");
                $result = $statement->execute(array('name' => $addFlavor));
                $tobaccoFlavor = $statement->fetch();
                
                if($tobaccoFlavor !== false) {
                        echo 'Dieser Geschmack ist bereits gespeichert!';
                    $error = true;
                }  else {
                    $statement = $pdo->prepare("INSERT INTO flavor (name) VALUES (:name)");
                    $result = $statement->execute(array('name' => $addFlavor));

                    if (isset($_POST['addFlavor'])) {
                        if($result) { 
                            echo 'Geschmack wurde hinzufügt.';
                        } else {
                            echo 'Beim Abspeichern ist leider ein Fehler aufgetreten';
                        }
                    }
                }
            }
        }
    }
?>