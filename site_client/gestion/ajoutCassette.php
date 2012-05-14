<div class="titre">
	<h2> <span>Ajouter une cassette</span> </h2>
</div>

<?php
    include("modele/modeleCassettes.php");
    include("modele/modeleFilms.php");
    
    // Si le formulaire a été posté
    if (isset ($_POST['nofilm'])) {
        // Initialisation des variables
        $nofilm = $_POST['nofilm'];
        
        // Si le film existe
        if(getFilm($nofilm)) {
            // On récupère le dernier numéro d'exemplaire et on l'incrémente de 1
            $exemplaire = getLastNoExemplaire($nofilm) + 1;
            // On insère la cassette dans la bbd
            insertCassette($nofilm,$exemplaire,$_POST['support']);
            header("Location: index.php?module=gestion&admin=message&mess=ajoutCassetteOk");
        }
        else {
            header("Location: index.php?module=gestion&admin=message&mess=ajoutCassetteNok");
        }
    }
?>

<br />
<div id="intro">
	Nous venons de recevoir de nouvelles cassettes?<br />
	Ajoutez les ici! <br />
	<br class="blank" />
</div>

<form action="index.php?module=gestion&admin=ajoutCassette" method="post" id="formAjoutCassette">
    <fieldset class="formulaire">
        <legend>Ajouter une cassette</legend>
        <label for="nofilm" class="label_recherche">Numéro film</label><input type="text" name="nofilm" id="nofilm"/><br />
        <label for="support" class="label_recherche">Support</label>
        <select name="support">
            <option value="DVD">DVD</option>
            <option value="VHS">VHS</option>
        </select>
        <input type="submit" class="bouton" id="submitCenter" value="Ajouter"/>
    </fieldset>
</form>