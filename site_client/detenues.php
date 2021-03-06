<div class="titre">
	<h2> <span>Cassettes détenues</span> </h2>
</div>

<?php
	//Pour avoir la fonction de verification de l'admin
	include("modele/modeleAdmin.php");
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
		header("Location: index.php?module=identificationD");
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
			echo '<div id="liste_film">';
				foreach($emprunts as $emprunt){
					//On récupère l'image du film
					$image = getImage($emprunt['NoFilm']);
					echo '<div id="bloc_film">';
						echo '<div id="bloc_film_image">';
							echo '<img src="commun/images/films/'.$image.'" height="120" width="90" />';
						echo '</div>';
						echo '<div id="bloc_film_descriptif">';
							echo '<h4><a>'.getTitre($emprunt['NoFilm']).'</a></h4><br />
								Réalisateur : <em>'.getRealisateur($emprunt['NoFilm']).'</em><br />
								Date d\'emprunt : <em>'.$emprunt['d'].'</em><br />
								Numéro d\'exemplaire : <em>'.$emprunt['NoExemplaire'].'</em><br />
								Numéro de film : <em>'.$emprunt['NoFilm'].'</em><br />';							
						echo '</div>';
					echo '</div>';
					echo '<hr />';
				}
			echo '</div>';
		}
		else{
			echo '<h3>Aucun Emprunt</h3>';
		}
	}
	else{
		$existeAdmin  = verifAdmin($nom,$pass);
		if($existeAdmin)
			echo "<br />Vous êtes connecté en tant que administrateur. Vous ne pouvez donc pas consulter de cassettes detenues.<br />";
		else
			echo "<br />Le nom ou le code de l'abonné est incorrect. Réesseyez !<br /><br />";
	}
	//Lien de retour
	echo '<br /><a href="javascript:history.go(-1)">Retour</a>';

?>