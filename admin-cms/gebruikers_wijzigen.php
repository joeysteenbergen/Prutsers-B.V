<html>
<head>
    <script type="text/javascript" src="../jquery-1.12.2.js"></script>
    <script type="text/javascript" src="Bootstrap/bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="Bootstrap/bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<?php

include("connect.php");

session_start();

if($_SESSION['GebruikerSet'] == true) {

$Voornaam = implode('', $_SESSION['GebruikerVoornaam']);
$Achternaam = implode('', $_SESSION['GebruikerAchternaam']);

$sql_fetch_gebruikers = "SELECT * FROM gebruikers WHERE GebruikerID = " . $_GET['edit_id'];
$res = mysqli_query($conn, $sql_fetch_gebruikers);


if(isset($_POST['opslaan']))
{
    $Voornaam = $_POST['Voornaam'];
    $Tussenvoegsel = $_POST['Tussenvoegsel'];
    $Achternaam = $_POST['Achternaam'];
    $Straat = $_POST['Straat'];
    $Huisnummer = $_POST['Huisnummer'];
    $Postcode = $_POST['Postcode'];
    $Plaats = $_POST['Plaats'];
    $Land = $_POST['Land'];
    $Telefoonnummer = $_POST['Telefoonnummer'];
    $Geslacht = $_POST['Geslacht'];
    $Emailadres = $_POST['Emailadres'];
    $Wachtwoord = $_POST['Wachtwoord'];
    $Rechten = $_POST['Rechten'];

    $sql_update_gebruikers = "UPDATE gebruikers SET GebruikerVoornaam = '$Voornaam', GebruikerTussenvoegsel = '$Tussenvoegsel', GebruikerAchternaam = '$Achternaam', GebruikerStraat = '$Straat', GebruikerHuisnr = '$Huisnummer', GebruikerPostcode = '$Postcode' , GebruikerWoonplaats = '$Plaats', GebruikerLand = '$Land', GebruikerEmail = '$Emailadres', GebruikerTelefoon = '$Telefoonnummer', GebruikerGeslacht = '$Geslacht', GebruikerWachtwoord = '$Wachtwoord', GebruikerRecht = '$Rechten'
      WHERE GebruikerID = " .$_GET['edit_id'];
    $res = mysqli_query($conn, $sql_update_gebruikers);

    header("Location:gebruikers_overzicht.php");
}

?>
<div class="row">
    <div class="col-xs-12">
        <nav class="navbar navbar-default no-margin">
            <p class="navbar-brand">Admin-CMS</p>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-xs-2 zeroPaddingRight">
        <div id="sidebar-wrapper">
            <ul class="nav nav-pills nav-stacked">
                <li class="disabled"><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-user fa-stack-1x "></i></span><?php echo $Voornaam ." ". $Achternaam ?></a></li>
                <li class="disabled" style="border-bottom:1px solid lightgray;"><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-server fa-stack-1x "></i></span>Producten</a></li>
                <li><a href="product_overzicht.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-server fa-stack-1x "></i></span>Producten overzicht</a></li>
                <li><a href="product_toevoegen.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-server fa-stack-1x "></i></span>Producten toevoegen</a></li>
                <li class="disabled" style="border-bottom:1px solid lightgray;"><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-server fa-stack-1x "></i></span>Gebruikers</a></li>
                <li><a href="gebruikers_overzicht.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-server fa-stack-1x "></i></span>Gebruikers overzicht</a></li>
                <li><a href="index.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-sign-out fa-stack-1x "></i></span>Uitloggen</a></li>
            </ul>
        </div><!-- /#sidebar-wrapper -->
    </div>
    <div class="col-xs-10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Gebruiker wijzigen</h3>
            </div>
            <div class="panel-body">
                <?php
                while($rij = mysqli_fetch_row($res))
                {
                    ?>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="Voornaam">Voornaam</label>
                                <input readonly style="border:none" type="text" class="form-control" id="Voornaam" name="Voornaam" placeholder="Voornaam" required value="<?php echo $rij[1]; ?>"/>

                                <label for="Tussenvoegsel">Tussenvoegsel</label>
                                <input readonly style="border:none" type="text" class="form-control" id="Tussenvoegsel" name="Tussenvoegsel" placeholder="Tussenvoegsel" required value="<?php echo $rij[2]; ?>"/>

                                <label for="Achternaam">Achternaam</label>
                                <input readonly style="border:none" type="text" class="form-control" id="Achternaam" name="Achternaam" placeholder="Achternaam" required value="<?php echo $rij[3]; ?>"/>
                            </div>
                        </div><!-- Username end -->

                        <br/>

                        <div class="form-inline">
                            <div class="form-group">
                                <label for="Straat">Straat</label>
                                <input readonly style="border:none" type="text" class="form-control" id="Straat" name="Straat" placeholder="Straat" required value="<?php echo $rij[4]; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="Huisnummer">Huisnummer</label>
                                <input readonly style="border:none" class="form-control" id="Huisnummer" name="Huisnummer" placeholder="Huisnummer" required value="<?php echo $rij[5]; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="Postcode">Postcode</label>
                                <input readonly style="border:none" class="form-control" id="Postcode" name="Postcode" placeholder="Postcode" required value="<?php echo $rij[6]; ?>"/>
                            </div>
                        </div><!-- Address end -->

                        <br/>

                        <div class="form-inline">
                            <div class="form-group">
                                <label for="Plaats">Plaats</label>
                                <input readonly style="border:none" class="form-control" id="Plaats" name="Plaats" placeholder="Plaats" required value="<?php echo $rij[7]; ?>"/>

                                <label for="Land">Land</label>
                                <input readonly style="border:none" class="form-control" name="Land" id="Land" placeholder="Land" required value="<?php echo $rij[8]; ?>"/>
                            </div> <!-- Country end -->
                        </div>

                        <div class="form-group">
                            <label for="Telefoon">Telefoonnummer</label>
                            <input readonly style="width:auto; border:none" class="form-control" type="text" id="Telefoonnummer" name="Telefoonnummer" placeholder="Telefoonnummer" required value="<?php echo $rij[10]; ?>"/>
                        </div> <!-- Telephone number end -->

                        <div class="form-group">
                            <label for="Geslacht">Geslacht</label>
                            <input readonly style="border:none; width:auto;" class="form-control" type="text" id="Geslacht" name="Geslacht" placeholder="Geslacht" required value="<?php echo $rij[11]; ?>"/>
                        </div> <!-- Gender number end -->

                        <div class="form-inline">
                            <div class="form-group">
                                <label for="Emailadres">Emailadres</label>
                                <input readonly style="border:none; width:auto;" class="form-control" type="text" id="Emailadres" name="Emailadres" placeholder="Emailadres" required value="<?php echo $rij[9]; ?>"/>
                            </div> <!-- Telephone number end -->
                            <div class="form-group">
                                <label for="Wachtwoord">Wachtwoord</label>
                                <input readonly style="border:none; width:auto;" class="form-control" type="text" id="Wachtwoord" name="Wachtwoord" placeholder="Wachtwoord" required value="<?php echo $rij[12]; ?>"/>
                            </div> <!-- Telephone number end -->
                        </div>

                        <div class="form-group">
                            <label for="Rechten">Rechten</label>
                            <select class="form-control" name="Rechten" style="width:auto;">
                                <option>Admin</option>
                                <option>Gebruiker</option>
                            </select>
                        </div> <!-- Telephone number end -->

                        <div class="form-group">
                            <input type="submit" name="opslaan" value="Opslaan" class="btn btn-primary">
                        </div>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
}

else
{
    header("Location: index.php");
}
?>
</body>
</html>
