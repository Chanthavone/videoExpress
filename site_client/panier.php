<!-- Pour avoir la fonction de verification en javascript -->
<script type="text/javascript" src="commun/javascript/verificationFormulaire.js"></script>
<form id="formPanier" action="index.php?module=commande" method="post"> <!-- index.php?module=confirmePanier -->
<?php
	//Pour avoir la fonction de recherche de titre
	require_once("modele/modeleFilms.php");
	//Pour avoir la fonction de recuperation des emprunts
	require_once("modele/modeleEmpres.php");
	
	echo '<div id="contenu_panier">';
	if(isset($_COOKIE['selection']) && $_COOKIE['selection'][0]!=0)
		echo 'Vos articles ajoutés : </br>';
	else
		echo 'Aucun article ajouté </br>';
	
	//si le cookie est defini ou nbfilms != 0
	if(isset($_COOKIE['selection']) && $_COOKIE['selection'][0]!=0){
		for($i = 1 ; $i <= $_COOKIE['selection'][0] ; ++$i){
            $infosFilm = unserialize($_COOKIE['selection'][$i]);
			$numFilm = $infosFilm[0]; $support = $infosFilm[1] ;
			echo '<a href="index.php?module=descriptif&numFilm='.$numFilm.'">'.getTitre($numFilm).'('.$support.')</a>
				<a href="index.php?module=suppCookie&numFilm='.$numFilm.'"><img src="commun/images/corbeille.gif" /></a><br />';
			echo '<input type="hidden" name="numFilm'.$i.'" value="'.$numFilm.'" />';
		}
		if(isset($_COOKIE['identite'][1]))
			echo '<input type="hidden" name="pass" value="'.$_COOKIE['identite'][1].'" />';
	}
	echo '</div>';

?>
<br />
<script>var error=false ;</script>
<div id="option_panier">
	<div id="option_panier_gauche">
		<!-- Lien du détail du panier -->
		<a href="index.php?module=voirSelection">Détails du panier</a><br />
		<!-- Lien vider selection -->
		<a href="index.php?module=viderSelection">Vider le panier</a><br />
	</div>
	<div id="option_panier_droite">
        <input type="hidden" name="commandePanier"/>
		<input type="submit" class="bouton" value="Commander" onClick="panier(error)"/>
	</div>
</form>
	<br />
   
<?php
	if(isset($_COOKIE['identite'])){	
		$nbCommande = getNbEmprunts($_COOKIE['identite'][1]);
		$nbCommandeRestant = abs($nbCommande - 3);
	}
	else
		$nbCommandeRestant = 0;
	if(!isset($_COOKIE['identite']) && isset($_COOKIE['selection']) && $_COOKIE['selection'][0] <> 0){ //si on est pas connecté
		echo "<label id='message_js'><img border='0' src='commun/images/warning.png' /> Vous devez être connecté pour commander";
		?><script>error=true ;</script><?php
	}
	elseif(isset($_COOKIE['selection']) && $_COOKIE['selection'][0] == 0){
		?><script>error=true ;</script><?php
	}
	elseif($nbCommandeRestant == 0 && isset($_COOKIE['identite'])){	
		echo "<label id='message_js'><img border='0' src='commun/images/warning.png' /> Vous ne pouvez pas commander, car vous détenez déjà 3 cassettes";
		?><script>error=true ;</script><?php
	}
	elseif(isset($_COOKIE['selection']) && $nbCommandeRestant < $_COOKIE['selection'][0]){ //si notre panier est superieur au nombre de commandes restantes	
		echo "<label id='message_js'><img border='0' src='commun/images/warning.png' /> Vous avez trop de commande, donc pas de commande";
		?><script>error=true ;</script><?php
	}
?>
</div>