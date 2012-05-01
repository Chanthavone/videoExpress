<?php
	//Pour avoir la fonction de verification de l'abonne
	include("modele/modeleAbonnes.php");
	//Pour avoir la fonction de verification de l'admin
	include("modele/modeleAdmin.php");
	
	$cookie = false;
	//on verifie si on a un cookie
	if(isset($_COOKIE['identite'])){
		//on initialise les variables
		$nom = $_COOKIE['identite'][0] ; $pass = $_COOKIE['identite'][1]; 
	}
	//sinon on verifie si les elements du formulaire existe
	elseif(isset($_POST['nom']) || isset($_POST['pass'])){
		//on initialise les variables
		$nom = $_POST['nom'] ; $pass = $_POST['pass'];
		$cookie = true;
	}
	else{
		exit("Impossible de se connecter");
	}
	
	//on appelle la fonction de verification de l'abonne et de l'admin
	$existeAbonne = verifAbonnes($nom,$pass);
	$existeAdmin  = verifAdmin($nom,$pass);
	//Si il existe on affiche la page de reference, sinon on affiche un message d'erreur
	if($existeAbonne){
		$statut = 'abonne';
	}
	elseif($existeAdmin){
		$statut = 'admin';
	}
	//si on a pas de cookie
	if($cookie && isset($statut)){
		setcookie("identite[0]", $nom);
		setcookie("identite[1]", $pass);
		setcookie("identite[2]", $statut);
		// On redirige vers la page d'accueil
		header('Location: index.php?module=accueil');
	}
	else {
		// On redirige vers la page d'accueil
		header('Location: index.php?module=accueil');
	}
?>