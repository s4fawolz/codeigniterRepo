<!doctype html>
<html lang=de:DE>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Reiter</title>
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
                    <th scope="col">Beschreibung</th>
                    <th scope="col"></th>
                    <th scope="col"></th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($reiter  as $value)
                {?>
                    <tr>
                        <td><?=$value->Name?> </td>
                        <td><?=$value->Beschreibung?></td>
                        <td><i class="fa fa-clipboard"></i></td>
                        <td><i class="fa fa-trash"></i></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
            <br>
            <h2>Beabeiten/Erstellen</h2>

           <form>
               <div class="form-group">
                   <label for="reiterBez">Bezeichnung des Reiters</label>
                   <input class="form-control" type="text" name="Name" id="reiterBez" placeholder="Bezeichnung">
               </div>

               <div class="form-group">
                   <label for="tArea1">Beschreibung:</label>
                   <textarea class="form-control"  id="tArea1" rows="3" placeholder="Beschreibung"></textarea>
               </div>

               <div class="form-group">
                   <label for="zugewiesenesProjekt">Zugewiesenes Projekt:</label>
                   <select name="list "class="form-control" id="zugewiesenesProjekt">
                       <option>ToDo</option>
                       <option>Erledigt</option>
                       <option>Verschieben</option>
                   </select>
               </div>

               <button type="button" class="btn btn-primary">Submit</button>
               <button type="button" class="btn btn-info">Reset</button>
           </form>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
</body>
</html>