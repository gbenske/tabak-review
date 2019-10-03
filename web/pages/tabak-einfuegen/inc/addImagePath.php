<?php
    if(is_uploaded_file($_FILES['image']['tmp_name'])){ 
        $folder = "../assets/img/content/"; 
        $file = basename( $_FILES['image']['name']); 
        $full_path = $folder.$file; 

        if(move_uploaded_file($_FILES['image']['tmp_name'], $full_path)) { 
            echo "Erfolgreich hochgeladen.";
            $img_url= $full_path;

            if(isset($_POST['chooseTobaccoRating'])) {
                $statement = $pdo->prepare("INSERT INTO tobacco (name, id_manufacturer, 'image') VALUES ('', '', :image)");
                $result = $statement->execute(array('name' => '', 'id_manufacturer' => '',':image '=> $full_path));
            }

            if($result ){
                echo "<script language='javascript' type='text/javascript'>alert('Erfolgreich gespeichert!')</script>";
                echo "<script language='javascript' type='text/javascript'>window.open('index.php','_self')</script>";
            } else {
                echo 'db Transaktion fehlgeschlagen';
            }
        } else { 
           echo "Upload erhalten! Prozess ist aber fehlgeschlagen";
        } 
    } else { 
        echo "Hochladen fehlgeschlagen";
    } 
?>