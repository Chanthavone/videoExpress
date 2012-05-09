<div class="titre">
	<h2> <span>Vider séléction </span> </h2>
</div>
<?php
	//met à 0 le nombre de films stocké en selection[0]
	$nbCookie = $_COOKIE['selection'][0];
	setcookie('selection[0]',0);
	
	//transforme le cookie selection en cookie temporaire
	for($i = 1 ; $i <= $nbCookie ; ++$i){
		setcookie ("selection[$i]", "", 0);
	}
?>