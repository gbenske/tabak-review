<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . '/tabak-review/assets/php/bootstrap.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . "/tabak-review/assets/inc/head.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/tabak-review/assets/inc/header.php";
?>

<?php 

    $statement = $pdo->prepare("SELECT * FROM hersteller");
    $statement->execute();
    $tabakproducer = $statement->fetchALL();

?>

<?php
 
    if(isset($_GET['rating'])) {
    $error = false;
    $producer = $_POST['hersteller'];
    $addProducer = $_POST['addHersteller'];
    $sort = $_POST['sorte'];
    // $taste = $_POST['geschmack'];
    // $rating = $_POST['bewertung'];

    // $folder = "../img/";
    // $image = $_FILES['image']['name'];
    // $path = $folder . $image; 
    // $target_file=$folder.basename($_FILES["image"]["name"]);
    // $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
    // $allowed=array('jpeg','png' ,'jpg'); 
    // $filename=$_FILES['image']['name']; 

    //Überprüfe, ob Tabaksorte schon vorhanden ist
    if(!$error) { 
            $statement = $pdo->prepare("SELECT * FROM sorte WHERE Name = :Name");
            $result = $statement->execute(array('Name' => $sort));
            $tabaksort = $statement->fetch();
     
        if($tabaksort !== false) {
                echo 'Diese Sorte ist bereits gespeichert!';
            $error = true;
         } else {

            if(isset($_POST['hersteller'])) {
                $statement = $pdo->prepare("INSERT INTO sorte (ID_Hersteller, Name) VALUES (:ID_Hersteller, :Name)");
                $result = $statement->execute(array('ID_Hersteller' => $producer, 'Name' => $sort));

                if($result) { 
                    echo 'Sorte wurde hinzufügt.';
                } else {
                    echo 'Beim Abspeichern ist leider ein Fehler aufgetreten';
                }
            }

            if($producer == '') {
                if (!empty($_POST['addHersteller'])) {
                    
                    //Überprüfe, ob Tabakhersteller schon vorhanden ist
                      if(!$error) { 
                            $statement = $pdo->prepare("SELECT * FROM hersteller WHERE Name = :Name");
                            $result = $statement->execute(array('Name' => $addProducer));
                            $tabakproducer = $statement->fetch();
                         
                            if($tabakproducer !== false) {
                                    echo 'Dieser Hersteller ist bereits gespeichert!';
                                $error = true;
                             }  else {
                                $statement = $pdo->prepare("INSERT INTO hersteller (Name) VALUES (:Name)");
                                $result = $statement->execute(array('Name' => $addProducer));

                               if (isset($_POST['addProducer'])) {
                                    if($result) { 
                                        echo 'Hersteller wurde hinzufügt.';
                                    } else {
                                        echo 'Beim Abspeichern ist leider ein Fehler aufgetreten';
                                    }
                               }
                             }
                         }
                    } else {
                        echo "Bitte Hersteller anlegen.";
                    }
                }
            }
        }

    /*
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
    }  */
}
?>

<div class="wrapper" id="form">
     <h1>Neuen Tabak hinzufügen</h1>

     <form action="?rating" method="post" enctype="multipart/form-data">

        <a href="javascript:void(0)" id="add_input_producer">Neuen Hersteller hinzufügen</a>
        <br/>
        <br/>

        <div id="producer">
            <label>Hersteller hinzufügen</label>
            <input type="text" name="addHersteller" />
            <input type="submit" name="addProducer" value="Hersteller hinzufügen" />
       </div>

       
        <label>Hersteller</label>
         <select name="hersteller">
            <option disabled selected value=""> -- Wähle einen Tabakhersteller aus -- </option>
            <?php foreach ($tabakproducer as $tabak): ?>
                 <option value="<?= $tabak['ID_Hersteller']; ?>"><?= $tabak['Name']; ?></option>
            <?php endforeach ?>
        </select>
        <br/><br/>



       <label>Sorte</label>
        <input type="text" name="sorte" />

        <?php /*

       <div id="sort">
            <label>Sorte</label>
            <input type="text" name="sorte" />
       </div>

       
        <label>Geschmack</label>
        <input type="text" name="geschmack" />

        <label>Bewertung</label>
        <input type="text" name="bewertung" />

         <input type="file" name="image" />

        */

        ?>

        <input type="submit" name="addSort" value="Bewerten" />
    </form>
</div>

<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . "/tabak-review/assets/inc/footer.php";
?>

