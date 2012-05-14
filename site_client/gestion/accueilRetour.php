<!-- Pour avoir la fonction de verification en javascript -->
<script type="text/javascript" src="commun/javascript/verificationFormulaire.js"></script>

<div class="titre">
	<h2> <span>Retour de cassette</span> </h2>
</div>

<br />
<div id="intro">
	Un abonné vous a retourné un film?<br />
	Entrez les identifiants de ce film pour mettre à jour notre base de données! <br />
	<br class="blank" />
</div>

<form id="formRetour" action="index.php?module=gestion&admin=retour" method="post">
	<fieldset class="formulaire">
		<legend>Retour de cassette</legend>
		<label class="label_recherche">Numéro de film : </label><input type="text" name="numFilm" id="numFilm" onblur="purge(this)"/><label id="numFilm_js"></label><br />
		<label class="label_recherche">Numéro exemplaire : </label><input type="text" name="numExemplaire" id="numExemplaire" onblur="purge(this)"/><label id="numExemplaire_js"></label><br />
		<input type="submit" class="bouton" id="submitConnexion" value="Envoyer" onClick="accueilRetour()"/>
	</fieldset>
</form>
