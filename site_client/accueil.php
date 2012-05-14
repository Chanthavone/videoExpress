<div class="titre">
	<h2> <span>Accueil</span> </h2>
</div>

<div align="center">
	<?php
		//Pour avoir la fonction de recuperation des titres et des realisateurs
		include("modele/modeleFilms.php");
		$films = getListeFilms() ;
		$nbFilms = count($films); $nbAAfficher = $nbFilms - 5;
		for($i = $nbFilms - 1 ; $i > $nbAAfficher ; $i--){
			//On récupère l'image du film
			$image = getImage($films[$i]['NoFilm']);
			$titre = $films[$i]["Titre"];
			echo '<a href="index.php?module=descriptif&numFilm='.$films[$i]['NoFilm'].'" ><img src="commun/images/films/'.$image.'" alt="'.$titre.'" title="'.$titre.'" width="148" height="198" /></a>   ';
		}
	?>
	
</div>
