<?php 
	$json = file_get_contents(__DIR__ . "/../../rev-manifest.json");
    $assets = json_decode($json, true);
?>

<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . '/web/assets/php/bootstrap.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . "/web/assets/inc/head.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/web/assets/inc/header.php";
?>


<?php 

    // Hole mir alle Hersteller
    $statement = $pdo->prepare("SELECT * FROM manufacturer ORDER BY name ASC");
    $statement->execute();
    $tobaccoManufacturer = $statement->fetchALL();

?>

<?php 

    // Hole mir alle Tabaksorten
    $statement = $pdo->prepare("SELECT * FROM tobacco ORDER BY name ASC");
    $statement->execute();
    $tobaccoSort = $statement->fetchALL();

?>

<?php 

    // Hole mir alle Tabaksorten
    $statement = $pdo->prepare("SELECT * FROM flavor ORDER BY name ASC");
    $statement->execute();
    $tobaccoFlavor = $statement->fetchALL();

?>

<?php

    if(!isset($_SESSION['userid'])){
        header("Location: index.php");
    }

    error_reporting(0);

    if(isset($_GET['rating'])) {
    $error = false;

    $addManufacturer = $_POST['addManufacturer'];
    $addTobacco = $_POST['addTobacco'];
    $addFlavor = $_POST['addFlavor'];
    $addRating = $_POST['addRating'];
    $addNote= $_POST['addNote'];
    
    $chooseManufacturer = $_POST['chooseManufacturer'];
    $chooseFlavor = $_POST['chooseFlavor'];
    $chooseTobacco = $_POST['chooseTobacco'];
    $chooseTobaccoRating = $_POST['chooseTobaccoRating'];
    
    //$flavor = $_POST['flavor'];
    //$rating = $_POST['bewertung'];

    if(!$error) {
       // include_once('inc/addManufacturer.php');
       include_once('inc/addTobacco.php');
       // include_once('inc/addFlavor.php');
       // include_once('inc/addTobacco_to_flavor.php');
       // include_once('inc/addRating.php');
    }
}
?>

<div class="parallax-hero addTabak" id="parallax-hero"></div>

<main id="addTabak">
    <div class="wrapper" id="form">
        <h1>Neuen Tabak hinzufügen</h1>

        <form class="addTabak" action="?rating" method="post" enctype="multipart/form-data">
        
            <div class="grid row-6">
                <section>
                    <h2>Hersteller hinzufügen</h2>
                    <input type="text" name="addManufacturer" placeholder="Hersteller"/>
                    
                    <div class="submit-container">
                        <input type="submit" value="Hersteller hinzufügen" />
                    </div>
                </section>

                <section>
                    <h2>Geschmack hinzufügen</h2>
                    <input type="text" name="addFlavor" placeholder="Geschmack"/>

                    <div class="submit-container">
                        <input type="submit" value="Geschmack hinzufügen" />
                    </div>
                </section>
            </div>

            <hr>

           <div class="grid row-6">
               <section>
                    <h2>Hersteller auswählen</h2>
                        <select name="chooseManufacturer">
                            <option disabled selected value=""> -- Wähle einen Hersteller aus -- </option>
                            <?php foreach ($tobaccoManufacturer as $manufacturer): ?>
                                <option value="<?= $manufacturer['id']; ?>"><?= $manufacturer['name']; ?></option>
                            <?php endforeach ?>
                        </select>
                    
                    <h2>Tabaksorten</h2>
                    <input type="text" name="addTobacco" />

                    <h2>Bild hinzufügen</h2>
                    <input type="file" name="image" />
                    
                    <div class="submit-container">
                        <input type="submit" value="Tabaksorte hinzufügen" />
                    </div>
               </section>

               <section>
                    <h2>Tabaksorte auswählen</h2>
                        <select name="chooseTobacco"> 
                            <option disabled selected value=""> -- Wähle eine Tabaksorte aus -- </option>
                            <?php foreach ($tobaccoSort as $sort): ?>
                                <option value="<?= $sort['id']; ?>"><?= $sort['name']; ?></option>
                            <?php endforeach ?>
                        </select>

                    <h2>Geschmack auswählen</h2>
                        <select name="chooseFlavor">
                            <option disabled selected value=""> -- Wähle einen Geschmack aus -- </option>
                            <?php foreach ($tobaccoFlavor as $flavor): ?>
                                <option value="<?= $flavor['id']; ?>"><?= $flavor['name']; ?></option>
                            <?php endforeach ?>
                        </select>

                    <div class="submit-container">   
                        <input type="submit" value="Geschmach der Tabaksorte hinzufügen" />
                    </div>
               </section>
           </div>

            <hr>

            <div class="grid row-6">
               <section>
                    <h2>Tabaksorte auswählen</h2>
                        <select name="chooseTobaccoRating"> 
                            <option disabled selected value=""> -- Wähle eine Tabaksorte aus -- </option>
                            <?php foreach ($tobaccoSort as $sort): ?>
                                <option value="<?= $sort['id']; ?>"><?= $sort['name']; ?></option>
                            <?php endforeach ?>
                        </select>
                    
                    <h2>Bewertung abgeben</h2>
                    <input type="text" name="addRating" />
    
                    <h2>Notiz hinzufügen</h2>
                    <textarea name="addNote" cols="30" rows="10"></textarea>
                    
                    <div class="submit-container">   
                        <input type="submit" value="Bewertung abgeben" />
                    </div>                         
               </section>
            </div>

        </form>
    </div>

</main

<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . "/web/assets/inc/footer.php";
?>

