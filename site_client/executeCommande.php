<div class="titre">
	<h2> <span>Exécution de la commande</span> </h2>
</div>
<?php
	//Pour avoir la fonction de Maj de Nombre de cassette d'un abonne
	include("modele/modeleAbonnes.php");
	//Pour avoir la fonction de MAJ des cassettes
	include("modele/modeleCassettes.php");
	//Pour avoir la fonction de MAJ des emprunts
	include("modele/modeleEmpres.php");
	
	for($i = 1 ; $i <= 3 ; ++$i){
		if(isset($_POST['numFilm'.$i.''])){
			//on initialise les variables
			$noFilm = $_POST['numFilm'.$i.''] ; $codeAbonne = $_POST['pass'];
			//Soit on est passé par le formulaire de commande ou de panier
			if(isset($_POST['ex'.$i.'']))
				$noExemplaire = $_POST['ex'.$i.''];
			else{
				$support = $_POST["support$i"];
				$noExemplaire = getNoExemplaire($noFilm,$support,$codeAbonne);
			}
			echo 'On initialise les variables <br />';
			
			//MAJ du statut de la cassette
			majStatut($noFilm,$noExemplaire,'empruntee');
			echo 'MAJ du statut de la cassette <br />';
			
			//MAJ de NbCassette de l'emprunteur
			majNbCassettes($codeAbonne,'+1');
			echo 'MAJ de NbCassette de l\'emprunteur <br />';
			
			//on supprime l'emprunt reservee
			deleteEmpRes($noFilm,$noExemplaire);
			echo 'On supprime l\'emprunt reservee <br />';
			
			//On insert l'emprunt de la cassette
			insertEmpRes($noFilm,$noExemplaire,$codeAbonne);
			echo 'On insert l\'emprunt de la cassette <br />';
			//si on commmande par le biais du panier, on supprime le cookie
			if(isset($_POST['panier'])){
				//on initialise les variables
				$j = 1;
				$nbFilms = $_COOKIE['selection'][0];
				$numFilmSupp = $noFilm;
				
				//on copie les numeros sauf le numero du film a supprimer
				for($i = 1 ; $i <= $nbFilms ; ++$i){
					$numFilm = $_COOKIE['selection'][$i];
					if($numFilmSupp <> $numFilm){	
						setcookie("selection[$j]",$numFilm);
						$j++;
					}
				}
				//ajuste le nombre total de film
				setcookie("selection[0]", $j - 1);
			}
			
			echo 'Commende bien effectué ! ';
				
			//Lien de retour
			echo '<a href="index.php?module=commande">Retour</a>';
		}
	}

?>