<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'webshop';
$link = mysqli_connect($host, $user, $pass, $db) or die(mysqli_error($link));

$Id = 1;

$alleRecords = "SELECT * FROM producten WHERE categorieID = $Id";
$resultAlleRecords = mysqli_query($link, $alleRecords);
?>

<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
          integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="row">
    <div class="col-xs-3">

    </div>
    <div class="col-xs-9">
        <div class="row">
            <div class="col-xs-12">

            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="ProductBlock">
                    <?php
                    if (mysqli_num_rows($resultAlleRecords) > 0) {
                        while ($rij = mysqli_fetch_row($resultAlleRecords)) {
                            ?>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="col-xs-1">
                                    </div>
                                    <div class="col-xs-10">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" style="background-color: #6CCAEA; !important; background-image: none !important;">

                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-3">
                                                            <img src="../Images/Producten/badeendgeeldr1.jpg" style="border:1px solid black; height:150px; width:150px;"/>
                                                        </div>
                                                        <div class="col-xs-9">
                                                            <div class="col-xs-12">
                                                                <div class="col-xs-6">
                                                                    <table>
                                                                        <tr>
                                                                            <td>Product ID:</td>
                                                                            <td><?php echo $rij[0] ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Naam:</td>
                                                                            <td><?php echo $rij[1] ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Kleur:</td>
                                                                            <td><?php echo $rij[9] ?></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <div class="col-xs-6">
                                                                    <h1>Prijs: € <?php echo $rij[2]?>,-</h1>
                                                                    <br/>
                                                                    <button class="btn btn default" style="background-color: #0000FF; color:#FFFFFF;">In winkelmandje <span class="glyphicon glyphicon-shopping-cart"></span></button>
                                                                </div>
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
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

