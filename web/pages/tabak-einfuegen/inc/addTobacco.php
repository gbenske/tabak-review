<?php 
    if(!$error) { 
        $statement = $pdo->prepare("SELECT * FROM tobacco WHERE name = :name");
        $result = $statement->execute(array('name' => $addTobacco));
        $tobaccoSort = $statement->fetch();
   
        if($tobaccoSort !== false) {
                echo 'Dieser Tabaksorte ist bereits gespeichert!';
            $error = true;
        } else {
            if(is_uploaded_file($_FILES['image']['tmp_name'])){ 
                
                $folder = "../../assets/img/content/tabaksorten/"; 
                $file = basename( $_FILES['image']['name']); 
                $full_path = $folder.$file; 
        
                if(move_uploaded_file($_FILES['image']['tmp_name'], $full_path)) { 
                    echo "Erfolgreich hochgeladen.";
                        // Schreibe Tabaksorte zu entsprechenden Hersteller
                        if(isset($_POST['chooseManufacturer'])) {
                            $statement = $pdo->prepare("INSERT INTO tobacco (name, id_manufacturer, image) VALUES (:name, :id_manufacturer, :image)");
                            $result = $statement->execute(array('name' => $addTobacco, 'id_manufacturer' => $chooseManufacturer, 'image' => $file));
                            
                        if (isset($_POST['addTobacco'])) {
                            if($result) { 
                                echo 'Tabaksorte wurde hinzufügt.';
                            } else {
                                echo 'Beim Abspeichern ist leider ein Fehler aufgetreten!';
                            }
                        }
                    }
                } else { 
                   echo "Upload erhalten! Prozess ist aber fehlgeschlagen";
                } 
            } else { 
                echo "Hochladen fehlgeschlagen";
            } 
    }
}
?>