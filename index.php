<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="Bootstrap/bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="index.css" type="text/css" rel="stylesheet">
<title>Untitled Document</title>

</head>
<body>
<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'webshop';
$link = mysqli_connect($host, $user, $pass, $db) or die(mysqli_error($link));

$alleRecords = "SELECT * FROM categorieen";
$resultAlleRecords = mysqli_query($link, $alleRecords);

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
            <img class="headerImage" src="Images/LogoWebshop2.png" alt=""/>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <ul class="nav nav-pills menuExtra">
                <li role="presentation" class="active"><a href="#">Home</a></li>
                <li role="presentation"><a href="#">Contact</a></li>
                <li role="presentation"><a href="#" data-href="gebruiker/LoginPage.php" data-toggle="modal" data-target="#login">Inloggen</a></li>
                <li role="presentation"><a href="#" data-href="gebruiker/LoginPage.php" data-toggle="modal" data-target="#register">Registreren</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-2 stretch">
            <table class="table table-bordered table-responsive">
                <tr style="border-bottom:1px solid black">
                    <th style="background-color: #337ab7; color:white;">Categorieën</th>
                </tr>
                <?php
                if (mysqli_num_rows($resultAlleRecords) > 0) {
                    while ($rij = mysqli_fetch_row($resultAlleRecords)) {
                        ?>
                        <tr>
                            <td>
                                <a><?php echo $rij[1] ?></a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
        </div>
        <div class="col-xs-10 stretch">

        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>