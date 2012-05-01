<?php
	//on verifie si on a un cookie
	if (isset ($_COOKIE['identite'])){
		// On supprime le cookie
		setcookie("identite[0]","");
		setcookie("identite[1]","");
		setcookie("identite[2]","");		
	}
	
	// On redirige vers la page d'accueil
	header('Location: index.php?module=accueil');
?>