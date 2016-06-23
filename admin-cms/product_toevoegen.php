<html>
<head>
    <script type="text/javascript" src="../jquery-1.12.2.js"></script>
    <script type="text/javascript" src="Bootstrap/bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="Bootstrap/bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<?php
include_once("connect.php");

session_start();

if($_SESSION['GebruikerSet'] == true) {

$Voornaam = implode('', $_SESSION['GebruikerVoornaam']);
$Achternaam = implode('', $_SESSION['GebruikerAchternaam']);

$sql_fetch_categories = "SELECT * FROM `categorieen`";
$res = mysqli_query($conn, $sql_fetch_categories);

if(isset($_POST['toevoegen']))
{
    $categorieID = substr($_POST['categorielijst'], 0, 1);
    move_uploaded_file($_FILES['productfoto']['tmp_name'], "../uploads/" . $_FILES['productfoto']['name']);
    $uploadPath = 'uploads/' . $_FILES['productfoto']['name'];
    $productAantal = 1;

    $productNaam = $_POST['productnaam'];
    $productPrijs = $_POST['productprijs'];
    $productOmsKort = $_POST['productomschrijvingkort'];
    $productOmsLang = $_POST['productomschrijvinglang'];
    $productTags = $_POST['producttags'];
    $productKleur = $_POST['productkleur'];
    $productVoorraad = $_POST['productvoorraad'];

    if(isset($_POST['productaanbieding']) && $_POST['productaanbieding'] == "Yes")
    {
        $isAanbieding = 1;
    }
    else
    {
        $isAanbieding = 0;
    }

    $sql = "INSERT INTO producten VALUES ('','$productNaam','$productPrijs','$productOmsKort','$productOmsLang','$productTags','$uploadPath','$categorieID','$productAantal','$productKleur','$productVoorraad','$isAanbieding')";
    $res = mysqli_query($conn, $sql);

    header("Location:product_toevoegen.php");
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
                <h3 class="panel-title">Product toevoegen</h3>
            </div>
            <div class="panel-body">
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="categorielist">Selecteer categorie</label>
                        <select class="form-control" id="categorielijst" name="categorielijst">
                            <?php
                            if(mysqli_num_rows($res) > 0)
                            {
                                while ($rij = mysqli_fetch_row($res))
                                {
                                    echo '<option>'.$rij[0]." ".$rij[1].'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div> <!-- Categorie end -->

                    <div class="form-group">
                        <label for="productnaam">Naam</label>
                        <input type="text" class="form-control" id="productnaam" name="productnaam" placeholder="Naam product" required>
                    </div> <!-- Productname end -->

                    <div class="form-group">
                        <label for="productprijs">Prijs</label>
                        <input type="text" class="form-control" id="productprijs" name="productprijs" placeholder="Prijs product" required>
                    </div> <!-- Productprijs end -->

                    <div class="form-group">
                        <label for="productaantal">Aantal in opslag</label>
                        <input type="text" class="form-control" id="productaantal" name="productvoorraad" placeholder="Aantal producten" required>
                    </div> <!-- Productaantal end -->

                    <div class="form-group">
                        <label for="productkleur">Kleur</label>
                        <input type="text" class="form-control" id="productkleur" name="productkleur" placeholder="Kleur product" required>
                    </div> <!-- Productkleur end -->

                    <div class="form-group">
                        <label for="productomschrijvingkort">Omschrijving kort</label>
                        <textarea class="form-control" rows="2" id="productomschrijvingkort" name="productomschrijvingkort" required></textarea>
                    </div> <!-- Productomschrijvingkort end -->

                    <div class="form-group">
                        <label for="productomschrijvinglang">Omschrijving lang</label>
                        <textarea class="form-control" rows="4" id="productomschrijvinglang" name="productomschrijvinglang" required></textarea>
                    </div> <!-- Productomschrijvinglang end -->

                    <div class="form-group">
                        <label for="producttags">Tags (spatie gescheiden)</label>
                        <textarea class="form-control" rows="1" id="producttags" name="producttags" required></textarea>
                    </div> <!-- Producttags end -->

                    <div class="form-group">
                        <label for="productpicture">Product foto</label>
                        <input  type="file" name="productfoto" id="productfoto">
                    </div> <!-- Productpicture end -->

                    <div class="form-group">
                        <label for="productaanbieding">Is aanbieding?</label>
                        <input type="checkbox" id="productaanbieding" name="productaanbieding" value="Yes" />
                    </div> <!-- Productaanbieding end -->

                    <div class="form-group">
                        <input type="submit" name="toevoegen" value="Toevoegen" class="btn btn-primary">
                    </div>
                </form>
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
