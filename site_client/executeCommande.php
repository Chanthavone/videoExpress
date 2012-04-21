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
			$noFilm = $_POST['numFilm'.$i.''] ; $noExemplaire = $_POST['ex'.$i.'']; $codeAbonne = $_POST['pass'];
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
			
			echo 'Commende bien effectué ! ';
				
			//Lien de retour
			echo '<a href="index.php?module=commande">Retour</a>';
		}
	}

?>