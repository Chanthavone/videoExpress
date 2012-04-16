<?php
	//Pour avoir la fonction de verification de l'abonne
	include("modele/modeleAbonnes.php");
	//Pour avoir la fonction de recuperation des emprunts
	include("modele/modeleEmpres.php");
	
	//on verifie si les elements du formulaire existe
	if(isset($_POST['pass'])){
	
		//on initialise les variables
		$pass = $_POST['pass']; $maxEmprunt = 3;
		if(isset($_POST['nom']))
			$nom = $_POST['nom'] ;
		else
			$nom = getNom($pass);
		//on appelle la fonction de verification
		$existeAbonne = verifAbonnes($nom,$pass);
		
		//Si il existe on affiche la page de reference, sinon on affiche un message d'erreur
		if($existeAbonne){
			//on recupere les emprunts et on initialise des variables
			$emprunts = getEmprunts($pass);
			$nbCommande = sizeof($emprunts);
			$nbCommandeRestant = abs($nbCommande - $maxEmprunt) ;
			
			//on affiche le nombre de commande que l'abonne peut passer
			echo '<h2>Nombre de commande restant : '.$nbCommandeRestant.'</h2><br />';
			
			//si le nombre commande restant est positif on affiche un tableau 
			if($nbCommandeRestant > 0 ){
				echo '<form action="index.php?module=confirmeCommande" method="POST">';
					echo '<fieldset>';
						echo '<table border="1">';
						for($i = 1 ; $i <= $nbCommandeRestant ; ++$i){
							echo '<tr><td><label>NumFilm'.$i.' : </label><input type="text" name="numFilm'.$i.'" /></td>
								<td><label>Support'.$i.' : </label><input type="radio" name="support'.$i.'" value="dvd" /><label>DVD</label>
								<input type="radio" name="support'.$i.'" value="vhs" /><label>VHS</label>
								</td></tr>';
						}
						echo '</table>';
						echo '<input type="hidden" name="pass" value="'.$pass.'" />';
						echo '<input type="submit" value="Commander" />';
					echo '</fieldset>';
				echo '</form>';
			}
		}
		else{
			echo "Le nom ou le code de l'abonné est incorrect. Réesseyez !";
		}
	}
	else{
		echo "<h3>Impossible de se connecter</h3>";
	}
	//Lien de retour
	echo '<a href="index.php?module=identificationC">Retour</a>';	

?>