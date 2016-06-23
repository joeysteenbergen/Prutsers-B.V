<html>
<head>
    <script src="Bootstrap/bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
    <link href="Bootstrap/bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="Bootstrap/bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'webshop';
$link = mysqli_connect($host, $user, $pass, $db) or die(mysqli_error($link));

if(isset($_POST['inloggen']))
{
    $emailadres = $_POST['emailadres'];
    $wachtwoord = $_POST['wachtwoord'];

    $getWachtwoord = mysqli_fetch_assoc(mysqli_query($link, "SELECT GebruikerWachtwoord FROM gebruikers WHERE GebruikerEmail = '$emailadres' AND GebruikerRecht = 'Admin'"));
    $DbWachtwoord = implode('', $getWachtwoord);
    $wachtwoord = hash("sha256", $wachtwoord);


    if ($DbWachtwoord == $wachtwoord)
    {
        session_start();
        session_regenerate_id(true);
        $_SESSION['GebruikerVoornaam'] = mysqli_fetch_assoc(mysqli_query($link, "SELECT GebruikerVoornaam FROM gebruikers WHERE GebruikerEmail = '$emailadres'"));
        $_SESSION['GebruikerAchternaam'] = mysqli_fetch_assoc(mysqli_query($link, "SELECT GebruikerAchternaam FROM gebruikers WHERE GebruikerEmail = '$emailadres'"));
        $_SESSION['GebruikerSet'] = true;
        header("Location: product_overzicht.php");
        exit();
    }

    else
    {
        echo "Inloggen mislukt";
    }
}

?>

<div class="col-xs-12">
    <div class="row">
        <div class="col-xs-3">

        </div>
        <div class="col-xs-6">
            <div class="logIn">
                <h2>Inloggen</h2>
                <form method="post" action="#">
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" name="emailadres" class="form-control" placeholder="E-mail"/>
                    </div>
                    <div class="form-group">
                        <label>Wachtwoord</label>
                        <input type="password" name="wachtwoord" class="form-control" placeholder="Wachtwoord"/>
                    </div>
                    <input class="btn btn-primary" type="submit" name="inloggen" value="Inloggen" />
                </form>
            </div>
        </div>
        <div class="col-xs-3">

        </div>
    </div>
</div>
</body>
</html>
