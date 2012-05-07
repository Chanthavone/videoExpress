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
    
    echo "<table id='tableListeAbonne' class='tableColor'>";
    echo "<tr><th>Nom</th><th>Prenom</th><th>Téléphone</th><th>Email</th><th>Emprunts</th><th>Options</th></tr>";
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
              <td>".$k['NbCassettes']."</td>
              <td><div id='options'><a href='index.php?module=gestion&admin=detailsAbonne&num=".$k['Code']."' title='Voir les détails'><img src='commun/images/loupe.png' alt='Détails' width='20' height='20'/></a>
              <a href='#' title='Modifier'><img src='commun/images/crayon.png' alt='Modifier' width='20' height='20'/></a>
              <a href='index.php?module=gestion&admin=supprimerAbonne&num=".$k['Code']."' title='Supprimer' onclick=\"return(confirm('Voulez-vous vraiment supprimer cet abonné?')); \"><img src='commun/images/corbeille.gif' alt='Supprimer' width='20' height='20'/></a>
              </div></td></tr>";
    }
    echo "</table>";
?>