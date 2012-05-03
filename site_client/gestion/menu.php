<div class="titre">
	<h2> <span>Menu</span> </h2>
</div>

<?php
	//Pour avoir la fonction de verification de l'abonne
	include("modele/modeleAbonnes.php");
	
	//on verifie si le nom et le mot de passe existe
	if(isset($_POST['nom']) || isset($_POST['pass'])){
		$nom = $_POST['nom'];
		$pass = $_POST['pass'];
		$err = false;
		$messageErreur="";
		//on verifie la validité du mot de passe
		if(strlen($pass) < 6 || strlen($pass) > 6){
			$err = true;
			$messageErreur .= "Le mot de passe doit être de 6 caractéres. <br />";
		}
		//on verifie la validité du nom
		if(!preg_match("#^[A-Z][a-z]{2,29}$#",$nom) && !$err){
			$err = true;
			$messageErreur .= "Le nom entré est incorrect. Le nom doit commencer par une majuscule et doit être composé de lettre. <br />";
		}
		//on appelle la fonction de verification
		$existeAbonne = verifAbonnes($nom,$pass);
		//on verifie l'existance de l'abonne
		if(!$existeAbonne && !$err){
			$err = true;
			$messageErreur .= "L'abonné n'existe pas . <br />";			
		}
		
		//Si le nom et le mot de passe sont incorrect, on affiche un message d'erreur.
		if($err){
			echo $messageErreur;
			echo '<a href="index.php?module=index">Retour à la page précédente pour refaire la saisie</a>';
		}
		//sinon, on affiche le menu des opérations disponibles
		else{
			echo '<a href="index.php?module=gestion&admin=accueilRetour">Retour de cassettes</a><br />';
			echo '<a href="index.php?module=gestion&admin=ajoutAbonne">Ajouter un abonné</a><br />';
			echo '<a href="index.php?module=gestion&admin=listeAbonne">Liste de abonnés</a><br />';
			echo '<a href="index.php?module=gestion&admin=ajoutFilm">Ajouter un film</a><br />';
            echo '<a href="index.php?module=gestion&admin=listeFilms">Liste des films</a><br />';            
		}
		
	}
	else{
		echo "Le nom ou le mot de passe n'existe pas. Réesseyez s'il vous plait.";
		
	}

?>
