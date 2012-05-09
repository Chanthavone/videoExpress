<?php
	//on initialise les variables
	$j = 1;
	$nbFilms = $_COOKIE['selection'][0];
	$numFilmSupp = $_GET['numFilm'];
	
	//on copie les numeros sauf le numero du film a supprimer
	for($i = 1 ; $i <= $nbFilms ; ++$i){
        $infosFilm = unserialize($_COOKIE['selection'][$i]);
        $numFilm = $infosFilm[0];
		if($numFilmSupp <> $numFilm){
            $infoFilm = array($numFilm,$infosFilm[1]);
			setcookie("selection[$j]",serialize($infoFilm));
			$j++;
		}
	}
	//ajuste le nombre total de film
	setcookie("selection[0]", $j - 1);
	// On redirige vers la page d'accueil
	header('Location: index.php?module=accueil');

?>