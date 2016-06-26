<html>
<head>
    <script type="text/javascript" src="../Bootstrap/bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="../jquery-1.12.2.js"></script>
    <link href="../Bootstrap/bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="../Bootstrap/bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
    <link href="Login.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php

include("../DatabaseConnectie.php");

if(isset($_POST['submitLogin'])) {
    $email = $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];

    $wachtwoord = hash('sha256', $wachtwoord);
    $getDbWachtwoord = mysqli_fetch_assoc(mysqli_query($link, "SELECT GebruikerWachtwoord FROM gebruikers WHERE GebruikerEmail = '$email'"));
    $dbWachtwoord = implode('', $getDbWachtwoord);

    if ($wachtwoord == $dbWachtwoord)
    {
        $_SESSION['GebruikerVoornaam'] = mysqli_fetch_assoc(mysqli_query($link, "SELECT GebruikerVoornaam FROM gebruikers WHERE GebruikerEmail = '$email'"));
        $_SESSION['GebruikerAchternaam'] = mysqli_fetch_assoc(mysqli_query($link, "SELECT GebruikerAchternaam FROM gebruikers WHERE GebruikerEmail = '$email'"));
        $_SESSION['GebruikerSet'] = 1;
        header("Location: ../index.php");
        exit();
    }

    else
    {
        echo "Er is iets mis gegaan bij het inloggen";
    }

}

if(isset($_POST['submitRegister']))
{
    $voornaam = $_POST['voornaam'];
    $tussenvoegsel = $_POST['tussenvoegsel'];
    $achternaam = $_POST['achternaam'];
    $straat = $_POST['straat'];
    $nummer = $_POST['nummer'];
    $postcode = $_POST['postcode'];
    $woonplaats = $_POST['woonplaats'];
    $land = $_POST['land'];
    $email = $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $geslacht = $_POST['radioBtn'];
    $rechten = "Gebruiker";

    $wachtwoord = hash('sha256', $wachtwoord);

    $addQuery = "INSERT INTO gebruikers VALUES('','$voornaam','$tussenvoegsel','$achternaam','$straat','$nummer','$postcode','$woonplaats','$land','$email','$telefoonnummer','$geslacht','$wachtwoord', '', '$rechten')";
    $Query = mysqli_query($link, $addQuery);

    $_SESSION['GebruikerVoornaam'] = mysqli_fetch_assoc(mysqli_query($link, "SELECT GebruikerVoornaam FROM gebruikers WHERE GebruikerEmail = '$email'"));
    $_SESSION['GebruikerAchternaam'] = mysqli_fetch_assoc(mysqli_query($link, "SELECT GebruikerAchternaam FROM gebruikers WHERE GebruikerEmail = '$email'"));
    $_SESSION['GebruikerSet'] = true;

    header("Location: ../index.php");
    exit();
}

?>
<div class="row">
    <div class="col-xs-12">
        <div class="col-xs-6">
            <div class="login">
                <h2 class="login-header">Inloggen</h2>

                <form method="post" action="" class="login-container">
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="wachtwoord" placeholder="Wachtwoord">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="submitLogin" value="Log in">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="register">
                <div class="register-header">
                    <h2>Registreren</h2>
                </div>
                <form method="post" action="" class="login-container">
                    <div class="form-group">
                        <input class="form-control" type="text" name="voornaam" placeholder="Voornaam">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="tussenvoegsel" placeholder="Tussenvoegsel">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="achternaam" placeholder="Achternaam">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="straat" placeholder="Straat">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="nummer" placeholder="Huisnummer">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="postcode" placeholder="Postcode">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="woonplaats" placeholder="Woonplaats">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="land" placeholder="Land">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="wachtwoord" placeholder="Wachtwoord">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="tel" name="telefoonnummer" placeholder="Telefoonnummer">
                    </div>
                    <div class="form-group">
                        <label class="radio-inline">
                            <input type="radio" name="radioBtn" value="Man" checked/>Man
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="radioBtn" value="Vrouw"/>Vrouw
                        </label>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submitRegister" value="Registreren" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
