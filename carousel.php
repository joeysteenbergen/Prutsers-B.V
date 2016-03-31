<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'webshop';
$link = mysqli_connect($host, $user, $pass, $db) or die(mysqli_error($link));

$alleRecorda = "SELECT * FROM aanbiedingen";
$resultAlleRecords = mysqli_query($link, $alleRecords);

?>

<html>
<head>

</head>
<body>
<div class="row">
    <div class="col-xs-12">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php
                if (mysqli_num_rows($resultAlleRecords) > 0)
                {
                    while ($rij = mysqli_fetch_row($resultAlleRecords))
                    {
                        ?>
                        <div class="item active">
                            <img src="img_chania.jpg" alt="Chania">
                        </div>
                        <?php
                    }
                }
                ?>
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <?php
                if (mysqli_num_rows($resultAlleRecords) > 0)
                {
                    while ($rij = mysqli_fetch_row($resultAlleRecords))
                    {
                        ?>
                        <div class="item active">
                            <img src="img_chania.jpg" alt="Chania">
                        </div>
                <?php
                    }
                }
                ?>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
</body>
</html>
