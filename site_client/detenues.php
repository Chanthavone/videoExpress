<div class="titre">
	<h2> <span>Cassettes détenues</span> </h2>
</div>

<?php
	//Pour avoir la fonction de verification de l'abonne
	include("modele/modeleAbonnes.php");
	//Pour avoir la fonction de recuperation des emprunts
	include("modele/modeleEmpres.php");
	//Pour avoir la fonction de recuperation des titres et des realisateurs
	include("modele/modeleFilms.php");
	
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
	//on appelle la fonction de verification
	$existeAbonne = verifAbonnes($nom,$pass);
	
	//Si il existe on affiche la page de reference, sinon on affiche un message d'erreur
	if($existeAbonne){
		//si on a pas de cookie
		if($cookie){
			setcookie("identite[0]", $nom);
			setcookie("identite[1]", $pass);
		}	
		//on recupere les emprunts
		$emprunts = getEmprunts($pass);
		//si il en a on affiche, sinon on affiche un message
		if(getNbEmprunts($pass)>0){
			echo '<table border="1">';
			foreach($emprunts as $emprunt){
				echo '<tr><td>Numéro d\'exemplaire : '.$emprunt['NoExemplaire'].'<br />
					Numéro de film : '.$emprunt['NoFilm'].'<br />
					Titre : '.getTitre($emprunt['NoFilm']).'<br />
					Réalisateur : '.getRealisateur($emprunt['NoFilm']).'<br />
					Date d\'emprunt : '.$emprunt['d'].'<br />
					</td></tr>';
			}
			echo '</table>';
		}
		else{
			echo 'Aucun Emprunt ';
		}
	}
	else{
		echo "Le nom ou le code de l'abonné est incorrect. Réesseyez !";
	}
	//Lien de retour
	if($cookie)
		echo '<a href="index.php?module=identificationD">Retour</a>';
	else
		echo '<a href="index.php?module=accueil">Retour</a>';

?>