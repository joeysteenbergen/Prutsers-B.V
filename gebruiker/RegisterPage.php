<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
          integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Register.css">
</head>
<body>
<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'webshop';
$link = mysqli_connect($host, $user, $pass, $db) or die(mysqli_error($link));

$allRecords = "SELECT * FROM klanten";

if(isset($_POST['submit']))
    {
        $voornaam = $_POST['voornaam'];
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

        $wachtwoord = hash('sha256', $wachtwoord);

        $addQuery = "INSERT INTO klanten VALUES('','$voornaam','$achternaam','$straat','$nummer','$postcode','$woonplaats','$land','$email','$telefoonnummer','$geslacht','$wachtwoord')";
        $Query = mysqli_query($link, $addQuery);

        header("Location: ../index.php");
        exit();
    }

$Query = mysqli_query($link, $allRecords);


?>

<div class="login">
    <div class="login-triangle">
    </div>
    <div class="login-header">
        <h2>Registreren</h2>
    </div>
    <form method="post" action="RegisterPage.php" class="login-container">
        <p><input class="form-control" type="text" name="voornaam" placeholder="Voornaam"></p>
        <p><input class="form-control" type="text" name="achternaam" placeholder="Achternaam"></p>
        <p><input class="form-control" type="text" name="straat" placeholder="Straat"></p>
        <p><input class="form-control" type="text" name="nummer" placeholder="Nr"></p>
        <p><input class="form-control" type="text" name="postcode" placeholder="Postcode"></p>
        <p><input class="form-control" type="text" name="woonplaats" placeholder="Woonplaats"></p>
        <p><input class="form-control" type="text" name="land" placeholder="Land"></p>
        <p><input class="form-control" type="email" name="email" placeholder="Email"></p>
        <p><input class="form-control" type="password" name="wachtwoord" placeholder="Wachtwoord"></p>
        <p><input class="form-control" type="tel" name="telefoonnummer" placeholder="Telefoonnummer"></p>
        <label class="radio-inline">
            <input type="radio" name="radioBtn" value="Man" checked/>Man
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioBtn" value="Vrouw"/>Vrouw
        </label><br/>
        <input type="submit" name="submit" value="Registreren" class="btn btn-primary" >
        <p style="margin:auto;"><a style="color:#28d;" href="LoginPage.php">Heb je al een account? Log hier in!</a></p>
    </form>
</div>
</body>
</html>

