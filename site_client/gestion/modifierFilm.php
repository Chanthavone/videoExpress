<div class="titre">
	<h2> <span>Modifier un film</span> </h2>
</div>

<?php
    include("modele/modeleFilms.php");
    
    // Si on a soumis le formulaire
    if (isset ($_POST['nofilm'])) {
        // Initialisation des variables
        $nofilm = $_POST['nofilm'];
        $titre = $_POST['titre'];
        $nationalite = $_POST['nationalite'];
        $realisateur = $_POST['realisateur'];
        $couleur = $_POST['couleur'];
        $annee = $_POST['annee'];
        $genre = $_POST['genre'];
        $duree = $_POST['duree'];
        $synopsis = $_POST['synopsis'];
		$url = $_POST['url'];
        
        // Si le formulaire a été correctement rempli, on insère le film dans la bdd sinon message d'erreur
		if (verifInsertionFilm($nofilm,$titre,$annee,$duree)) {
			updateFilm($nofilm,$titre,$nationalite,$realisateur,$couleur,$annee,$genre,$duree,htmlspecialchars($synopsis),$url);
			header("Location: index.php?module=gestion&admin=message&mess=modifierFilmOk");
		}
		else {
			header("Location: index.php?module=gestion&admin=message&mess=modifierFilmNok");
		}
    }
    else {
        $num = $_GET['num'];
        $film = getFilm($num);
    }
?>
<!-- Pour avoir la fonction de verification en javascript -->
<script type="text/javascript" src="commun/javascript/verificationFormulaire.js"></script>

<form action="index.php?module=gestion&admin=modifierFilm" method="post" id="formAjoutFilm">
    <fieldset class="formulaire">
        <legend>Modifier le film</legend>
        <label for="nofilm" class="label_recherche">Numéro film</label><input type="text" name="nofilm" id="nofilm" value="<?php echo $film['NoFilm']; ?>"/> <span id="js_nofilm"></span><br />
        <label for="titre" class="label_recherche">Titre</label><input type="text" name="titre" id="titreForm" value="<?php echo $film['Titre']; ?>"/> <span id="js_titre"></span><br />
        <label for="nationalite" class="label_recherche">Nationalité</label><input type="text" name="nationalite" value="<?php echo $film['Nationalite']; ?>"/> <br />
        <label for="realisateur" class="label_recherche">Réalisateur</label><input type="text" name="realisateur" value="<?php echo $film['Realisateur']; ?>"/> <br />
        <label for="couleur" class="label_recherche">Couleur</label>
        <select name="couleur">
            <option <?php echo ($film['Couleur'] == "Couleurs")?"selected":"";?> value="Couleurs">Couleur</option>
            <option <?php echo ($film['Couleur'] == "Noir et Blanc")?"selected":"";?> value="Noir et Blanc">Noir et blanc</option>
        </select><br />
        <label for="annee" class="label_recherche">Année</label><input type="text" name="annee" id="annee" value="<?php echo $film['Annee']; ?>"/> <span id="js_annee"></span><br />
        <label for="genre" class="label_recherche">Genre</label>
        <select name="genre">
            <?php
                $genres = getGenres();
                foreach($genres as $genre){
                    if ($genre == $film['Genre']) {
                        echo '<option selected value="'.$genre.'">'.$genre.'</option>';
                    }
                    else {
                        echo '<option value="'.$genre.'">'.$genre.'</option>';
                    }
                }
            ?>
        </select><br />
        <label for="duree" class="label_recherche">Durée</label><input type="text" name="duree" id="duree" value="<?php echo $film['Duree']; ?>"/> <span id="js_duree"></span><br />
        <label for="synopsis" class="label_recherche">Synopsis</label>
        <textarea name="synopsis"><?php echo $film['Synopsis']; ?></textarea> <br />
        <label for="url" class="label_recherche">URL image</label><input type="text" name="url" value="<?php echo $film['Image']; ?>"/> <br />
        <hr>
        <input type="submit" class="bouton" id="submitCenter" value="Modifier" onClick="ajoutFilm()"/>
    </fieldset>
</form>