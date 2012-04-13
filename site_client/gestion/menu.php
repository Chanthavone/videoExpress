<h1>Menu</h1>
<?php

	//on verifie si le nom et le mot de passe existe
	if(isset($_POST['nom']) || isset($_POST['pass'])){
		$nom = $_POST['nom'];
		$pass = $_POST['pass'];
		$err = false;
		//on verifie la validité du mot de passe
		if(strlen($pass) < 6 || strlen($pass) > 6){
			$err = true;
			$messageErreur = "Le mot de passe doit être de 6 caractéres. <br />";
		}
		//on verifie la validité du nom
		if(!preg_match("#^[A-Z][a-z]{2,29}$#",$nom)){
			$err = true;
			$messageErreur .= "Le nom entré est incorrect. Le nom doit commencer par une majuscule et doit être composé de lettre. <br />";
		}
		
		//Si le nom et le mot de passe sont incorrect, on affiche un message d'erreur.
		if($err){
			echo $messageErreur;
			echo '<a href="index.php?module=index">Retour à la page précédente pour refaire la saisie</a>';
		}
		//sinon, on affiche le menu des opérations disponibles
		else{
			echo '<a href="index.php?module=accueilRetour">Retour de cassettes</a><br />';
			echo '<a href="#">Enregistrer de nouveaux abonnés</a><br />';
			echo '<a href="#">Modifier des fiches d\'abonnés</a><br />';
			echo '<a href="#">Radier des abonnés</a><br />';	
		}
		
	}
	else{
		echo "Le nom ou le mot de passe n'existe pas. Réesseyez s'il vous plait.";
		
	}

?>
