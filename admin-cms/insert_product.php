<?php include_once("includes/bodystart.php");
include_once("constants/connect.php");
$sql_fetch_categories = "SELECT * FROM `categorieen`";
$res = mysqli_query($conn, $sql_fetch_categories);
?>
<!--<div class="container">-->
<!--    <div class="row">-->
<!--        <div class="col-md-6">-->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Product toevoegen</h3>
                </div>
                <div class="panel-body pre-scrollable">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="categorielist">Selecteer categorie</label>
                            <select class="form-control" id="categorielist">
                                <?php
                                if(mysqli_num_rows($res) > 0)
                                {
                                    while ($rij = mysqli_fetch_row($res))
                                    {
                                        echo '<option>'.$rij[1].'</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div> <!-- Categorie end -->

                        <div class="form-group">
                            <label for="productname">Naam</label>
                            <input type="text" class="form-control" id="productname" placeholder="Naam product" required>
                        </div> <!-- Productname end -->

                        <div class="form-group">
                            <label for="productprijs">Prijs</label>
                            <input type="text" class="form-control" id="productprijs" placeholder="Prijs product" required>
                        </div> <!-- Productprijs end -->

                        <div class="form-group">
                            <label for="productomschrijvingkort">Omschrijving kort</label>
                            <textarea class="form-control" rows="2" id="productomschrijvingkort" required></textarea>
                        </div> <!-- Productomschrijvingkort end -->

                        <div class="form-group">
                            <label for="productomschrijvinglang">Omschrijving lang</label>
                            <textarea class="form-control" rows="4" id="productomschrijvinglang" required></textarea>
                        </div> <!-- Productomschrijvinglang end -->

                        <div class="form-group">
                            <label for="producttags">Tags (komma en spatie gescheiden)</label>
                            <textarea class="form-control" rows="1" id="producttags" required></textarea>
                        </div> <!-- Producttags end -->

                    </form>
                </div>
            </div>
<!--        </div>-->
<!--    </div>-->
    <!--</div>-->


<?php include_once("includes/bodyclose.php"); ?>