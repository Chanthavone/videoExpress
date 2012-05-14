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
	
	$nbFilms = $_COOKIE['selection'][0];$unMois = 2629800;
	for($i = 1 ; $i <= 3 ; $i++){

		if(isset($_POST['numFilm'.$i.''])){
			//on initialise les variables
			$noFilm = $_POST['numFilm'.$i.''] ; $codeAbonne = $_POST['pass'];
            $noExemplaire = $_POST['ex'.$i.''];

			//MAJ du statut de la cassette
			majStatut($noFilm,$noExemplaire,'empruntee');
			
			//MAJ de NbCassette de l'emprunteur
			majNbCassettes($codeAbonne,'+1');
			
			//on supprime l'emprunt reservee
			deleteEmpRes($noFilm,$noExemplaire);
			
			//On insert l'emprunt de la cassette
			insertEmpRes($noFilm,$noExemplaire,$codeAbonne);
            
			//si on commmande par le biais du panier, on supprime le cookie
            //on initialise les variables
            $j = 1;
            
            $numFilmSupp = $noFilm;
            $existeCookie = false;
            //on copie les numeros sauf le numero du film a supprimer
            if($nbFilms > 1){
				for($k = 1 ; $k <= $nbFilms ; ++$k){
					$infosFilm = unserialize($_COOKIE['selection'][$k]);
					$numFilm = $infosFilm[0];        
					if($numFilmSupp <> $numFilm){			
						$filmInfo = array($numFilm,$infosFilm[1]);
						setcookie("selection[$j]",serialize($filmInfo));
						$j++;
						$existeCookie = true;
					}
				}
			}
			else{
				setcookie("selection[1]","");
				$existeCookie = true;
			}	
            //ajuste le nombre total de film
			if($existeCookie && $nbFilms > 0){
				$nbFilms--;
				setcookie("selection[0]", $nbFilms,time() + $unMois);
				
			}

		}
	}
	echo '<h3>Commande bien effectuée ! </h3>';
	header('Refresh: 1;URL=index.php?module=accueil');
	//Lien de retour
	//echo '<a href="index.php?module=commande">Retour</a>';
?>
