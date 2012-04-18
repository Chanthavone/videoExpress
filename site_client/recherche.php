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
			echo '<h1>Resultat de la recherche ('.count($recherche).') </h1>';
			echo '<table border="1">';
			echo '<tr><th>Titre</th><th>Genre</th><th>Réalisateur</th></tr>';
			foreach($recherche as $search){
				echo '<tr><td>'.$search['Titre'].'</td><td>'.$search['Genre'].'</td>
				<td>'.$search['Realisateur'].'</td>';
				//Ajout selection
				echo '<form action="index.php?module=ajoutSelection" method="POST">
							<input type="hidden" name="noFilm" value="'.$search["NoFilm"].'" />
							<td><input type="Submit" value="Ajout Selection" /></td></tr>
					</form>';
			}
			echo '</table>';
			
			//Voir selection	
			echo '<form action="index.php?module=voirSelection" method="POST">
				<input type="Submit" value="Voir Selection" />
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