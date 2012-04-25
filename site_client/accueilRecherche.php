<div class="titre">
	<h2> <span>Recherche</span> </h2>
</div>

<?php
//Pour avoir les fonctions retournant les genres, les realisateurs, et les acteurs
include("modele/modeleActeurs.php");
include("modele/modeleFilms.php");
?>

<div id="intro">
	Vous cherchez un films avec des critères précis? <br />
	Cet outil est à votre disposition ; utilisez-le pour obtenir des résultats plus précis et mieux adaptés à votre recherche. <br />
	<br class="blank" />
</div>

<form action="index.php?module=recherche" method="post">
	<fieldset class="formulaire">
		<legend>Recherche avancée</legend>
		<div class="type_recherche">			
			<h3>Recherche par titre : </h3><br />
			<label class="label_recherche">Mots clés : </label><input type="text" name="titre" class="grand_champ"/><br />
			<hr>
		</div>
		
		<div class="type_recherche">
			<h3>Critères de recherche :</h3><br />
			<label class="label_recherche">Support : </label>
			<select name="support" class="petit_champ">
				<option value="null"></option>
				<option value="DVD">DVD</option>
				<option value="VHS">VHS</option>
				<option value="indifférent">Indifférent</option>
			</select><br />
			<label class="label_recherche">Disponibilité : </label>
			<select name="disponibilite" class="petit_champ">
				<option value="null"></option>
				<option value="disponible">Disponible</option>
				<option value="indifférent">Indifférent</option>
			</select><br />
			<label class="label_recherche">Genre : </label>
			<select name="genre" class="petit_champ">
				<option value="null"></option>
				<?php
					$genres = getGenres();
					foreach($genres as $genre){
						echo '<option value="'.$genre.'">'.$genre.'</option>';
					}
				?>
			</select><br />
			<hr>
		</div>
		
		<div class="type_recherche">
			<h3>Recherche par personnalité</h3><br />
			<label class="label_recherche">Nom du réalisateur : </label>
			<select name="realisateur" class="grand_champ">
				<option value="null"></option>
				<?php
					$realisateurs = getRealisateurs();
					foreach($realisateurs as $realisateur){
						echo '<option value="'.$realisateur.'">'.$realisateur.'</option>';
					}
				?>
			</select><br />
			<label class="label_recherche">Nom de l'acteur : </label>
			<select name="acteur" class="grand_champ">
				<option value="null"></option>
				<?php
					$acteurs = getActeurs();
					foreach($acteurs as $acteur){
						echo '<option value="'.$acteur.'">'.$acteur.'</option>';
					}
				?>		
			</select><br />
			<hr>
		</div>
		
		<div id="form_recherche_boutons">
			<input type="reset" class="bouton" id="recherche_reset_bouton" value="Réinitialiser la recherche" />
			<input type="submit" class="bouton" id="recherche_submit_bouton" value="Rechercher" />
		</div>
	</fieldset>
</form>