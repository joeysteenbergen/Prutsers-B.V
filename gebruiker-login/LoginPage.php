<html>
<head>

</head>
<body>
<div class="col-xs-12">
    <div class="row">
        <div class="col-xs-3">

        </div>
        <div class="col-xs-6">
            <div class="logIn">
                <h2>Inloggen</h2>
                <form>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" class="form-control" placeholder="E-mail"/>
                    </div>
                    <div class="form-group">
                        <label>Wachtwoord</label>
                        <input type="password" class="form-control" placeholder="Wachtwoord"/>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Onthoud me
                        </label>
                    </div>
                    <input type="submit" name="inloggen" value="Inloggen" />
                </form>
            </div>
            <?php
            if(isset($_GET["inloggen"]))
            {

            }
            ?>
        </div>
        <div class="col-xs-3">

        </div>
    </div>
</div>
</body>
</html>