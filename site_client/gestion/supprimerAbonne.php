<?php
    // Appel des fonctions de gestion des abonn�s
    include("modele/modeleAbonnes.php");
    
    // R�cup�ration du num�ro d'abonn�
    $num = $_GET['num'];
    
    // Suppression de l'abonn� et redirection sur la liste des abonn�s
    deleteAbonne($num);
    header("Location: index.php?module=gestion&admin=listeAbonnes");
?>