<!-- Pour avoir la fonction de verification en javascript -->
<script type="text/javascript" src="commun/javascript/verificationFormulaire.js"></script>

<div class="titre">
	<h2> <span>Descriptif</span> </h2>
</div>

<form id="formDescriptif" action="index.php?module=descriptif" method="post">
	<fieldset>
		<label>Numéro de film : </label><input type="text" id="numFilm" name="numFilm" onblur="purge(this)"/><label id="numFilm_js"></label><br />
		<input type="submit" value="Envoyer" onClick="accueilDescriptif()" />
	</fieldset>
</form>
