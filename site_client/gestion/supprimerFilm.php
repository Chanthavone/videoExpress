<?php
    // Appel des fonctions de gestion des films
    include("modele/modeleFilms.php");
    
    // Récupération du numéro de film
    $num = $_GET['num'];
    
    // Suppression du film et redirection sur la liste des films
    deleteFilm($num);
    header("Location: index.php?module=gestion&admin=listeFilms");
?>