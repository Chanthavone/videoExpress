<?php
    // Appel des fonctions de gestion des abonnés
    include("modele/modeleAbonnes.php");
    
    // Récupération du numéro d'abonné
    $num = $_GET['num'];
    
    // Suppression de l'abonné et redirection sur la liste des abonnés
    deleteAbonne($num);
    header("Location: index.php?module=gestion&admin=listeAbonnes");
?>