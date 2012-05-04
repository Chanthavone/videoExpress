<div class="titre">
	<h2> <span>Liste des abonnes</span> </h2>
</div>

<?php
    // Appel de la page contenant les fonction de recherche d'abonnes
    include("modele/modeleAbonnes.php");
    
    // Initialisation des variables
    $color = true;
    // On recherche tous les abonnes ainsi que leurs informations
    $abonnes = getAbonnes();
    
    // On affiche un tableau contenant tous les abonnés et leurs informations
    
    echo "<table id='tableListeAbonne'>";
    echo "<tr><th>Nom</th><th>Prenom</th><th>Téléphone</th><th>Email</th><th>Emprunts</th></tr>";
    // Pour chaque abonné, on affiche ses informations sur une ligne
    foreach ($abonnes as $k) {
        // On alterne la couleur de lignes
        if ($color == true) {
            $classcolor = "classblue";
            $color = false;
        }
        else {
            $classcolor = "classwhite";
            $color = true;
        }
        echo "<tr class='$classcolor'><td>".$k['Nom']."</td><td>".$k['Prenom']."</td>
              <td>".$k['Telephone']."</td><td>".$k['Email']."</td>
              <td>".$k['NbCassettes']."</td></tr>";
    }
    echo "</table>";
?>