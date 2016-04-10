<?php 
session_start();
include_once('includes/bodystart.php');
?>

    <nav class="navbar navbar-default no-margin">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header fixed-brand">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"  id="menu-toggle">
                <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
            </button>
            <a class="navbar-brand" href="index.php"><i class="fa fa-rocket fa-4"></i> Naar hoofdpagina</a>
        </div><!-- navbar-header-->

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active" ><button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2"> <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span></button></li>
            </ul>
        </div><!-- bs-example-navbar-collapse-1 -->
    </nav>

    <div id="wrapper">
        <!-- Sidebar -->
        <?php include_once('includes/sidemenu.php')?>

        <!-- Page Content -->
        <div class="container-fluid xyz scroll">
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
                echo "Welkom";
            }
            ?>
        </div>
    </div>
<?php include_once('includes/bodyclose.php') ?>