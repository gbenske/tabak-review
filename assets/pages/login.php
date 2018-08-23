<div class="container">
<?php
require 'php/bootstrap.php';
include 'inc/head.php';
include 'inc/header.php';

if(isset($_GET['login'])) {
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];

    $statement = $pdo->prepare("SELECT * FROM kunden WHERE email = :email");
    $result = $statement->execute(array('email' => $email));
    $user = $statement->fetch();



    //Überprüfung des Passworts
    if ($user !== false && password_verify($passwort, $user['passwort'])) {
        $_SESSION['userid'] = $user['ID_Kunde'];
        header("Location: index.php");
    } else {
        $errorMessage = "E-Mail oder Passwort war ungültig";
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

<div>,
    <h3>Anmelden</h3>
        <div>
            <form action="?login" method="post">
                Benutzername:<br>
                <br>
                <input type="text" name="login">

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
        include 'inc/footer.php';
    ?>
</div>
</body>
</html>
</div>