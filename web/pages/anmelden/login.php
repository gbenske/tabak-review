<?php 
	$json = file_get_contents(__DIR__ . "/../../rev-manifest.json");
    $assets = json_decode($json, true);
?>

<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/web/assets/php/bootstrap.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . "/web/assets/inc/head.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/web/assets/inc/header.php";

if(isset($_GET['login'])) {
    $loginname = $_POST['name'];
    $passwort = $_POST['passwort'];

    $statement = $pdo->prepare("SELECT * FROM user WHERE name = :name");
    $result = $statement->execute(array('name' => $loginname));
    $user = $statement->fetch();



    //Überprüfung des Passworts
    if ($user !== false && password_verify($passwort, $user['passwort'])) {
        $_SESSION['userid'] = $user['id'];
        header("Location: index.php");
    } else {
        $errorMessage = "Benutzername oder Passwort war ungültig";
    }

}
?>

<main id="login"> 
    <div class="wrapper">
        <h1>Anmelden</h1>
        <div class="login-mask">
            <form action="?login" method="post">
                <input type="text" name="name" placeholder="Benutzername">
                <input type="password" name="passwort" placeholder="Passwort">
                <br>

                <div class="submit-container">
                    <input type="submit" value="Anmelden">
                </div>
                
            </form>

            <?php
                if(isset($errorMessage)) {
                    echo $errorMessage;
                }
            ?>
        </div>
    </div>
</main>

<?php
     include_once $_SERVER['DOCUMENT_ROOT'] . "/web/assets/inc/footer.php";
?>