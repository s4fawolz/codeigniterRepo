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
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">EMail</th>
                    <th scope="col">In Projekt</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($mitglieder  as $value)
                {?>
                    <tr>
                        <td><?=$value->Username?> </td>
                        <td><?=$value->EMail?></td>
                        <td><i class="fa fa-square"></i></td>
                        <td><a href="Mitglieder/showEditUser?editID=<?=$value->ID?>"><i class="fa fa-clipboard"></i></a></td>
                        <td><a href="Mitglieder/deleteUser?delID=<?=$value->ID?>"> <i class="fa fa-trash"></a></i></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
            <br>
            <h2>Beabeiten/Erstellen</h2>

            <?php helper('form'); echo form_open("Mitglieder/createUser"); ?>

                <div class="form-group">
                    <label for="username">Username:</label>
                    <?=form_input(['type' =>'text','class' =>'form-control','name' =>'Username','id' =>'username','placeholder' =>'Username'])?>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input class="form-control" type="email" name="EMail" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="passwort">Passwort:</label>
                    <input class="form-control" type="password" name="Passwort" id="passwort" placeholder="Passwort">
                </div>
                <?php if(isset($_SESSION["userEmail"]) ){?>
                <div class="form-check" style="margin-bottom: 10px">
                    <input class="form-check-input" type="checkbox" name="applyProject" value="true" id="checkB">
                    <label class="form-check-label" for="checkB">
                        Dem Projekt zugeordnet
                    </label>
                </div>
                <?php }?>

                <button name = "createUser" type="submit" class="btn btn-primary" value="true">Submit</button>
            <?php form_close()?>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
</body>
</html>