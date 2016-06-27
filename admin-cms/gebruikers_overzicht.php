<html>
<head>
    <script type="text/javascript" src="../jquery-1.12.2.js"></script>
    <script type="text/javascript" src="Bootstrap/bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="Bootstrap/bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css"/>

    <script type="text/javascript" rel="script">
        function edit_id(id)
        {
            window.location.href = "gebruikers_wijzigen.php?edit_id=" + id;
        }

        function delete_id(id)
        {
            if(confirm('Weet u zeker dat u deze gebruiker wilt verwijderen ?'))
            {
                window.location.href = "gebruikers_overzicht.php?delete_id=" + id;
            }
        }
    </script>
</head>
<body>
<?php

include("connect.php");

session_start();

if($_SESSION['GebruikerSet'] == true) {

    $Voornaam = implode('', $_SESSION['GebruikerVoornaam']);
    $Achternaam = implode('', $_SESSION['GebruikerAchternaam']);

    $sql_fetch_klanten = "SELECT * FROM gebruikers";
    $res = mysqli_query($conn, $sql_fetch_klanten);

    if (isset($_GET['delete_id'])) {
        $delete = "DELETE FROM gebruikers WHERE GebruikerID =" . $_GET['delete_id'];
        $res = mysqli_query($conn, $delete);
        header("Location: gebruikers_overzicht.php");
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
                    <li class="disabled"><a href="#"><span class="fa-stack fa-lg pull-left"><i
                                    class="fa fa-user fa-stack-1x "></i></span><?php echo $Voornaam . " " . $Achternaam ?>
                        </a></li>
                    <li class="disabled" style="border-bottom:1px solid lightgray;"><a href="#"><span
                                class="fa-stack fa-lg pull-left"><i class="fa fa-server fa-stack-1x "></i></span>Producten</a>
                    </li>
                    <li><a href="product_overzicht.php"><span class="fa-stack fa-lg pull-left"><i
                                    class="fa fa-server fa-stack-1x "></i></span>Producten overzicht</a></li>
                    <li><a href="product_toevoegen.php"><span class="fa-stack fa-lg pull-left"><i
                                    class="fa fa-server fa-stack-1x "></i></span>Producten toevoegen</a></li>
                    <li class="disabled" style="border-bottom:1px solid lightgray;"><a href="#"><span
                                class="fa-stack fa-lg pull-left"><i class="fa fa-server fa-stack-1x "></i></span>Gebruikers</a>
                    </li>
                    <li><a href="gebruikers_overzicht.php"><span class="fa-stack fa-lg pull-left"><i
                                    class="fa fa-server fa-stack-1x "></i></span>Gebruikers overzicht</a></li>
                    <li><a href="index.php"><span class="fa-stack fa-lg pull-left"><i
                                    class="fa fa-sign-out fa-stack-1x "></i></span>Uitloggen</a></li>
                </ul>
            </div><!-- /#sidebar-wrapper -->
        </div>
        <div class="col-xs-10 zeroPaddingLeft">
            <table class='table table-striped'>
                <tr>
                    <th>ID</th>
                    <th>Voornaam</th>
                    <th>Tussenvoegsel</th>
                    <th>Achternaam</th>
                    <th>Straat</th>
                    <th>Huisnummer</th>
                    <th>Postcode</th>
                    <th>Woonplaats</th>
                    <th>Land</th>
                    <th>Email</th>
                    <th>Telefoon</th>
                    <th>Geslacht</th>
                    <th>Rechten</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                if (mysqli_num_rows($res) > 0) {
                    while ($rij = mysqli_fetch_row($res)) {
                        ?>
                        <tr>
                            <td class="text-align">
                                <?php echo $rij[0] ?>
                            </td>
                            <td class="text-align">
                                <?php echo $rij[1] ?>
                            </td>
                            <td>
                                <?php echo $rij[2] ?>
                            </td>
                            <td>
                                <?php echo $rij[3] ?>
                            </td>
                            <td>
                                <?php echo $rij[4] ?>
                            </td>
                            <td>
                                <?php echo $rij[5] ?>
                            </td>
                            <td>
                                <?php echo $rij[6] ?>
                            </td>
                            <td>
                                <?php echo $rij[7] ?>
                            </td>
                            <td>
                                <?php echo $rij[8] ?>
                            </td>
                            <td>
                                <?php echo $rij[9] ?>
                            </td>
                            <td>
                                <?php echo $rij[10] ?>
                            </td>
                            <td>
                                <?php echo $rij[11] ?>
                            </td>
                            <td>
                                <?php echo $rij[14] ?>
                            </td>
                            <td><a href="javascript:edit_id(<?php echo $rij[0]; ?>)"><i
                                        class="glyphicon glyphicon-pencil"></i></a></td>
                            <td><a href="javascript:delete_id(<?php echo $rij[0]; ?>)"><i
                                        class="glyphicon glyphicon-trash"></i></a></td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<p>" . "Geen data gevonden" . "</p>";
                }
                ?>
            </table>
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
