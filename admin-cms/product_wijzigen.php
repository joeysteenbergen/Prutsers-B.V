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

$sql_fetch_producten = "SELECT * FROM producten WHERE ProductID = " . $_GET['edit_id'];
$res = mysqli_query($conn, $sql_fetch_producten);

$ListCat = "SELECT CategorieID, CategorieNaam FROM categorieen";
$resCat = mysqli_query($conn, $ListCat);

if(isset($_POST['opslaan']))
{
    header("Location:product_overzicht");
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
                <h3 class="panel-title">Product wijzigen</h3>
            </div>
            <div class="panel-body">

                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="categorielist">Selecteer categorie</label>
                            <select class="form-control" id="categorielijst" name="categorielijst">
                                <?php
                                if (mysqli_num_rows($resCat) > 0)
                                {
                                    while ($rij = mysqli_fetch_row($resCat))
                                    {
                                        echo '<option>' . $rij[0] . " " . $rij[1] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div> <!-- Categorie end -->
                        <?php
                        while($rij = mysqli_fetch_row($res))
                        {
                        ?>
                        <div class="form-group">
                            <label for="productnaam">Naam</label>
                            <input type="text" class="form-control" id="productnaam" name="productnaam" placeholder="Naam product" required value="<?php echo $rij[1]; ?>"/>
                        </div> <!-- Productname end -->

                        <div class="form-group">
                            <label for="productprijs">Prijs</label>
                            <input type="text" class="form-control" id="productprijs" name="productprijs" placeholder="Prijs product" required value="<?php echo $rij[2]; ?>"/>
                        </div> <!-- Productprijs end -->

                        <div class="form-group">
                            <label for="productomschrijvingkort">Omschrijving kort</label>
                            <textarea class="form-control" rows="2" id="productomschrijvingkort" name="productomschrijvingkort"> <?php echo $rij[3]; ?></textarea>
                        </div> <!-- Productomschrijvingkort end -->

                        <div class="form-group">
                            <label for="productomschrijvinglang">Omschrijving lang</label>
                            <textarea class="form-control" rows="4" id="productomschrijvinglang" name="productomschrijvinglang"><?php echo $rij[4]; ?></textarea>
                        </div> <!-- Productomschrijvinglang end -->

                        <div class="form-group">
                            <label for="producttags">Tags (spatie gescheiden)</label>
                            <textarea class="form-control" rows="1" id="producttags" name="producttags"><?php echo $rij[5]; ?></textarea>
                        </div> <!-- Producttags end -->

                        <div class="form-group">
                            <label for="productpicture">Product foto</label>
                            <input type="file" name="productfoto" id="productfoto" required/>
                        </div> <!-- Productpicture end -->

                        <div class="form-group">
                            <label for="productkleur">Kleur</label>
                            <input type="text" class="form-control" id="productkleur" name="productkleur" placeholder="Kleur product" required value="<?php echo $rij[9]; ?>"/>
                        </div> <!-- Productkleur end -->

                        <div class="form-group">
                            <label for="productaantal">Aantal in opslag</label>
                            <input type="text" class="form-control" id="productaantal" name="productvoorraad" placeholder="Aantal producten" required value="<?php echo $rij[10]; ?>"/>
                        </div> <!-- Productaantal end -->

                        <div class="form-group">
                            <label for="productaanbieding">Is aanbieding?</label>
                            <?php
                            if($rij[11] == "1")
                            {
                                ?>
                                <input type="checkbox" id="productaanbieding" name="productaanbieding" checked/>
                            <?php
                            }

                            else {
                                ?>
                                <input type="checkbox" id="productaanbieding" name="productaanbieding" />
                                <?php
                            }
                            ?>
                        </div> <!-- Productaanbieding end -->
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
