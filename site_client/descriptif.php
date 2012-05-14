<div class="titre">
	<h2> <span>Descriptif du film</span> </h2>
</div>
<?php
	//Pour avoir la fonction de recherche
	include("modele/modeleFilms.php");
	//pour avoir les acteurs de film
	include("modele/modeleActeurs.php");
	
	//on verifie si les elements du formulaire existe
	if(isset($_POST['numFilm']) || isset($_GET['numFilm'])){
	
		//on initialise la variable
		if(isset($_POST['numFilm']))
			$numFilm = $_POST['numFilm'] ;
		else
			$numFilm = $_GET['numFilm'];
		if(preg_match("#[0-9]+$#",$numFilm)){
			//on appelle la fonction qui permet de trouver un film selon son numero
			$film = getFilm($numFilm);
			
			//Si on a trouve le film, on affiche ces caracteristiques
			if(count($film) > 1){
				echo '<div id="descriptif_film">';
					echo '<div id="descriptif_film_image">';
						echo '<img src="commun/images/films/'.$film["Image"].'" height="190" width="150" />';
					echo '</div>';
					echo '<div id="descriptif_film_descriptif">';
						echo '<h3>'.$film["Titre"].'</h3><br />';
						echo '<h4 class="intitule">Avec : </h4><em>'.getActeursFilm($numFilm).'</em><br />';
						echo '<h4 class="intitule">Réalisateur : </h4><em>'.$film["Realisateur"].'</em><br />';
						echo '<h4 class="intitule">Genre : </h4><em>'.$film["Genre"].'</em><br />';
						echo '<h4 class="intitule">Durée : </h4><em>'.$film["Duree"].'</em><br />';
						echo '<h4 class="intitule">Année : </h4><em>'.$film["Annee"].'</em><br />';
						echo '<h4 class="intitule">Nationalité : </h4><em>'.$film["Nationalite"].'</em><br />';
						echo '<h4 class="intitule">Couleur : </h4><em>'.$film["Couleur"].'</em><br />';
					echo '</div>';
					echo '<div id="descriptif_film_ajout">';
						//Ajout selection
						echo '<form action="index.php?module=ajoutSelection" method="post">
							<input type="hidden" name="noFilm" value="'.$film["NoFilm"].'" />
							<div id="div_vhs">
                                <img src="commun/images/vhs.jpg" height="30" widht="50">
                                <input type="submit" name="VHS" class="bouton" id="submitVhs" value="Ajouter" />
                            </div>
                            <hr>
                            <div id="div_dvd">
                                <img src="commun/images/dvd.jpg" height="40" widht="50">
                                <input type="submit" name="DVD" class="bouton" id="submitDvd" value="Ajouter" />
                            </div>
							</form>
							<br />';
					echo '</div>';
					echo '<div id="descriptif_film_resume">';
						echo '<h4 class="intitule">Résumé : </h4><br />';
						echo $film["Synopsis"].'<br />';
					echo '</div>';
				echo '</div>';
			}
			else{
				echo '<br />Le numéro '.$numFilm.' n\'existe pas ! <br/><br/>';
			}
		}
		else{
			echo "Numéro de film incorrect ! <br/>";
		}
	}
	else{
		echo "Impossible d'avoir le descriptif !<br/>";
	}
	//Lien de retour
	echo '<a href="javascript:history.go(-1)">Retour</a>';

?>