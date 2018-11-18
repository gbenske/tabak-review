<?php 
    if(!$error) { 
        $statement = $pdo->prepare("SELECT * FROM tobacco WHERE name = :name");
        $result = $statement->execute(array('name' => $addTobacco));
        $tobaccoSort = $statement->fetch();
   
        if($tobaccoSort !== false) {
                echo 'Dieser Tabaksorte ist bereits gespeichert!';
            $error = true;
        } else {

        // Schreibe Tabaksorte zu entsprechenden Hersteller
            if(isset($_POST['chooseManufacturer'])) {
                $statement = $pdo->prepare("INSERT INTO tobacco (name, id_manufacturer) VALUES (:name, :id_manufacturer)");
                $result = $statement->execute(array('name' => $addTobacco, 'id_manufacturer' => $chooseManufacturer));

            if (isset($_POST['addTobacco'])) {
                if($result) { 
                    echo 'Tabaksorte wurde hinzufügt.';
                } else {
                    echo 'Beim Abspeichern ist leider ein Fehler aufgetreten';
                }
            }
        }
    }
}
?>