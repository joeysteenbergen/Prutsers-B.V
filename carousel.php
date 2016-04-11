<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'webshop';
$link = mysqli_connect($host, $user, $pass, $db) or die(mysqli_error($link));

$alleRecords = "SELECT * FROM producten WHERE aanbieding = 1";
$resultAlleRecords = mysqli_query($link, $alleRecords);

$countRecords = "SELECT COUNT * FROM producten WHERE aanbieding = 1";
$countAlleRecords = mysqli_query($link, $countRecords);

?>

<html>
<head>
    <script src="Bootstrap/bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="Bootstrap/bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<style>
  .carousel { 
  width: 250px;
  height: 200px;
  }
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 75%;
      margin: auto;
  }
  </style>
	
	</head>
<body>
<div class="row">
    <div class="col-xs-12">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php
                if (mysqli_num_rows($resultAlleRecords) > 0) {
                while ($rij = mysqli_fetch_row($resultAlleRecords)) {
                ?>
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <?php
                    }
                }
                ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="Producten/ProductImages/Neusfluit.png" alt="first">
                </div>

                <?php
                if (mysqli_num_rows($resultAlleRecords) > 0) {
                    while ($rij = mysqli_fetch_row($resultAlleRecords)) {
                        ?>
                        <div class="item">
                            <img src="img_chania2.jpg" alt="">
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
