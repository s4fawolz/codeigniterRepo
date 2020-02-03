<!doctype html>
<html lang=de:DE>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Projekte</title>
</head>
<body>
<div class="container-fluid">
    <?php include "header.php"; ?>
    <div class = "row">
        <?php
        include "Navigation.php";
        ?>
        <div class="col">
            <h2>Projekt Auswählen</h2>
            <form>
                <div class="form-group">
                    <select name="list "class="form-control" id="projektAuswahl">
                        <?php foreach ($projekte  as $value)
                        {?>
                            <option><?=$value->Name?><option>
                        <?php }?>
                    </select>
                </div>
                <button type="button" class="btn btn-primary" style="margin-bottom: 10px;">Submit</button>
                <button type="button" class="btn btn-primary" style="margin-bottom: 10px;">Bearbeiten</button>
                <button type="button" class="btn btn-danger" style="margin-bottom: 10px;">Löschen</button>
            </form>
            <h2>Beabeiten/Erstellen</h2>
            <form>
                <div class="form-group">
                    <label for="projektname">Projektname</label>
                    <input class="form-control" type="text" name="Name" id="projektname" placeholder="Projektname">
                </div>
                <div class="form-group">
                    <label for="tArea1">Projektbeschreibung:</label>
                    <textarea class="form-control" placeholder="Beschreibung" id="tArea1" rows="3"></textarea>
                </div>

                <button type="button" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-info">Reset</button>
            </form>
        </div>
    </div>
</div>
</body>
<?php include "footer.php"; ?>
</html>