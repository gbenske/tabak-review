<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/tabak-review/assets/php/bootstrap.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . "/tabak-review/assets/inc/head.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/tabak-review/assets/inc/header.php";

if(isset($_GET['login'])) {
    $loginname = $_POST['loginname'];
    $passwort = $_POST['passwort'];

    $statement = $pdo->prepare("SELECT * FROM user WHERE loginname = :loginname");
    $result = $statement->execute(array('loginname' => $loginname));
    $user = $statement->fetch();



    //Überprüfung des Passworts
    if ($user !== false && password_verify($passwort, $user['passwort'])) {
        $_SESSION['userid'] = $user['ID_User'];
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
                <input type="text" name="loginname">
                
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
     include_once $_SERVER['DOCUMENT_ROOT'] . "/tabak-review/assets/inc/footer.php";
?>