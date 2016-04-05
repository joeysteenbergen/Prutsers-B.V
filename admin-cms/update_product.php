<?php include_once("includes/bodystart.php"); ?>
    <h1>ZWIK2</h1>


    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Product toevoegen</h3>
        </div>
        <div class="panel-body">
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


    <div class="container-fluid">
        <div class="row">
            <header>
                <div class="row">
                    <div class="col-md-12">
                        <div class="navbar navbar-default">
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                                    <li><a href="#">Link</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="#">One more separated link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <form class="navbar-form navbar-left" role="search">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                    </div>
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </form>
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="#">Link</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div>
                    </div>
                </div>
            </header>
            <div class="col-md-2">
                <?php include_once('includes/sidemenu.php')?>
            </div>

            <div class="col-md-10">
                <?php
                if(!empty($_GET['page']))
                {
                    if(!file_exists($_GET['page'].".php"))
                    {
                        echo "error - page not found";
                    }
                    else {
                        include($_GET['page'].".php");
                    }
                }
                else {
                    echo "error - page not found";
                }
                ?>
            </div>
        </div>
    </div>



<?php include_once("includes/bodyclose.php"); ?>