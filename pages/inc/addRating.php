<?php
            
//Überprüfe, ob Hersteller schon vorhanden ist
if(!$error) { 
    $statement = $pdo->prepare("SELECT * FROM rating WHERE count, id_tobacco = :count, :id_tobacco");
    $result = $statement->execute(array('count' => $addRating, 'id_tobacco' => $chooseTobacco));
    $tobaccoRating = $statement->fetch();
    
    if($tobaccoRating !== false) {
            echo 'Diese Tabaksorte wurde bereits bewertet!';
        $error = true;
    }  else {
        $statement = $pdo->prepare("INSERT INTO rating (count, note, id_tobacco) VALUES (:count, :note, :id_tobacco)");
        $result = $statement->execute(array('count' => $addRating, 'note' => $addNotice, 'id_tobacco' => $chooseTobacco));

        if (isset($_POST['addRating'])) {
            if($result) { 
                echo 'Die Bewertung für den Tabak wurde abgegeben.';
            } else {
                echo 'Beim Abspeichern ist leider ein Fehler aufgetreten';
            }
        }
    }
}
?>