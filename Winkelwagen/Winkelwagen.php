<?php
session_start();

if(isset($_POST['afrekenen']))
{
    if(isset($_SESSION['totaalProducten']))
    {
        if($_SESSION['totaalProducten'] == null)
        {
            $aantalProducten = 0;
        }

        elseif($_SESSION['totaalProducten'] != null)
        {
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
<div class="row">
    <div class="col-xs-12">
        <form action="" method="post">
            <button class="btn btn-primary" name="afrekenen" type="submit">Afrekenen</button>
        </form>
    </div>
</div>
</body>
</html>
