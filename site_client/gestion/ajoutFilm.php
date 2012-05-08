<div class="titre">
	<h2> <span>Ajouter un film</span> </h2>
</div>

<?php
    include("modele/modeleFilms.php");
    
    if (isset ($_POST['nofilm'])) {
        insertFilm(
        $_POST['nofilm'],
        $_POST['titre'],
        $_POST['nationalite'],
        $_POST['realisateur'],
        $_POST['couleur'],
        $_POST['annee'],
        $_POST['genre'],
        $_POST['duree'],
        $_POST['synopsis'],
		$_POST['url']
        );
    }
?>

<form action="index.php?module=gestion&admin=ajoutFilm" method="post">
    <fieldset class="formulaire">
        <legend>Ajouter un film</legend>
        <label for="nofilm" class="label_recherche">Numéro film</label><input type="text" name="nofilm"/> <br />
        <label for="titre" class="label_recherche">Titre</label><input type="text" name="titre"/> <br />
        <label for="nationalite" class="label_recherche">Nationalité</label><input type="text" name="nationalite"/> <br />
        <label for="realisateur" class="label_recherche">Réalisateur</label><input type="text" name="realisateur"/> <br />
        <label for="couleur" class="label_recherche">Couleur</label><input type="text" name="couleur"/> <br />
        <label for="annee" class="label_recherche">Année</label><input type="text" name="annee"/> <br />
        <label for="genre" class="label_recherche">Genre</label><input type="text" name="genre"/> <br />
        <label for="duree" class="label_recherche">Durée</label><input type="text" name="duree"/> <br />
        <label for="synopsis" class="label_recherche">Synopsis</label><input type="text" name="synopsis"/> <br />
        <label for="url" class="label_recherche">URL image</label><input type="text" name="url"/> <br />
        <input type="submit" class="bouton" value="Ajouter"/>
    </fieldset>
</form>