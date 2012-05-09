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
            $nbFilms = $_COOKIE['selection'][0];
            $numFilmSupp = $noFilm;
            
            //on copie les numeros sauf le numero du film a supprimer
            for($i = 1 ; $i <= $nbFilms ; ++$i){
                $infosFilm = unserialize($_COOKIE['selection'][$i]);
                $numFilm = $infosFilm[0];
                if($numFilmSupp <> $numFilm){
                    $infoFilm = array($numFilm,$infosFilm[1]);
                    setcookie("selection[$j]",serialize($infoFilm));
                    $j++;
                }
            }
            //ajuste le nombre total de film
            setcookie("selection[0]", $j - 1);
			
			echo 'Commende bien effectuée ! ';
				
			//Lien de retour
			echo '<a href="index.php?module=commande">Retour</a>';
		}
	}

?>