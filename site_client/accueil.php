<div class="titre">
	<h2> <span>Accueil</span> </h2>
</div>

<div id="div_accueil" align="center">
    <br />
    VideoExpress est un site de location de films.<br />
    Vous y trouverez tous les films que vous cherchez; que ce soit les films d'aventure, de drame ou
    bien une comédie, vous y trouverez votre bonheur!
    Louez-les et gardez les DVD et VHS aussi longtemps que vous le voulez!
    <br /><br />
    
    <h3>Derniers films ajoutés</h3><br />
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
