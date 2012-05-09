<div class='titre'>
	<h2> <span>Détails du panier</span> </h2>
</div>
<?php
	//Pour avoir la fonction de recherche de titre
	include("modele/modeleFilms.php");
	
    $color = true;
    echo "<br /><div id='intro'>
        Voici le récapitulatif de votre panier. <br />
        Il présente tous les films que vous avez sélectionné. <br />
        <br class='blank' />
    </div>";
    
	//si le cookie n'est pas defini ou nbfilms = 0
	if(!isset($_COOKIE['selection']) || $_COOKIE['selection'][0]==0){
		echo '<h3> Aucun film séléctioné </h3>';
	}
	else{
		echo '<form action="index.php?module=suppSelection" method="post">';
			echo '<table class="tableColor">';
				echo '<tr><th>Numéro de film</th><th>Titre</th><th>Support</th><th>Selection</th></tr>';
				for($i = 1 ; $i <= $_COOKIE['selection'][0] ; ++$i){
                
                    // On alterne la couleur de lignes
                    if ($color == true) {
                        $classcolor = "classblue";
                        $color = false;
                    }
                    else {
                        $classcolor = "classwhite";
                        $color = true;
                    }
                    
                    $infosFilm = unserialize($_COOKIE['selection'][$i]);
                    $numFilm = $infosFilm[0] ; $support = $infosFilm[1] ;
					echo '<tr class="'.$classcolor.'"><td>'.$numFilm .'</td><td>'.getTitre($numFilm).'</td><td>'.$support.'</td>
					<td><input type="checkbox" name="case'.$i.'" /></td></tr>';
				}
			echo '</table><br />';
            echo '<div id="form_recherche_boutons">';
                echo '<a href="index.php?module=viderSelection"><input type="button" class="bouton" id="recherche_reset_bouton" value="Vider le panier"/></a>';
                echo '<input type="submit" class="bouton" id="recherche_submit_bouton" value="Supprimer" />';
            echo '</div>';
		echo '</form>';
	}

?>