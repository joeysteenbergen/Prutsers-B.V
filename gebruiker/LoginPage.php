<html>
<head>
    <link rel="stylesheet" href="Login.css">
</head>
<body>
<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'webshop';
$link = mysqli_connect($host, $user, $pass, $db) or die(mysqli_error($link));

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];

    $wachtwoord = hash('sha256', $wachtwoord);
    $getDbWachtwoord = mysqli_fetch_assoc(mysqli_query($link, "SELECT KlantWachtwoord FROM klanten WHERE KlantEmail = '$email'"));
    $dbWachtwoord = implode('', $getDbWachtwoord);

    if ($wachtwoord == $dbWachtwoord)
    {
        header("Location: ../index.php");
        exit();
    }

    else
    {
        echo "Er is iets mis gegaan bij het inloggen";
    }

}

?>
    <div class="login">
        <div class="login-triangle"></div>

        <h2 class="login-header">Inloggen</h2>

        <form method="post" action="LoginPage.php" class="login-container">
            <p><input type="email" name="email" placeholder="Email"></p>
            <p><input type="password" name="wachtwoord" placeholder="Wachtwoord"></p>
            <p><input type="submit" name="submit" value="Log in"></p>
            <p style="margin:auto;"><a style="color:#28d;" href="#">Nog geen account? registreer nu!</a></p>
        </form>
    </div>
</body>
</html>
