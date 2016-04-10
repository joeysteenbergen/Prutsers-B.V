<?php
include_once("constants/connect.php");

if(isset($_POST['toevoegen']))
{
        $categorieID = substr($_POST['categorielijst'], 0, 1);
        move_uploaded_file($_FILES['productfoto']['tmp_name'], "uploads/" . $_FILES['productfoto']['name']);
        $uploadPath = '/' . $_FILES['productfoto']['name'];

        if(isset($_POST['productaanbieding']) && $_POST['productaanbieding'] == "Yes")
        {
            $isAanbieding = 1;
        }
        else {
            $isAanbieding = 0;
        }

        $sql = "INSERT INTO `producten`(`ProductNaam`, `ProductPrijs`, `ProductomschrijvingKort`, `ProductomschrijvingLang`, `ProductTags`, `ProductAfbeelding`, `CategorieID`, `ProductAantal`, `ProductKleur`, `ProductVoorraad`, `BestellingRegelID`, `Aanbieding`)
            VALUES ('".$_POST['productnaam']."', '".$_POST['productprijs']."', '".$_POST['productomschrijvingkort']."', '".$_POST['productomschrijvinglang']."', '".$_POST['producttags']."', '".$uploadPath."', '".$categorieID."', '".$_POST['productaantal']."', '".$_POST['productkleur']."', '".$_POST['productaantal']."', '".$isAanbieding."')";
//        $res = mysqli_query($conn, $sql);
        echo $sql;
        return;
}