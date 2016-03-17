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

<div class="row">
    <div class="col-xs-12">
        <div class="col-xs-4">
            </div>
        <div class="col-xs-4">
            <div class="login">
                <div class="login-triangle">
                </div>
                <div class="login-header">
                    <h2>Registreren</h2>
                </div>
                <form method="post" action="RegisterPage.php" class="login-container">
                    <div class="form-group">
                        <input class="form-control" type="text" name="voornaam" placeholder="Voornaam"><br/>
                        <input class="form-control" type="text" name="achternaam" placeholder="Achternaam"><br/>
                        <input class="form-control" type="text" name="straat" placeholder="Straat"><br/>
                        <input class="form-control" type="text" name="nummer" placeholder="Nr"><br/>
                        <input class="form-control" type="text" name="postcode" placeholder="Postcode"><br/>
                        <input class="form-control" type="text" name="woonplaats" placeholder="Woonplaats"><br/>
                        <input class="form-control" type="text" name="land" placeholder="Land"><br/>
                        <input class="form-control" type="email" name="email" placeholder="Email"><br/>
                        <input class="form-control" type="password" name="wachtwoord" placeholder="Wachtwoord"><br/>
                        <input class="form-control" type="tel" name="telefoonnummer" placeholder="Telefoonnummer"><br/>
                        <div class="radio">
                            <label><input type="radio" name="radioBtn" value="Man" checked/>Man</label>
                            <label><input type="radio" name="radioBtn" value="Vrouw"/>Vrouw</label></br>
                        </div>
                        <input type="submit" name="submit" value="Registreren" class="btn btn-primary" >
                    </div>
                    <p style="margin:auto;"><a style="color:#28d;" href="#">Heb je al een account? Log hier in!</a></p>
                </form>
            </div>
        </div>
        <div class="colo-xs-4">
            </div>
    </div>
</div>
</body>
</html>

