<?php
    include("modele/modeleFilms.php");
    
    $num = $_GET['num'];
    deleteFilm($num);
    header("Location: index.php?module=gestion&admin=listeFilms");
?>