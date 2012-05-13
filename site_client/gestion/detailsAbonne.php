<div class="titre">
	<h2> <span>Informations sur un abonné</span> </h2>
</div>

<?php
    include("modele/modeleAbonnes.php");
    
	// On récupère le numéro d'abonné de la personne que l'on recherche
    $num = $_GET['num'];
	// On récupère les informations de l'abonné recherché
    $abonne = getUnAbonne($num);
    
	// On affiche ses détails
    echo "<h3 class='sousTitre'>Détails de l'abonné ".$abonne['Nom']." ".$abonne['Prenom']."</h3>";
    
    echo "<table class='tableColor' id='tableDetailsAbonne'>";
    echo "<tr class='classblue'><td>Numero :</td><td>".$abonne['Code']."</td></tr>";
    echo "<tr><td>Nom :</td><td>".$abonne['Nom']."</td></tr>";
    echo "<tr class='classblue'><td>Prénom :</td><td>".$abonne['Prenom']."</td></tr>";
    echo "<tr><td>Adresse :</td><td>".$abonne['NoRue']."</td></tr>";
    echo "<tr class='classblue'><td>Code Postal :</td><td>".$abonne['CodePostal']."</td></tr>";
    echo "<tr><td>Ville :</td><td>".$abonne['Ville']."</td></tr>";
    echo "<tr class='classblue'><td>Téléphone :</td><td>".$abonne['Telephone']."</td></tr>";
    echo "<tr><td>Email :</td><td>".$abonne['Email']."</td></tr>";
    echo "<tr class='classblue'><td>Banque :</td><td>".$abonne['Banque']."</td></tr>";
    echo "<tr><td>Guichet :</td><td>".$abonne['Guichet']."</td></tr>";
    echo "<tr class='classblue'><td>Compte :</td><td>".$abonne['Compte']."</td></tr>";
    echo "<tr><td>Emprunts :</td><td>".$abonne['NbCassettes']."</td></tr>";
    echo "</table>";
?>