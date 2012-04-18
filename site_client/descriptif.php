<?php
	//Pour avoir la fonction de recherche
	include("modele/modeleFilms.php");
	//pour avoir les acteurs de film
	include("modele/modeleActeurs.php");
	
	//on verifie si les elements du formulaire existe
	if(isset($_POST['numFilm']) && preg_match("#[0-9]+$#",$_POST['numFilm'])){
	
		//on initialise la variable
		$numFilm = $_POST['numFilm'] ;
		//on appelle la fonction qui permet de trouver un film selon son numero
		$film = getFilm($numFilm);
		
		//Si on a trouve le film, on affiche ces caracteristiques
		if(count($film) > 1){
			echo '<h1>Descriptif du film</h1>';
			echo '<table border="1">';
				echo '<tr><td>Numéro du film </td><td>'.$film["NoFilm"].'</td></tr>
					<tr><td>Titre </td><td>'.$film["Titre"].'</td></tr>
					<tr><td>Nationalité </td><td>'.$film["Nationalite"].'</td></tr>
					<tr><td>Réalisateur </td><td>'.$film["Realisateur"].'</td></tr>
					<tr><td>Année de production </td><td>'.$film["Annee"].'</td></tr>
					<tr><td>Couleur </td><td>'.$film["Couleur"].'</td></tr>
					<tr><td>Durée </td><td>'.$film["Duree"].'</td></tr>
					<tr><td>Résumé </td><td>'.$film["Synopsis"].'</td></tr>
					<tr><td>Genre </td><td>'.$film["Genre"].'</td></tr>
					<tr><td>Liste des principaux acteurs </td><td>'.getActeursFilm($numFilm).'</td></tr>
				';
			echo '</table>';
			//Ajout selection
			echo '<form action="index.php?module=ajoutSelection" method="POST">
				<input type="hidden" name="noFilm" value="'.$film["NoFilm"].'" />
				<input type="Submit" value="Ajout Selection" />
				</form>';
			//Voir selection	
			echo '<form action="index.php?module=voirSelection" method="POST">
				<input type="Submit" value="Voir Selection" />
				</form>';
		}
		else{
			echo '<h1>Le numéro '.$numFilm.' n\'existe pas !</h1>';
		}
	}
	else{
		echo "<h3>Numéro de film incorrect !</h3>";
	}
	//Lien de retour
	echo '<a href="index.php?module=accueilDescriptif">Retour</a>';

?>