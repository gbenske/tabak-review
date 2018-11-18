<?php 
    if(!$error) { 
        $statement = $pdo->prepare("SELECT * FROM rating WHERE  id_tobacco =  :id_tobacco");
        $result = $statement->execute(array('id_tobacco' => $chooseTobacco));
        $tobaccoRating = $statement->fetch();
   
        if($tobaccoRating !== false) {
                echo 'Dieser Tabaksorte wurde bereits bewertet!';
            $error = true;
        } else {

        // Schreibe Tabaksorte zu entsprechenden Hersteller
            if(isset($_POST['chooseTobacco'])) {
                $statement = $pdo->prepare("INSERT INTO rating (count, note, id_tobacco) VALUES (:count, :note, :id_tobacco)");
                $result = $statement->execute(array('count' => $addRating, 'note' => $addNote,'id_tobacco' => $chooseTobacco));

            if (isset($_POST['addRating'])) {
                if($result) { 
                    echo 'Tabaksorte wurde bewertet.';
                } else {
                    echo 'Beim Abspeichern ist leider ein Fehler aufgetreten';
                }
            }
        } 
    } 
}
?>