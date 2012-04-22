<h1>Supprimer séléction </h1>
<?php
	
	if(count($_POST)>0){
		$j = 1;
		$nbFilms = $_COOKIE['selection'][0];
		//copie les numeros dont la case n'a pas ete coche
		for($i = 1 ; $i <= $nbFilms ; ++$i){
			if(!isset($_POST['case'.$i])){
				$numFilm = $_COOKIE['selection'][$i];
				setcookie("selection[$j]",$numFilm);
				$j++;
			}
		}
		//ajuste le nombre total de film
		setcookie("selection[0]", $j - 1);
		//affiche le nombre de film supprimé
		$nbFilmSupprime = $nbFilms - ($j - 1);
		echo '<h3>Nombre de films supprimés = '.$nbFilmSupprime.'</h3>';	
	}
	else{
		echo '<h3>Aucun film séléctionné</h3>';
	}
	//Voir selection	
	echo '<form action="index.php?module=voirSelection" method="post">
	<input type="submit" value="Voir Selection" />
	</form>';	
?>