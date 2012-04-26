<div class="titre">
	<h2> <span>Confirmation du panier</span> </h2>
</div>
<?php
	//Pour avoir la fonction de recuperation des emprunts
	include("modele/modeleEmpres.php");
	//Pour avoir la fonction de recuperation des titres et des realisateurs
	include("modele/modeleFilms.php");
	 
	$max = 3; $pass = $_POST['pass'];
	echo '<form action="index.php?module=executeCommande" method="post">';
		//on affiche un tableau
		echo '<table border="1">';
			echo '<tr><th>Numéro film</th><th>Titre</th><th>Support</th></tr>';
			//pour chaque commande
			for($i = 1 ; $i <= $max ; ++$i){
				if(isset($_POST["numFilm$i"])){
					//on recupere le film commande
					$film = getfilm($_POST["numFilm$i"]);
					
					//on initialise les variables
					$noFilm = $film['NoFilm'];
					//on affiche une ligne tableau
					echo '<tr><td>'.$film['NoFilm'].'</td>
						<td>'.$film['Titre'].'</td>
						<td><input type="radio" name="support'.$i.'" value="dvd" /><label>DVD</label>
						<input type="radio" name="support'.$i.'" value="vhs" /><label>VHS</label></td>
						<td><input type="hidden" name="numFilm'.$i.'" value="'.$noFilm.'" /></td></tr>';
				}
			}
		echo '</table>';
		echo '<input type="hidden" name="pass" value="'.$pass.'" />';
		echo '<input type="submit" name="panier" id="commander" value="Commander"/><label id="aucun_film"></label>';
	echo '</form>';

?>