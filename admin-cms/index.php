<?php

if($_SESSION['login'] = true)
{

}

else {
    header("Location:inloggen.php");
}

?>

<?php include_once('includes/bodystart.php') ?>

<div class="container-fluid">
    <div class="col-md-2 stretch">
        <h2>zwik2</h2>
    </div>
    <div class="col-md-10 stretch">
        <h2>zwik3</h2>
    </div>
</div>

<?php include_once('includes/bodyclose.php') ?>