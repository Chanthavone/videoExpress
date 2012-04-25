<!-- Pour avoir la fonction check en javascript -->
<script type="text/javascript" src="commun/javascript/confirmecommande.js"></script>
<div class="titre">
	<h2> <span>Confirmation commande</span> </h2>
</div>
<?php
	//Pour avoir la fonction de recuperation des emprunts
	include("modele/modeleEmpres.php");
	//Pour avoir la fonction de recuperation des titres et des realisateurs
	include("modele/modeleFilms.php");
	//Pour avoir la fonction de disponibilite d'une cassette
	include("modele/modeleCassettes.php");
	
	//on verifie qu'il y'a pas de reservation valable depuis plus de 5 minutes
	reservationValable();
	 
	$max = 3; $pass = $_POST['pass'];
	echo '<form action="index.php?module=executeCommande" method="post">';
		//on affiche un tableau
		echo '<table border="1">';
			echo '<tr><td>Numéro film</td><td>Titre</td><td>Disponibilité</td><td>Commander ?</td></tr>';
			//pour chaque commande
			for($i = 1 ; $i <= $max ; ++$i){
				if(isset($_POST['support'.$i.'']) && $_POST["numFilm$i"] <> "" ){
					//on recupere le film commande
					$film = getfilm($_POST["numFilm$i"]);
					
					//on initialise les variables
					$noFilm = $film['NoFilm'];$support = $_POST["support$i"];
					$disponiblite = getDisponibilite($noFilm,$support,$pass);
					if($disponiblite == 'oui'){
						$check = 'checked="checked"';
					}
					elseif($disponiblite <> 'non'){ 
						$support = $disponiblite;
						$check = '';
					}
					else{
						$check = 'DISABLED';
					}
					$noExemplaire = getNoExemplaire($noFilm,$support,$pass);
					//on affiche une ligne tableau
					echo '<tr><td>'.$film['NoFilm'].'</td>
						<td>'.$film['Titre'].'</td>
						<td>'.$disponiblite.'</td>
						<td><input type="checkbox" '.$check.' name="numFilm'.$i.'" value="'.$noFilm.'" onchange="check()"/>
						<input type="hidden" name="ex'.$i.'" value="'.$noExemplaire.'" /></td></tr>';
					//on met le statut à reservee et on ajoute dans la table EMPRES
					majStatut($noFilm,$noExemplaire,'reservee');
					insertEmpRes($noFilm,$noExemplaire,$pass);
				}
			}
		echo '</table>';
		echo '<input type="hidden" name="pass" value="'.$pass.'" />';
		echo '<input type="submit" id="commander" value="Commander"/><label id="aucun_film"></label>';
	echo '</form>';
	//on affiche le second formulaire
	echo '<form action="index.php?module=commande" method="post">
		<input type="hidden" name="pass" value="'.$pass.'" />
		<input type="submit" value="Revoir le choix"/>
		</form>';

?>
<script type="text/javascript">
	//lors du chargment de la page
	window.onload = check();
</script>