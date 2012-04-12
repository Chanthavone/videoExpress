<h1>Menu</h1>
<?php

	if(isset($_POST['nom']) && isset($_POST['pass'])){ // Pour l'instant comme on a pas de base de donnes
		echo "salut";
		
	}
	else{
		echo "Pas Bon !";
		echo '<meta http-equiv="refresh" content="3; URL=index?module=index" />';
	}

?>
