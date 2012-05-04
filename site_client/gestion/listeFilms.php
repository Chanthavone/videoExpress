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
    
    echo "<table id='tableListeFilms'>";
    echo "<tr><th>Numéro</th><th>Titre</th><th>Realisateur</th><th>Genre</th><th>Annee</th></tr>";
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
              <td>".$k['Annee']."</td></tr>";
    }
    echo "</table>";
?>