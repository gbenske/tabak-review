<?php 
    if(!$error) { 
        $statement = $pdo->prepare("SELECT * FROM tobacco WHERE id_tobacco, id_flavor = :id_tobacco, :id_flavor");
        $result = $statement->execute(array('id_tobacco' => $chooseTobacco, 'id_flavor' => $chooseFlavor));
        $tobacco_to_flavor = $statement->fetch();
   
    if($tobacco_to_flavor !== false) {
            echo 'Dieser Geschmack wurde bereits der Tabaksorte hinzugefügt!';
        $error = true;
     } else {

       // Schreibe Tabaksorte zu entsprechenden Geschmack
        if(isset($_POST['chooseTobacco'], $_POST['chooseFlavor'])) {
            $statement = $pdo->prepare("INSERT INTO tobacco_to_flavor (id_tobacco, id_flavor) VALUES (:id_tobacco, :id_flavor)");
            $result = $statement->execute(array('id_tobacco' => $chooseTobacco, 'id_flavor' => $chooseFlavor));

            if($result) { 
                echo 'Geschmack wurder erfolgreich der Tabaksorte hinzugefügt';
            } else {
                echo 'Beim Abspeichern ist leider ein Fehler aufgetreten';
            }
        }
    }
}
?>