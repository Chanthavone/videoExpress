<div class="titre">
	<h2> <span>Ajout séléction </span> </h2>
</div>
<?php
	$unMois = 2629800;
	if(isset($_COOKIE['selection'])){
		// on incremente de 1 le nombre de film enregistre 
		setcookie("selection[0]", $_COOKIE['selection'][0] + 1,time() + $unMois);
		$num = $_COOKIE["selection"][0] + 1 ;
	}
	else{
		//on initialise à 1 le nombre de film 
		setcookie("selection[0]", 1,time() + $unMois);
		$num = 1;
	}
	
	if(isset($_POST['noFilm'])){
		$numFilm = $_POST['noFilm'];
		setcookie("selection[$num]",$numFilm,time() + $unMois);
		echo '<h3>Film ajouté </h3>';
	}
?>