<?php
	//Pour avoir la fonction de verification de l'abonne
	include("modele/modeleAbonnes.php");
	//Pour avoir la fonction de recuperation des emprunts
	include("modele/modeleEmpres.php");
	//Pour avoir la fonction de recuperation des titres et des realisateurs
	include("modele/modeleFilms.php");
	
	//on verifie si on a cookie
	//on verifie si les elements du formulaire existe
	if(isset($_POST['nom']) || isset($_POST['pass'])){
	
		//on initialise les variables
		$nom = $_POST['nom'] ; $pass	= $_POST['pass']; 
		//on appelle la fonction de verification
		$existeAbonne = verifAbonnes($nom,$pass);
		
		//Si il existe on affiche la page de reference, sinon on affiche un message d'erreur
		if($existeAbonne){
			//on recupere les emprunts
			$emprunts = getEmprunts($pass);
			//si il en a on affiche, sinon on affiche un message
			if(sizeof($emprunts)>1){
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
	}
	else{
		echo "impossible de se connecter";
	}
	//Lien de retour
	echo '<a href="index.php?module=identificationD">Retour</a>';	

?>