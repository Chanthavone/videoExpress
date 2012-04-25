<div class='titre'>
	<h2> <span>Détails du panier</span> </h2>
</div>
<?php
	//Pour avoir la fonction de recherche de titre
	include("modele/modeleFilms.php");
	
	//si le cookie n'est pas defini ou nbfilms = 0
	if(!isset($_COOKIE['selection']) || $_COOKIE['selection'][0]==0){
		echo '<h3> Aucun film séléctioné </h3>';
	}
	else{
		echo '<form action="index.php?module=suppSelection" method="post">';
			echo '<table>';
				echo '<tr><th>Numéro de film</th><th>Titre</th><th>Selection</th></tr>';
				for($i = 1 ; $i <= $_COOKIE['selection'][0] ; ++$i){
					echo '<tr><td>'.$_COOKIE['selection'][$i].'</td><td>'.getTitre($_COOKIE['selection'][$i]).'</td>
					<td><input type="checkbox" name="case'.$i.'" /></td></tr>';
				}
			echo '</table>';
			echo '<input type="submit" value="Supprimer" />';
		echo '</form>';
		echo '<form action="index.php?module=viderSelection" method="post">
			<input type="submit" value="ViderSelection" />
			</form>';
	}

?>