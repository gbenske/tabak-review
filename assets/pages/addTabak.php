<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . '/tabak-review/assets/php/bootstrap.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . "/tabak-review/assets/inc/head.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/tabak-review/assets/inc/header.php";
?>

<?php
 
    if(isset($_GET['rating'])) {
     $error = false;
     $producer = $_POST['hersteller'];
     $sort = $_POST['sorte'];
     $taste = $_POST['geschmack'];
     $rating = $_POST['bewertung'];

     $folder = "../img/";
     $image = $_FILES['image']['name'];
     $path = $folder . $image; 
     $target_file=$folder.basename($_FILES["image"]["name"]);
     $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
     $allowed=array('jpeg','png' ,'jpg'); 
     $filename=$_FILES['image']['name']; 
 
    //Überprüfe, ob Tabakhersteller schon vorhanden ist
    if(!$error) { 
            $statement = $pdo->prepare("SELECT * FROM tabak WHERE hersteller = :hersteller");
            $result = $statement->execute(array('hersteller' => $producer));
            $user = $statement->fetch();
     
        if($user !== false) {
                echo 'Dieser Hersteller ist bereits gespeichert!';
            $error = true;
         } 
     }

    //Überprüfe, ob Tabaksorte schon vorhanden ist
    if(!$error) { 
            $statement = $pdo->prepare("SELECT * FROM tabak WHERE sorte = :sorte");
            $result = $statement->execute(array('sorte' => $sort));
            $user = $statement->fetch();
     
        if($user !== false) {
                echo 'Diese Sorte ist bereits gespeichert!';
            $error = true;
         } 
     }
 
    //Keine Fehler, Bild und Tabak kann eingefügt werden
    if(!$error) { 

        $ext=pathinfo($filename, PATHINFO_EXTENSION);

        if(!in_array($ext,$allowed)) { 

            echo "Sorry, nur JPG, JPEG, PNG Datein sind erlaubt.";

        } else { 
            move_uploaded_file($_FILES['image'] ['tmp_name'], $path);
            $statementImage=$pdo->prepare("INSERT INTO images (images) VALUES (:image)"); 
            $statementImage->bindParam(':image',$image); 
            $statementImage->execute(); 

            echo "Bild wurde hochgeladen";
        }

        $statement = $pdo->prepare("INSERT INTO tabak (hersteller, sorte, geschmack, bewertung) VALUES (:hersteller, :sorte, :geschmack, :bewertung)");
        $result = $statement->execute(array('hersteller' => $producer, 'sorte' => $sort, 'geschmack' => $taste, 'bewertung' => $rating));
 
        if($result) { 
           echo 'Tabak wurde hinzufügt.';
        } else {
            echo 'Beim Abspeichern ist leider ein Fehler aufgetreten';
        }
    } 
}

?>

<div class="wrapper">
     <h1>Neuen Tabak hinzufügen</h1>

     <form action="?rating" method="post" enctype="multipart/form-data">

        <input type="file" name="image" />

        <label>Hersteller</label>
        <input type="text" name="hersteller" />

        <label>Sorte</label>
        <input type="text" name="sorte" />

        <label>Geschmack</label>
        <input type="text" name="geschmack" />

        <label>Bewertung</label>
        <input type="text" name="bewertung" />

        <input type="submit" value="Bewerten" />
    </form>
</div>
