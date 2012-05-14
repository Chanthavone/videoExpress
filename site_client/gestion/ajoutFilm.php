<div class="titre">
	<h2> <span>Ajouter un film</span> </h2>
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
			insertFilm($nofilm,$titre,$nationalite,$realisateur,$couleur,$annee,$genre,$duree,htmlspecialchars($synopsis),$url);
			header("Location: index.php?module=gestion&admin=message&mess=ajoutFilmOk");
		}
		else {
			header("Location: index.php?module=gestion&admin=message&mess=ajoutFilmNok");
		}
    }
?>
<!-- Pour avoir la fonction de verification en javascript -->
<script type="text/javascript" src="commun/javascript/verificationFormulaire.js"></script>

<br />
<div id="intro">
	Nous venons de recevoir de nouveaux films?<br />
	Ajoutez le ici! <br />
	<br class="blank" />
</div>

<form action="index.php?module=gestion&admin=ajoutFilm" method="post" id="formAjoutFilm">
    <fieldset class="formulaire">
        <legend>Ajouter un film</legend>
        <label for="nofilm" class="label_recherche">Numéro film</label><input type="text" name="nofilm" id="nofilm"/> <span id="js_nofilm"></span><br />
        <label for="titre" class="label_recherche">Titre</label><input type="text" name="titre" id="titreForm"/> <span id="js_titre"></span><br />
        <label for="nationalite" class="label_recherche">Nationalité</label><input type="text" name="nationalite"/> <br />
        <label for="realisateur" class="label_recherche">Réalisateur</label><input type="text" name="realisateur"/> <br />
        <label for="couleur" class="label_recherche">Couleur</label>
        <select name="couleur">
            <option value="Couleurs">Couleur</option>
            <option value="Noir et Blanc">Noir et blanc</option>
        </select><br />
        <label for="annee" class="label_recherche">Année</label><input type="text" name="annee" id="annee"/> <span id="js_annee"></span><br />
        <label for="genre" class="label_recherche">Genre</label>
        <select name="genre">
        <?php
            $genres = array('Comédie','Comédie dramatique','Drame','Aventure','Documentaire');
            foreach($genres as $genre){
                echo '<option value="'.$genre.'">'.$genre.'</option>';
            }
        ?>
        </select><br />
        <label for="duree" class="label_recherche">Durée</label><input type="text" name="duree" id="duree"/> <span id="js_duree"></span><br />
        <label for="synopsis" class="label_recherche">Synopsis</label>
        <textarea name="synopsis"></textarea> <br />
        <label for="url" class="label_recherche">URL image</label><input type="text" name="url"/> <br />
        <hr>
        <input type="submit" class="bouton" id="submitCenter" value="Ajouter" onClick="ajoutFilm()"/>
    </fieldset>
</form>