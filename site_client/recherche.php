<div class="titre">
	<h2> <span>Recherche</span> </h2>
</div>

<?php
	//Pour avoir la fonction de recherche
	include("modele/modeleFilms.php");
	
	//on verifie si les elements du formulaire existe
	if(isset($_POST['titre']) || 	isset($_POST['support']) 		|| 	isset($_POST['disponibilite']) 
	|| isset($_POST['genre']) ||	isset($_POST['realisateur']) 	||	isset($_POST['acteur'])){
	
		//on initialise les variables
		$titre = $_POST['titre'] ; $support		=	$_POST['support']		; $disponibilite 	= $_POST['disponibilite'];
		$genre = $_POST['genre'] ; $realisateur = 	$_POST['realisateur'] 	; $acteur 			= $_POST['acteur'];
		//on appelle la fonction de recherche
		$recherche = rechercheFilm($titre,$support,$disponibilite,$genre,$realisateur,$acteur);
		
		//Si on a des resultats on affiche, sinon on affiche un message d'erreur
		if(count($recherche) > 0){
			echo '<h2 id="titre_rech">Resultat de la recherche ('.count($recherche).') </h2>';
			echo '<div id="liste_film">';
				foreach($recherche as $search){
					echo '<div id="bloc_film">';
						echo '<div id="bloc_film_image">';
							echo '<img src="commun/images/interrogation.png" height="120" width="90" />';
						echo '</div>';
						echo '<div id="bloc_film_descriptif">';
							echo '<h4>'.$search['Titre'].'</h4><br />
								  Genre : <em>'.$search['Genre'].'</em><br />
								  Réalisateur : <em>'.$search['Realisateur'].'</em><br />';
						echo '</div>';
						//Ajout selection
						echo '<div id="bloc_film_selection">';
							echo '<div id="bloc_film_selection_ajout">';
							echo '<td><form action="index.php?module=ajoutSelection" method="post">
										<input type="hidden" name="noFilm" value="'.$search["NoFilm"].'" />
										<input type="submit" class="bouton" value="Ajouter au panier" />
								</form></td></tr>';
					echo '</div></div></div>';
					echo '<hr>';
				}
			echo '</div>';
			
			//Voir selection	
			echo '<form action="index.php?module=voirSelection" method="post">
				<input type="submit" class="bouton" value="Voir Selection" />
				</form>';
		}
		else{
			echo '<h3>Aucun Resultat ! </h3>';
		}
	}
	else{
		echo "<h3>Impossible de faire la recherche</h3>";
	}
	//Lien de retour
	echo '<a href="index.php?module=accueilRecherche">Retour</a>';

?>