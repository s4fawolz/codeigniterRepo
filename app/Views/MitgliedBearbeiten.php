<!doctype html>
<html lang=de:DE>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!--<link rel="stylesheet" type="text/css" href="\Uebung_HTML-CSS\css\Ue2A4.css">-->
    <title>Mitglieder</title>
</head>
<body>
<div class="container-fluid">
    <?php include "header.php"; ?>
    <div class = "row">
        <?php
        include "Navigation.php";
        ?>
        <div class="col">
            <br>
            <h2>Beabeiten</h2>
            <form action="editUser" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input class="form-control" type="text" name="Username" id="username" placeholder="<?=$mitglied->Username?>">
                </div>
                <div class="form-group">
                    <label for="email">EMail:</label>
                    <input class="form-control" type="email" name="EMail" id="email" placeholder="<?=$mitglied->EMail?>">
                </div>
                <?php if($isLoggedInUser) {?>
                <div class="form-group">
                    <label for="passwort">Passwort:</label>
                    <input class="form-control" type="password" name="Passwort" id="passwort" placeholder="">
                </div>
                <?php } ?>

                <div class="form-check" style="margin-bottom: 10px">
                    <input class="form-check-input" type="checkbox" value="true" id="checkB">
                    <label class="form-check-label" for="checkB">
                        Dem Projekt zugeordnet
                    </label>
                </div>
                <button name = "editUserID" type="submit" class="btn btn-primary" value="<?=$mitglied->ID?>">Submit</button>
                <button type="button" class="btn btn-info">Reset</button>
            </form>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
</body>
</html>