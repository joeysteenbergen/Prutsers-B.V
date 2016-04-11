<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="Bootstrap/bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="productpagina.css" type="text/css" rel="stylesheet">
    <title>Webshop</title>

</head>
<body>
<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'webshop';
$link = mysqli_connect($host, $user, $pass, $db) or die(mysqli_error($link));

session_start();

$alleRecords = "SELECT * FROM categorieen";
$resultAlleRecords = mysqli_query($link, $alleRecords);

if(isset($_GET['categorie']))
{
    $productRecords = "SELECT * FROM producten WHERE CategorieID = '".$_GET['categorie']."'";
    $resultProductRecords = mysqli_query($link, $productRecords);
}

if(isset($_SESSION['zoek']))
{
    $zoek = $_SESSION['zoek'];
    $zoekRecords = "SELECT * FROM producten WHERE ProductNaam LIKE '%{$zoek}%' OR ProductTags LIKE '%{$zoek}%'";
    $resultZoekRecords = mysqli_query($link, $zoekRecords);
}

if(isset($_POST['bestellen']))
{
    if($_SESSION['totaalProducten'] == null)
    {
        $aantalProducten = 0;
        $aantalProducten++;
        $_SESSION['totaalProducten'] = $aantalProducten;
    }

    elseif($_SESSION['totaalProducten'] != null)
    {
        $aantalProducten = $_SESSION['totaalProducten'];
        $aantalProducten++;
        $_SESSION['totaalProducten'] = $aantalProducten;
    }
}

if(isset($_SESSION['totaalProducten']))
{
    if($_SESSION['totaalProducten'] == null)
    {
        $aantalProducten = 0;
    }

    elseif($_SESSION['totaalProducten'] != null)
    {
        $aantalProducten = $_SESSION['totaalProducten'];
    }
}
?>
<div class="modal fade" style="height:100%;" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="height:100%;">
        <div class="modal-content" style="height:100%;">
            <div class="modal-body" style="height:100%;">
                <iframe style="height:100%; width:100%;" frameborder="0" src="gebruiker/LoginPage.php">

                </iframe>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" style="height:100%;" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="height:100%;">
        <div class="modal-content" style="height:100%;">
            <div class="modal-body" style="height:100%;">
                <iframe style="height:100%; width:100%;" frameborder="0" src="gebruiker/RegisterPage.php">

                </iframe>
            </div>
        </div>
    </div>
</div>

<!-- page -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 head">
            <img class="headerImage" src="../Images/LogoWebshop2.png" alt=""/>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="../index.php">Home <span class="sr-only">(current)</span></a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                        <form method="post" action="index.php" class="navbar-form navbar-left" role="search">
                            <div class="form-group" style="width:300px; margin-left:200px;">
                                <input type="text" style="width:100%;"; class="form-control" name="zoekenText" placeholder="Zoeken">
                            </div>
                            <button type="submit" name="zoeken" class="btn btn-primary">Zoeken</button>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                            <li role="presentation"><a href="#" data-href="gebruiker/LoginPage.php" data-toggle="modal" data-target="#login">Inloggen</a></li>
                            <li role="presentation"><a href="#" data-href="gebruiker/RegisterPage.php" data-toggle="modal" data-target="#register">Registreren</a></li>
                            <li role="presentation"><a href="../Winkelwagen/Winkelwagen.php"><span class="glyphicon glyphicon-shopping-cart">&nbsp;Winkelwagen (<?php echo $aantalProducten; ?>)</span></a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-2 stretch">
            <nav class="navbar navbar-default" style="border-radius:5px;">
                <ul class="nav nav-pills nav-stacked">
                    <li style="border:1px solid #6CCAEA; background-color:#6CCAEA; color:white; font-weight:bold; text-align:center;">Categorieën</li>
                    <?php
                    if (mysqli_num_rows($resultAlleRecords) > 0)
                    {
                        while ($rij = mysqli_fetch_row($resultAlleRecords))
                        {
                            ?>
                            <li><a href="javascript:SearchID(<?php echo $rij[0]; ?>)"><?php echo $rij[1] ?></a></li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </nav>
        </div>
        <div class="col-xs-10 stretch">
            <div class="row">
                <div class="col-xs-12">
                    <div class="ProductBlock">
                        <?php
                        if(isset($_GET['categorie']))
                        {
                            if (mysqli_num_rows($resultProductRecords) != null) {
                                while ($rij = mysqli_fetch_row($resultProductRecords)) {
                                    ?>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="col-xs-1">
                                            </div>
                                            <div class="col-xs-10">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading"
                                                         style="background-color: #6CCAEA; !important; background-image: none !important;">

                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-xs-12">
                                                                <div class="col-xs-3">
                                                                    <p class="image">
                                                                        <img src="ProductImages/badeendgeeldr1.jpg" style="border:1px solid black; height:150px; width:150px;"/>
                                                                    </p>
                                                                </div>
                                                                <div class="col-xs-9">
                                                                    <div class="col-xs-12">
                                                                        <form action="" method="post">
                                                                            <div class="col-xs-6">
                                                                                <label>ID: <input style="border:none;" readonly required value="<?php echo $rij[0] ?>"/></label>
                                                                                <label>Naam: <input style="border:none;" readonly required value="<?php echo $rij[1] ?>"/></label>
                                                                                <label>Kleur: <input
                                                                                        style="border:none;" readonly required value="<?php echo $rij[9] ?>"/></label>
                                                                            </div>
                                                                            <div class="col-xs-6">
                                                                                <label>Prijs: €<input style="border:none; width:auto;" readonly required value="<?php echo $rij[2] ?>,-"/></label>
                                                                                <br/>
                                                                                <br/>
                                                                                <br/>
                                                                                <button name="bestellen" class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-shopping-cart"></i> In winkelwagen</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-1">

                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }

                            else
                            {
                                echo "Geen producten gevonden";
                            }
                        }

                        elseif(isset($zoek))
                        {
                            if (mysqli_num_rows($resultZoekRecords) > 0) {
                                while ($rij = mysqli_fetch_row($resultZoekRecords)) {

                                    ?>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="col-xs-1">
                                            </div>
                                            <div class="col-xs-10">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading"
                                                         style="background-color: #6CCAEA; !important; background-image: none !important;">
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-xs-12">
                                                                <div class="col-xs-3">
                                                                    <img src="ProductImages/badeendgeeldr1.jpg"
                                                                         style="border:1px solid black; height:150px; width:150px;"/>
                                                                </div>
                                                                <div class="col-xs-9">
                                                                    <div class="col-xs-12">
                                                                        <form action="" method="post">
                                                                            <div class="col-xs-6">
                                                                                <label>Product ID: <input style="border:none;" readonly required value="<?php echo $rij[0] ?>"/></label>
                                                                                <label>Naam: <input style="border:none;" readonly required value="<?php echo $rij[1] ?>"/></label>
                                                                                <label>Kleur: <input
                                                                                        style="border:none;" readonly required value="<?php echo $rij[9] ?>"/></label>
                                                                            </div>
                                                                            <div class="col-xs-6">
                                                                                <label>Prijs: €<input style="border:none; width:auto;" readonly required value="<?php echo $rij[2] ?>,-"/></label>
                                                                                <br/>
                                                                                <br/>
                                                                                <br/>
                                                                                <button name="bestellen" class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-shopping-cart"></i> In winkelwagen</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-1">

                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }

                            else
                            {
                                echo "Geen producten gevonden";
                            }
                        }

                        else
                        {
                            echo "<p>Geen produtcen gevonden</p>";
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>