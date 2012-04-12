<?php
    if (isset ($_POST['numFilm'])) {
        $num = $_POST['numFilm'];
        $req = mysql_query("select Titre from films where NoFilm = 1") or die("Erreur!!!");
        $donnee = mysql_fetch_row($req);
        echo $donnee[0];
    }
?>

coucoucoucoucou