<h1>Voir séléction</h1>
<?php
	//Pour avoir la fonction de recherche de titre
	include("modele/modeleFilms.php");
	
	//si le cookie n'est pas defini ou nbfilms = 0
	if(!isset($_COOKIE['selection']) || $_COOKIE['selection'][0]==0){
		echo '<h3> Aucun film séléctioné </h3>';
	}
	else{
		echo '<form action="index.php?module=suppSelection" method="POST">';
			echo '<table>';
				echo '<tr><th>Numéro de film</th><th>Titre</th><th>Selection</th></tr>';
				for($i = 1 ; $i <= $_COOKIE['selection'][0] ; ++$i){
					echo '<tr><td>'.$_COOKIE['selection'][$i].'</td><td>'.getTitre($_COOKIE['selection'][$i]).'</td>
					<td><input type="checkbox" name="case'.$i.'" /></td></tr>';
				}
			echo '</table>';
			echo '<input type="Submit" value="Supprimer" />';
		echo '</form>';
		echo '<form action="index.php?module=viderSelection" method="POST">
			<input type="Submit" value="ViderSelection" />
			</form>';
	}

?>