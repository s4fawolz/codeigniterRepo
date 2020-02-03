<div class="col-2">
    <nav>
        <ul class="list-group">
            <li class="list-group-item"><a href="Login">Login</a></li>
            <li class="list-group-item"><a href="Projekte">Projekte</a></li>
            <li class="list-group-item"><a href="AktuellesProjekt">Aktuelles Projekt<?= isset($_SESSION["projekt"]) ? "(". $_SESSION["projekt"].")" :""?></a></li>
            <ul>
                <li class="list-group-item"><a href="/codeigniter/public/Reiter">Reiter</a></li>
                <li class="list-group-item"><a href="/codeigniter/public/Aufgaben">Aufgaben</a></li>
                <li class="list-group-item"><a href=/codeigniter/public/Mitglieder>Mitglieder</a></li>
            </ul>
        </ul>
    </nav>
</div>