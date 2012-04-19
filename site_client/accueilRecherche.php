<div class="titre">
	<h2> <span>Recherche</span> </h2>
</div>

<?php
//Pour avoir les fonctions retournant les genres, les realisateurs, et les acteurs
include("modele/modeleActeurs.php");
include("modele/modeleFilms.php");
?>

<form action="index.php?module=recherche" method="POST">
	<fieldset>
		<label>Titre : </label><input type="text" name="titre" /><br />
		<label>Support : </label>
		<select name="support" >
			<option value="null"></option>
			<option value="DVD">DVD</option>
			<option value="VHS">VHS</option>
			<option value="indifférent">Indifférent</option>
		</select><br />
		<label>Disponibilité : </label>
		<select name="disponibilite" >
			<option value="null"></option>
			<option value="disponible">Disponible</option>
			<option value="indifférent">Indifférent</option>
		</select><br />
		<label>Genre : </label>
		<select name="genre" >
			<option value="null"></option>
			<?php
				$genres = getGenres();
				foreach($genres as $genre){
					echo '<option value="'.$genre.'">'.$genre.'</option>';
				}
			?>
		</select><br />
		<label>Nom du réalisateur : </label>
		<select name="realisateur">
			<option value="null"></option>
			<?php
				$realisateurs = getRealisateurs();
				foreach($realisateurs as $realisateur){
					echo '<option value="'.$realisateur.'">'.$realisateur.'</option>';
				}
			?>
		</select><br />
		<label>Nom de l'acteur : </label>
		<select name="acteur">
			<option value="null"></option>
			<?php
				$acteurs = getActeurs();
				foreach($acteurs as $acteur){
					echo '<option value="'.$acteur.'">'.$acteur.'</option>';
				}
			?>		
		</select><br />
		<input type="reset" value="Réinitialiser la recherche" />
		<input type="submit" value="Rechercher" />
	</fieldset>
</form>