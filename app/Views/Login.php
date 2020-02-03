<!doctype html>
<html lang=de:DE>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--<link rel="stylesheet" type="text/css" href="\Uebung_HTML-CSS\css\Ue2A4.css">-->
    <title>Projekte</title>
</head>
    <body>
    <div class="container-fluid">
        <header class="jumbotron"><h1>Aufgabenplaner</h1></header>
        <?php helper('form');
        echo form_open("Login/validateForm",'style="margin-left: 50%; transform: translateX(-50%)"'); ?>
            <form method="post" action="Login/passwortcheck" style="margin-left: 50%; transform: translateX(-50%)">
                <div style="color: #85271f; list-style: none">
                    <?php
                if (isset($_GET["wrongPassword"]))
                {
                    echo "Falsches Passwort";
                }
                ?>
                <?=isset($validation)? $validation->listErrors():"" ?>
                </div>
                <h2>Login</h2>
                <br>
                <div class="form-group">
                    <label for="emailLogin">Email-Adresse:</label>
                    <?=form_input(['type' =>'email','class' =>'form-control','name' =>'EMail','id' =>'emailLogin','placeholder' =>'Email-Adresse eingeben'])?>
                </div>
                <div class="form-group">
                    <label for="passwortLogin">Passwort</label>
                    <?=form_input(['type' =>'password','class' =>'form-control','name' =>'Passwort','id' =>'passwortLogin','placeholder' =>'Passworteingeben'])?>
                </div>
                <div class="form-check">
                    <?=form_input(['type' =>'checkbox','class' =>'form-check-input','name' =>'agb','placeholder' =>'Passworteingeben','value' => 'AGB'])?>
                    <label class="form-check-label" for="pers2">
                        AGBs und Datenschutzbedingung akzeptieren
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Einloggen</button>
                <p>Noch nicht registriert? <a href="/codeigniter/public/Mitglieder">Registrierung</a></p>
            </form>
        </div>
    </div>
    </body>
</html>