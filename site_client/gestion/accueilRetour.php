<!-- Pour avoir la fonction de verification en javascript -->
<script type="text/javascript" src="commun/javascript/verificationFormulaire.js"></script>
<h1>Accueil retour</h1>

<form id="formRetour" action="index.php?module=retour" method="post">
	<fieldset>
		<label>Numéro de film : </label><input type="text" name="numFilm" id="numFilm" onblur="purge(this)"/><label id="numFilm_js"></label><br />
		<label>Numéro d'exemplaire de la cassette : </label><input type="text" name="numExemplaire" id="numExemplaire" onblur="purge(this)"/><label id="numExemplaire_js"></label><br />
		<input type="submit" value="Envoyer" onClick="accueilRetour()"/>
	</fieldset>
</form>