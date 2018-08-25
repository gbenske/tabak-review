<div class="wrapper">
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
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<div>
    <h2>Anmelden</h2>

</div>

<div>
    <h3>Anmelden</h3>
        <div>
            <form action="?login" method="post">
                Benutzername:<br>
                <br>
                <input type="text" name="loginname">
                Dein Passwort:<br>
                <br>
                <input type="password" size="40"  maxlength="250" name="passwort"><br>
                <br>
                <input class="button_2" type="submit" value="Anmelden">
            </form>
                <?php
                    if(isset($errorMessage)) {
                        echo $errorMessage;
                    }
                ?>
        </div>
</div>


<div class="footer_login">
    <?php
         include_once $_SERVER['DOCUMENT_ROOT'] . "/tabak-review/assets/inc/footer.php";
    ?>
</div>
</body>
</html>
</div>