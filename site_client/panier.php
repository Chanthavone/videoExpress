<?php
	//Pour avoir la fonction de recherche de titre
	require_once("modele/modeleFilms.php");
	
	echo '<div id="contenu_panier">';
	echo 'Vos articles ajout�s : </br>';
	
	//si le cookie n'est pas defini ou nbfilms = 0
	if(isset($_COOKIE['selection']) && $_COOKIE['selection'][0]!=0){
			for($i = 1 ; $i <= $_COOKIE['selection'][0] ; ++$i){
				echo '<a href="#">'.getTitre($_COOKIE['selection'][$i]).'</a><br />';
			}
	}
	
	echo '</div>';

?>
<br />
<div id="option_panier">
	<div id="option_panier_gauche">
		<!-- Lien du d�tail du panier -->
		<a href="index.php?module=voirSelection">D�tails du panier</a><br />
		<!-- Lien vider selection -->
		<a href="index.php?module=viderSelection">Vider le panier</a><br />
	</div>
	<div id="option_panier_droite">
		<input type="button" class="bouton" value="Commander">
	</div>
</div>