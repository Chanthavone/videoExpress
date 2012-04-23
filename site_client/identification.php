<!-- Pour avoir la fonction de verification en javascript -->
<script type="text/javascript" src="commun/javascript/verificationFormulaire.js"></script>
<form id="formIdentification" action="index.php?module=connexion" method="post">
	<label class="label_id" for="nom">Identifiant : </label><input type="text" name="nom" onblur="purge(this)" value="Belmi" size=10/><label id="nom_js"></label><br />
	<label class="label_id" for="pass">Numéro : </label><input type="text" name="pass" onblur="purge(this)" value="4367Xs" size=10/><label id="pass_js"></label><br />
	<input type="submit" value="Connexion" class="bouton" id ="bouton_id" onClick="identification()" />
</form>
