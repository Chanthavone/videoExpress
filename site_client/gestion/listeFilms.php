<div class="titre">
	<h2> <span>Liste des films</span> </h2>
</div>

<?php
    // Appel de la page contenant les fonction de recherche de films
    include("modele/modeleFilms.php");
    
    // Initialisation des variables
    $color = true;
    // On recherche tous les films ainsi que leurs informations
    $abonnes = getListeFilms();
    
    // On affiche un tableau contenant tous les films et leurs informations
    
    echo "<table id='tableListeFilms' class='tableColor'>";
    echo "<tr><th>Numéro</th><th>Titre</th><th>Realisateur</th><th>Genre</th><th>Annee</th><th>Options</th></tr>";
    // Pour chaque film, on affiche ses informations sur une ligne
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
        echo "<tr class='$classcolor'><td>".$k['NoFilm']."</td><td>".$k['Titre']."</td>
              <td>".$k['Realisateur']."</td><td>".$k['Genre']."</td>
              <td>".$k['Annee']."</td>
              <td><div id='options'><a href='index.php?module=gestion&admin=detailsFilm&num=".$k['NoFilm']."' title='Voir les détails'><img src='commun/images/loupe.png' alt='Détails' width='20' height='20'/></a>
              <a href='#' title='Modifier'><img src='commun/images/crayon.png' alt='Modifier' width='20' height='20'/></a>
              <a href='index.php?module=gestion&admin=supprimerFilm&num=".$k['NoFilm']."' title='Supprimer' onclick=\"return(confirm('Voulez-vous vraiment supprimer ce film?')); \"><img src='commun/images/corbeille.gif' alt='Supprimer' width='20' height='20'/></a>
              </div></td></tr>";
    }
    echo "</table>";
?>