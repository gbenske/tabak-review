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
 
 //Überprüfe, ob Tabak schon vorhanden ist
    if(!$error) { 
        $statement = $pdo->prepare("SELECT * FROM tabak WHERE hersteller = :hersteller");
        $result = $statement->execute(array('hersteller' => $producer));
        $user = $statement->fetch();
 
    if($user !== false) {
            echo 'Dieser Hersteller ist bereits gespeichert!';
        $error = true;
     } 
 }
 
 //Keine Fehler, Nutzer kann registriert werden
    if(!$error) { 

        $statement = $pdo->prepare("INSERT INTO tabak (hersteller, sorte, geschmack, bewertung) VALUES (:hersteller, :sorte, :geschmack, :bewertung)");
        $result = $statement->execute(array('hersteller' => $producer, 'sorte' => $sort, 'geschmack' => $taste, 'bewertung' => $rating));
 
    if($result) { 
        header("Location: index.php");
    } else {
        echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
    }
 } 

}

?>

<div class="wrapper">
     <h1>Neuen Tabak hinzufügen</h1>

     <form action="?rating" method="post">
        <label>Hersteller</label>
        <input type="test" name="hersteller">

        <label>Sorte</label>
        <input type="test" name="sorte">

        <label>Geschmack</label>
        <input type="test" name="geschmack">

        <label>Bewertung</label>
        <input type="test" name="bewertung">

        <input type="submit" value="Bewerten">
    </form>
</div>
