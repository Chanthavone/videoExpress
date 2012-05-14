<?php
    include("modele/modeleAbonnes.php");
    
	// Si le formulaire a été soumis
    if (isset ($_POST['nom'])) {
		
		// Initialisation des variables
		$code = $_POST['code'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $rue = $_POST['rue'];
        $codepostal = $_POST['codepostal'];
        $ville = $_POST['ville'];
        $batiment = (!empty($_POST['batiment'])) ? $_POST['batiment'] : NULL;
        $etage = (!empty($_POST['etage'])) ? $_POST['etage'] : NULL;
        $digicode = (!empty($_POST['digicode'])) ? $_POST['digicode'] : NULL;
        $telephone = (!empty($_POST['telephone'])) ? $_POST['telephone'] : NULL;
        $email = (!empty($_POST['email'])) ? $_POST['email'] : NULL;
        $banque = $_POST['banque'];
        $guichet = $_POST['guichet'];
        $compte = $_POST['compte'];
		
		// Si le formulaire a été correctement rempli, on insère l'abonné dans la bdd sinon message d'erreur
		if (verifInsertionAbonne($code,$nom,$prenom,$rue,$codepostal,$ville,$batiment,$etage,$digicode,$telephone,$email,$banque,$guichet,$compte)) {
			insertAbonne($code,$nom,$prenom,$rue,$codepostal,$ville,$batiment,$etage,$digicode,$telephone,$email,$banque,$guichet,$compte);
			header("Location: index.php?module=gestion&admin=message&mess=ajoutAboOk");
		}
		else {
			header("Location: index.php?module=gestion&admin=message&mess=ajoutAboNok");
		}
    }
?>
<!-- Pour avoir la fonction de verification en javascript -->
<script type="text/javascript" src="commun/javascript/verificationFormulaire.js"></script>

<div class="titre">
	<h2> <span>Ajouter un abonne</span> </h2>
</div>

<br />
<div id="intro">
	Un client s'est abonné à VideoExpress?<br />
	Ajoutez le à nos abonnés en entrant ses informations ici! <br />
	<br class="blank" />
</div>

<form id="formAjoutAbonne" action="index.php?module=gestion&admin=ajoutAbonne" method="post">
    <fieldset class="formulaire">
        <legend>Ajouter un abonné</legend>
		<div class="type_recherche">
			<h3>Identité de l'abonné</h3><br />
			<label for="code" class="label_recherche">Code abonné</label><input type="text" name="code" id="code"/> <label id="js_code"></label><br />
			<label for="nom" class="label_recherche">Nom</label><input type="text" name="nom" id="nom"/> <label id="js_nom"></label><br />
			<label for="prenom" class="label_recherche">Prénom</label><input type="text" name="prenom" id="prenom"/> <label id="js_prenom"></label><br />
			<hr>
		</div>
		
		<div class="type_recherche">
			<h3>Adresse</h3><br />
			<label for="rue" class="label_recherche">Rue</label><input type="text" name="rue" id="rue"/> <span id="js_rue"></span><br />
			<label for="codepostal" class="label_recherche">Code postal</label><input type="text" name="codepostal" id="codepostal"/> <span id="js_codepostal"></span><br />
			<label for="ville" class="label_recherche">Ville</label><input type="text" name="ville" id="ville"/> <span id="js_ville"></span><br />
			<label for="batiment" class="label_recherche">Batiment</label><input type="text" name="batiment" id="batiment"/> <span id="js_batiment"></span><br />
			<label for="etage" class="label_recherche">Etage</label><input type="text" name="etage" id="etage"/> <span id="js_etage"></span><br />
			<label for="digicode" class="label_recherche">Digicode</label><input type="text" name="digicode" id="digicode"/> <span id="js_digicode"></span><br />
			<label for="telephone" class="label_recherche">Téléphone</label><input type="text" name="telephone" id="telephone"/> <span id="js_telephone"></span><br />
			<label for="email" class="label_recherche">Email</label><input type="text" name="email" id="email"/> <span id="js_email"></span><br />
			<hr>
		</div>
		
		<div class="type_recherche">
			<h3>Coordonnées banquaires</h3><br />
			<label for="banque" class="label_recherche">Banque</label><input type="text" name="banque" id="banque"/> <span id="js_banque"></span><br />
			<label for="guichet" class="label_recherche">Guichet</label><input type="text" name="guichet" id="guichet"/> <span id="js_guichet"></span><br />
			<label for="compte" class="label_recherche">Compte</label><input type="text" name="compte" id="compte"/> <span id="js_compte"></span><br />
			<hr>
		</div>
        <input type="submit" class="bouton" id="submitCenter" value="Ajouter" onClick="ajoutAbonne()"/>
    </fieldset>
</form>