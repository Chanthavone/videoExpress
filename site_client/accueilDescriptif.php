<!-- Pour avoir la fonction de verification en javascript -->
<script type="text/javascript" src="commun/javascript/verificationFormulaire.js"></script>

<div class="titre">
	<h2> <span>Descriptif</span> </h2>
</div>
<br/>

<div id="intro">
	Vous voulez les détails d'un film précis? <br />
	Entrez le numéro du film que vous voulez consulter afin d'en avoir les détails!<br />
	<br class="blank" />
</div>

<form id="formDescriptif" action="index.php?module=descriptif" method="post">
	<fieldset class="formulaire">
		<legend>Recherche par numéro</legend> <br />
		<label class="label_recherche">Numéro de film : </label><input type="text" id="numFilm" name="numFilm" onblur="purge(this)"/><label id="numFilm_js"></label><br />
		<input type="submit" class="bouton" id="form_descriptif_submit" value="Envoyer" onClick="accueilDescriptif()" />
	</fieldset>
</form>
