<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/php/bootstrap.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/inc/head.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/inc/header.php";
?>

<?php 

    $statement = $pdo->prepare("SELECT * FROM manufacturer");
    $statement->execute();
    $tabakManufacturer = $statement->fetchALL();

?>

<?php
 
    if(isset($_GET['rating'])) {
    $error = false;
    $manufacturer = $_POST['manufacturer'];
    $addManufacturer = $_POST['addManufacturer'];
    $tobacco = $_POST['tobacco'];
    $taste = $_POST['geschmack'];
    $rating = $_POST['bewertung'];

    // $folder = "../img/";
    // $image = $_FILES['image']['name'];
    // $path = $folder . $image; 
    // $target_file=$folder.basename($_FILES["image"]["name"]);
    // $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
    // $allowed=array('jpeg','png' ,'jpg'); 
    // $filename=$_FILES['image']['name']; 

    //Überprüfe, ob Tabaksorte schon vorhanden ist
    if(!$error) { 
             $statement = $pdo->prepare("SELECT * FROM tobacco WHERE name = :name");
             $result = $statement->execute(array('name' => $tobacco));
             $tabaktobacco = $statement->fetch();
        
         if($tabaktobacco !== false) {
                 echo 'Dieser Tabaksorte ist bereits gespeichert!';
             $error = true;
          } else {

             if(isset($_POST['manufacturer'])) {
                 $statement = $pdo->prepare("INSERT INTO tobacco (name, id_manufacturer) VALUES (:name, :id_manufacturer)");
                 $result = $statement->execute(array('name' => $tobacco, 'id_manufacturer' => $manufacturer));

                 if($result) { 
                     echo 'Tabaksorte wurde hinzufügt.';
                 } else {
                     echo 'Beim Abspeichern ist leider ein Fehler aufgetreten';
                 }
             }

            if($manufacturer == '') {
                if (!empty($_POST['addManufacturer'])) {
                    
                    //Überprüfe, ob Tabaksorte schon vorhanden ist
                      if(!$error) { 
                            $statement = $pdo->prepare("SELECT * FROM manufacturer WHERE name = :name");
                            $result = $statement->execute(array('name' => $addManufacturer));
                            $tabakManufacturer = $statement->fetch();
                         
                            if($tabakManufacturer !== false) {
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

        $statement = $pdo->prepare("INSERT INTO tabak (manufacturer, tobacco, geschmack, bewertung) VALUES (:manufacturer, :tobacco, :geschmack, :bewertung)");
        $result = $statement->execute(array('manufacturer' => $manufacturer, 'tobacco' => $tobacco, 'geschmack' => $taste, 'bewertung' => $rating));
 
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

        <a href="javascript:void(0)" id="add_input_manufacturer">Neuen Hersteller hinzufügen</a>
        <br/>
        <br/>

        <div id="manufacturer">
            <h2>Hersteller hinzufügen</h2>
            <input type="text" name="addManufacturer" />
            <input type="submit" value="Hersteller hinzufügen" />
       </div>

       <hr>
       
        <h2>Hersteller</h2>
         <select name="manufacturer">
            <option disabled selected value=""> -- Wähle einen Hersteller aus -- </option>
            <?php foreach ($tabakManufacturer as $manufacturer): ?>
                 <option value="<?= $manufacturer['id']; ?>"><?= $manufacturer['name']; ?></option>
            <?php endforeach ?>
        </select>
        <br/><br/>

        



       <h2>Tabaksorten</h2>
        <input type="text" name="tobacco" />
        <input type="submit" value="Tabaksorte hinzufügen" />

        <?php /*

       <div id="tobacco">
            <label>tobacco</label>
            <input type="text" name="tobacco" />
       </div>

       
        <label>Geschmack</label>
        <input type="text" name="geschmack" />

        <label>Bewertung</label>
        <input type="text" name="bewertung" />

         <input type="file" name="image" />

        */

        ?>

        <input type="submit" name="addTobacco" value="Bewerten" />
    </form>
</div>

<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/inc/footer.php";
?>

