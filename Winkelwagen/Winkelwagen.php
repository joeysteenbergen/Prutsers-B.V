<?php
session_start();
var_dump($_SESSION['lijstProducten']);

if(isset($_GET['delete_id']))
{
//    echo "delete id = " . $_GET['delete_id'];
    unset($_SESSION['lijstProducten'][$_GET['delete_id']]);
    $_SESSION['lijstProducten'] = array_values($_SESSION['lijstProducten'][$_GET['delete_id']]);
}

if(isset($_POST['afrekenen']))
{
    if(isset($_SESSION['totaalProducten']))
    {
        if($_SESSION['totaalProducten'] == null)
        {
            unset($_SESSION['lijstProducten']);
            var_dump($_SESSION['lijstProducten']);
            return;
            $aantalProducten = 0;
        }

        elseif($_SESSION['totaalProducten'] != null)
        {
            unset($_SESSION['lijstProducten']);
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
    <link rel="stylesheet" type="text/css" href="Bootstrap/bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="index.css" type="text/css" rel="stylesheet">
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
                $subtotaal = 0;
                $totaal = 0;
//                foreach($_SESSION['lijstProducten'] as $product)
                for($i =0; $i < count($_SESSION['lijstProducten']); $i++)
                {
//                    var_dump($product);
                    echo '<tr>
                            <td class="col-sm-8 col-md-6">
                                <div class="media">
                                    <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="#">'; echo $_SESSION['lijstProducten'][$i]['Naam']; echo'</a></h4>
                                        <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                                    </div>
                                </div></td>
                            <td class="col-sm-1 col-md-1" style="text-align: center">
                                <input type="number" class="form-control" name="productAantal" value="'; echo $_SESSION['lijstProducten'][$i]['Aantal']; echo'">
                            </td>
                            <td class="col-sm-1 col-md-1 text-center"><strong>€'; echo $_SESSION['lijstProducten'][$i]['Prijs']; echo'</strong></td>
                            <td class="col-sm-1 col-md-1 text-center"><strong>€'; echo $som = $_SESSION['lijstProducten'][$i]['Aantal'] * $_SESSION['lijstProducten'][$i]['Prijs']; echo'</strong></td>
                            <td class="col-sm-1 col-md-1">
                                <button type="button" class="btn btn-success">
                                    <span class="glyphicon glyphicon-refresh"></span> Update
                                </button>
                                <div style="padding-bottom: 10px;"></div>
                                    <a href="javascript:delete_id('.$i.')">Verwijderen</a>
                                        <button href="javascript:delete_id('.$i.')" name="verwijderen" type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Remove</button>
                                
                            </td>
                        </tr>';
                    $subtotaal += $som;
                }
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
