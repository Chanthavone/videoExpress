<!-- Pour avoir la fonction de verification en javascript -->
<script type="text/javascript" src="commun/javascript/verificationFormulaire.js"></script>
<form id="formIdentification" action="index.php?module=connexion" method="post">
	<fieldset>
		<label>Nom de l'abonné : </label><input type="text" name="nom" onblur="purge(this)" value="Belmi"/><label id="nom_js"></label><br />
		<label>Numéro de l'abonné : </label><input type="text" name="pass" onblur="purge(this)" value="4367Xs" /><label id="pass_js"></label><br />
		<input type="submit" value="Envoyer" onClick="identification()" />
	</fieldset>
</form>
