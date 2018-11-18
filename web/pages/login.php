<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/php/bootstrap.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/inc/head.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/inc/header.php";

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

<div class="wrapper">
    <h1>Anmelden</h1>

        <div>
            <form action="?login" method="post">
                <label>Benutzername:</label>
                <input type="text" name="name">
                
                <label>Passwort</label>
                <input type="password" name="passwort"><br>
                <br>
                <input type="submit" value="Anmelden">
            </form>

            <?php
                if(isset($errorMessage)) {
                    echo $errorMessage;
                }
            ?>
        </div>
</div>

<?php
     include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/inc/footer.php";
?>