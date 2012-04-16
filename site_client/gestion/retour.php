<?php
	//Pour avoir la fonction de Maj de Nombre de cassette d'un abonne
	include("modele/modeleAbonnes.php");
	//Pour avoir la fonction de MAJ des cassettes
	include("modele/modeleCassettes.php");
	//Pour avoir la fonction de MAJ des emprunts
	include("modele/modeleEmpres.php");
	
	//on verifie si les elements du formulaire existe
	if(isset($_POST['numFilm']) || isset($_POST['numExemplaire'])){
	
		//on initialise les variables
		$noFilm = $_POST['numFilm'] ; $noExemplaire = $_POST['numExemplaire']; 
		echo 'on initialise les variables <br />';
		
		//MAJ du statut de la cassette
		majStatut($noFilm,$noExemplaire,'disponible');
		echo 'MAJ du statut de la cassette <br />';
		
		//On recupere le codeAbonne de l'emprunteur
		$codeAbonne = getCodeAbonne($noFilm,$noExemplaire);
		echo 'On recupere le codeAbonne de l\'emprunteur <br />';
		
		//MAJ de NbCassette de l'emprunteur
		majNbCassettes($codeAbonne,'-1');
		echo 'MAJ de NbCassette de l\'emprunteur <br />';
		
		//On supprime l'emprunt de la cassette
		deleteEmpRes($noFilm,$noExemplaire);
		echo 'On supprime l\'emprunt de la cassette <br />';
		
		echo 'Retour bien effectué ! ';
	}
	else{
		echo "impossible de retourner la cassette";
	}
	//Lien de retour
	echo '<a href="index.php?module=accueilRetour">Retour</a>';	

?>