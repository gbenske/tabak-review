<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/php/bootstrap.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/inc/head.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/inc/header.php";
?>


<?php 

    // Hole mir alle Hersteller
    $statement = $pdo->prepare("SELECT * FROM manufacturer");
    $statement->execute();
    $tobaccoManufacturer = $statement->fetchALL();

?>

<?php 

    // Hole mir alle Tabaksorten
    $statement = $pdo->prepare("SELECT * FROM tobacco");
    $statement->execute();
    $tobaccoSort = $statement->fetchALL();

?>

<?php 

    // Hole mir alle Tabaksorten
    $statement = $pdo->prepare("SELECT * FROM flavor");
    $statement->execute();
    $flavorTobacco = $statement->fetchALL();

?>

<?php
 
    if(isset($_GET['rating'])) {
    $error = false;
    $addManufacturer = $_POST['addManufacturer'];
    //$manufacturer = $_POST['manufacturer'];
    //$tobacco = $_POST['tobacco'];
    //$flavor = $_POST['flavor'];
    //$rating = $_POST['bewertung'];

    // $folder = "../img/";
    // $image = $_FILES['image']['name'];
    // $path = $folder . $image; 
    // $target_file=$folder.basename($_FILES["image"]["name"]);
    // $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
    // $allowed=array('jpeg','png' ,'jpg'); 
    // $filename=$_FILES['image']['name']; 

    if(!$error) {
        include_once('inc/addManufacturer.php');
    }
}
?>

<div class="wrapper" id="form">
     <h1>Neuen Tabak hinzufügen</h1>

     <form action="?rating" method="post" enctype="multipart/form-data">

        <div>
            <h2>Hersteller hinzufügen</h2>
            <input type="text" name="addManufacturer" />
            <input type="submit" value="Hersteller hinzufügen" />
       </div>

       <?php /*

       <hr>
       
        <h2>Hersteller auswählen</h2>
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

        <hr>

        <h2>Geschmack hinzufügen</h2>
        <input type="text" name="flavor" />
        <input type="submit" value="Geschmack hinzufügen" />

        <hr>

        <h2>Tabaksorte auswählen</h2>
         <select name="tobacco">
            <option disabled selected value=""> -- Wähle einen Tabaksorte aus -- </option>
            <?php foreach ($tobaccoSort as $tobacco): ?>
                 <option value="<?= $tobacco['id']; ?>"><?= $tobacco['name']; ?></option>
            <?php endforeach ?>
        </select>
        <br/><br/>

        <h2>Geschmack der Tabaksorte hinzufügen</h2>
         <select name="flavor">
            <option disabled selected value=""> -- Wähle einen Tabaksorte aus -- </option>
            <?php foreach ($flavorTobacco as $flavor): ?>
                 <option value="<?= $flavor['id']; ?>"><?= $flavor['name']; ?></option>
            <?php endforeach ?>
        </select>
        <input type="submit" value="Geschmack der Tabaksorte hinzufügen" />

        

        <label>Bewertung</label>
        <input type="text" name="bewertung" />

         <input type="file" name="image" />

         <input type="submit" name="addTobacco" value="Bewerten" />

        */

        ?>

        
    </form>
</div>

<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/inc/footer.php";
?>

