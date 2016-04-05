<?php
include_once("constants/fetchPageTitle.php");
$message = "";

if(isset($_POST['submit']))
{
    include("constants/connect.php");
    $sql = 'SELECT email, wachtwoord, voornaam FROM gebruikers WHERE email="'. $_POST["email"].'" and wachtwoord = "'. $_POST["wachtwoord"].'"';
    $res = mysqli_query($conn, $sql);
    $rij = mysqli_fetch_array($res);
    if(is_array($rij))
    {
        $_SESSION['voornaam'] = $rij['voornaam'];
        $_SESSION['login'] = true;
    }
    else {
        $message = "Gebruikersnaam en/of wachtwoord klopt niet.";
    }
}
if($_SESSION['login'] == true)
{
    header("Location:php06_bedrijf_index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="css/inloggen.css"

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="card card-container">
<!--        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />-->
        <img id="profile-img" class="profile-img-card" src="uploads/anon_user.png" />
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <span id="reauth-email" class="reauth-email"></span>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email addres" required autofocus>
            <input type="password" id="inputPassword" class="form-control" placeholder="Wachtwoord" required>
            <div class="message"><?php if($message!="") { echo $message; } ?></div>
            <div id="remember" class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Inloggen</button>
        </form><!-- /form -->
        <a href="#" class="forgot-password">
            Wachtwoord vergeten?
        </a>
    </div><!-- /card-container -->
</div><!-- /container -->