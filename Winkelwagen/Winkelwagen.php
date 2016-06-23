<?php

include("../DatabaseConnectie.php");

session_start();

if(isset($_GET['delete_id']))
{
//    echo "delete id = " . $_GET['delete_id'];
    unset($_SESSION['cart'][$_GET['delete_id']]);
    $_SESSION['cart'] = array_values($_SESSION['cart'][$_GET['delete_id']]);
}

if(isset($_POST['afrekenen']))
{
    if(isset($_SESSION['totaalProducten']))
    {
        if($_SESSION['totaalProducten'] == null)
        {
            unset($_SESSION['cart']);
            var_dump($_SESSION['cart']);
            return;
            $aantalProducten = 0;
        }

        elseif($_SESSION['totaalProducten'] != null)
        {
            unset($_SESSION['cart']);
            $_SESSION['totaalProducten'] = 0;
            header("Location: ../index.php");
            exit();
        }
    }
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <script type="text/javascript" src="../Bootstrap/bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../Bootstrap/bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/css/bootstrap.min.css">
    <title>Webshop</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Hoeveelheid</th>
                    <th class="text-center">Prijs p/s</th>
                    <th class="text-center">Totaal</th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>
                <?php

               foreach($_SESSION['cart'] as $product)
                {
                    ?>
                   <tr>
                            <td class="col-sm-8 col-md-6">
                                <div class="media">
                                    <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="#"> <?php echo $product['Naam']; ?></a></h4>
                                        <span>Status: </span><span class="text-success"><strong>Op voorraad</strong></span>
                                    </div>
                                </div></td>
                            <td class="col-sm-1 col-md-1" style="text-align: center">
                                <input type="number" class="form-control" name="productAantal" required value="<?php echo $product['Aantal']; ?>">
                            </td>
                            <td class="col-sm-1 col-md-1 text-center"><strong> <?php echo $product['Prijs']; ?></strong></td>
                            <td class="col-sm-1 col-md-1 text-center"><strong>€ <?php echo $som = $product['Prijs'] * $product['Aantal']; ?></strong></td>
                            <td class="col-sm-1 col-md-1">
                                <button type="button" class="btn btn-success">
                                    <span class="glyphicon glyphicon-refresh"></span> Update
                                </button>
                                <div style="padding-bottom: 10px;"></div>
                                    <a href="javascript:delete_id('.$i.')">Verwijderen</a>
                                        <button href="javascript:delete_id('.$i.')" name="verwijderen" type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Remove</button>
                                
                            </td>
                        </tr>
                <?php
                }

                $subtotaal = $som;
                ?>

                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h5>Subtotaal</h5></td>
                    <td class="text-right"><h5><strong>€<?php echo $subtotaal ?></strong></h5></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h5>Verzendkosten</h5></td>
                    <td class="text-right"><h5><strong>€<?php echo $verzendkosten = 6.99;?></strong></h5></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h3>Totaal</h3></td>
                    <td class="text-right"><h3><strong><?php echo $totaal = $subtotaal + $verzendkosten; ?></strong></h3></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td>
                        <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-shopping-cart"></span> Verder winkelen</button>
                    </td>
                    <td>
                        <form action="" method="post">
                            <button class="btn btn-success" name="afrekenen" type="submit"> Afrekenen <span class="glyphicon glyphicon-play"></span></button>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!--<div class="row">-->
<!--    <div class="col-xs-12">-->
<!--        <form action="" method="post">-->
<!--            <button class="btn btn-primary" name="afrekenen" type="submit">Afrekenen</button>-->
<!--        </form>-->
<!--    </div>-->
<!--</div>-->
<script type="text/javascript">
    function delete_id(id)
    {
        if(confirm("Weet u zeker dat u dit product wil verwijderen?"))
        {
            window.location.href = "Winkelwagen.php?delete_id=" + id;
        }
    }
</script>

</body>
</html>
