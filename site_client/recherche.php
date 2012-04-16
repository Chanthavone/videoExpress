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
				<td>'.$search['Realisateur'].'</td></tr>';
			}
			echo '</table>';
		}
		else{
			echo '<h1>Aucun Resultat ! </h1>';
		}
	}
	else{
		echo "impossible de faire la recherche";
	}
	//Lien de retour
	echo '<a href="index.php?module=accueilRecherche">Retour</a>';

?>