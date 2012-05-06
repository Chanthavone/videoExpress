<?php
    include("modele/modeleAbonnes.php");
    
    $num = $_GET['num'];
    deleteAbonne($num);
    header("Location: index.php?module=gestion&admin=listeAbonnes");
?>