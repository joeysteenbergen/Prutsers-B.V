<?php
include_once("constants/connect.php");
$sql_fetch_categories = "SELECT * FROM `categorieen`";
$res = mysqli_query($conn, $sql_fetch_categories);


?>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Product toevoegen</h3>
                </div>
                <div class="panel-body">
                    <form method="post" action="product_toevoegen_post.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="categorielist">Selecteer categorie</label>
                            <select class="form-control" id="categorielijst" name="categorielijst">
                                <?php
                                if(mysqli_num_rows($res) > 0)
                                {
                                    while ($rij = mysqli_fetch_row($res))
                                    {
                                        echo '<option>'.$rij['0']." ".$rij[1].'</option>';
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
                            <input type="text" class="form-control" id="productaantal" name="productaantal" placeholder="Aantal producten" required>
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


<?php //include_once("includes/bodyclose.php"); ?>