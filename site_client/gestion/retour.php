<div class="titre">
	<h2> <span>Retour de cassette</span> </h2>
</div>

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
		$noFilm = $_POST['numFilm'] ;
		$noExemplaire = $_POST['numExemplaire']; 
		
		//On recupere le codeAbonne de l'emprunteur
		$codeAbonne = getCodeAbonne($noFilm,$noExemplaire);
		
		if (cassetteReservee($noFilm,$noExemplaire,$codeAbonne)) {
			//MAJ du statut de la cassette
			majStatut($noFilm,$noExemplaire,'disponible');
			
			//MAJ de NbCassette de l'emprunteur
			majNbCassettes($codeAbonne,'-1');
			
			//On supprime l'emprunt de la cassette
			deleteEmpRes($noFilm,$noExemplaire);
			
			header("Location: index.php?module=gestion&admin=message&mess=retourOk");
		}
		else {
			header("Location: index.php?module=gestion&admin=message&mess=retourNok");
		}
	}
	else{
		header("Location: index.php?module=gestion&admin=message&mess=retourImpossible");
	}
	//Lien de retour
	echo '<a href="index.php?module=gestion&admin=accueilRetour">Retour</a>';	

?>