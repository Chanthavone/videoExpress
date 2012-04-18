<h1>Confirmation commande</h1>
<!-- Pour avoir la fonction check en javascript -->
<script type="text/javascript" src="commun/javascript/confirmecommande.js"></script>
<?php
	//Pour avoir la fonction de recuperation des emprunts
	include("modele/modeleEmpres.php");
	//Pour avoir la fonction de recuperation des titres et des realisateurs
	include("modele/modeleFilms.php");
	//Pour avoir la fonction de disponibilite d'une cassette
	include("modele/modeleCassettes.php");
	 
	$max = 3;
	echo '<form action="index.php?module=executeCommande" method="POST">';
		//on affiche un tableau
		echo '<table border="1">';
			echo '<tr><td>Numéro film</td><td>Titre</td><td>Disponibilité</td><td>Commander ?</td></tr>';
			//pour chaque commande
			for($i = 1 ; $i <= $max ; ++$i){
				if(isset($_POST['support'.$i.''])){
					//on recupere le film commande
					$film = getfilm($_POST["numFilm$i"]);
					
					//on initialise les variables
					$noFilm = $film['NoFilm'];$support = $_POST["support$i"];$pass = $_POST['pass'];
					$disponiblite = getDisponibilite($noFilm,$support);
					if($disponiblite == 'oui'){
						$check = 'checked="yes"';
					}
					elseif($disponiblite <> 'non'){ 
						$support = $disponiblite;
						$check = '';
					}
					else{
						$check = 'DISABLED';
					}
					$noExemplaire = getNoExemplaire($noFilm,$support);
					//on affiche une ligne tableau
					echo '<tr><td>'.$film['NoFilm'].'</td>
						<td>'.$film['Titre'].'</td>
						<td>'.$disponiblite.'</td>
						<td><input type="checkbox" '.$check.' name="numFilm'.$i.'" value="'.$noFilm.'" onchange="check()"/></td>
						<input type="hidden" name="ex'.$i.'" value="'.$noExemplaire.'" /></tr>';
					//on met le statut à reservee
					//if($check == 'checked="yes"') majStatut($noFilm,$noExemplaire,'reservee');
				}
			}
		echo '</table>';
		echo '<input type="hidden" name="pass" value="'.$pass.'" />';
		echo '<input type="submit" id="commander" value="Commander"/><label id="aucun_film"></label>';
	echo '</form>';
	//on affiche le second formulaire
	echo '<form action="index.php?module=commande" method="POST">
		<input type="hidden" name="pass" value="'.$pass.'" />
		<input type="submit" value="Revoir le choix"/>
		</form>';

?>
<script type="text/javascript">
	//lors du chargment de la page
	window.onload = check();
</script>