<?php
    include_once("includes/bodystart.php");
    include_once("constants/connect.php");

$sql_fetch_producten = "SELECT * FROM producten";
$res = mysqli_query($conn, $sql_fetch_producten);
?>
<div class="row">
    <div class="col-xs-6">
        <?php

        echo "<table class='table table-striped'>"
            . "<tr>"
            . "<th>" . "ID" . "</th>"
            . "<th>" . "Naam" . "</th>"
            . "<th>" . "Prijs" . "</th>"
            . "<th>" . "Korte omschrijving" . "</th>"
            . "<th>" . "Lange omschrijving" . "</th>"
            . "<th>" . "Tags" . "</th>"
            . "<th>" . "Afbeelding" . "</th>"
            . "<th>" . "Categorie" . "</th>"
            . "<th>" . "Aantal" . "</th>"
            . "<th>" . "Kleur" . "</th>"
            . "<th>" . "Voorraad" . "</th>"
            . "<th>" . "Aanbieding" . "</th>"
            . "<th></th>"
            ."<th></th>"
            . "</tr>";

        if (mysqli_num_rows($res) > 0) {
            while ($rij = mysqli_fetch_row($res)) {
                ?>
                <tr>
                    <td>
                        <?php echo $rij[0] ?>
                    </td>
                    <td>
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
                    <td><a href="javascript:edit_id(<?php echo $rij[0]; ?>)"> Wijzigen </a></td>
                    <td><a href="javascript:delete_id(<?php echo $rij[0]; ?>)"> Verwijder </a></td>
                </tr>
                <?php
            }
        } else {
            echo "<p>" . "Geen data gevonden" . "</p>";
        }
        echo "</table>";
        ?>
    </div>
</div>



<?php include_once("includes/bodyclose.php"); ?>