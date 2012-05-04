<?php
    include("modele/modeleAbonnes.php");
    
    if (isset ($_POST['nom'])) {
        insertAbonne(
        $_POST['code'],
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['rue'],
        $_POST['codepostal'],
        $_POST['ville'],
        $_POST['batiment'],
        $_POST['etage'],
        $_POST['digicode'],
        $_POST['telephone'],
        $_POST['email'],
        $_POST['banque'],
        $_POST['guichet'],
        $_POST['compte']
        );
    }
?>

<div class="titre">
	<h2> <span>Ajouter un abonne</span> </h2>
</div>

<form action="index.php?module=gestion&admin=ajoutAbonne" method="post">
    <fieldset class="formulaire">
        <legend>Ajouter un abonné</legend>
        <label for="code" class="label_recherche">Code abonné</label><input type="text" name="code"/> <br />
        <label for="nom" class="label_recherche">Nom</label><input type="text" name="nom"/> <br />
        <label for="prenom" class="label_recherche">Prénom</label><input type="text" name="prenom"/> <br />
        <label for="rue" class="label_recherche">Rue</label><input type="text" name="rue"/> <br />
        <label for="codepostal" class="label_recherche">Code postal</label><input type="text" name="codepostal"/> <br />
        <label for="ville" class="label_recherche">Ville</label><input type="text" name="ville"/> <br />
        <label for="batiment" class="label_recherche">Batiment</label><input type="text" name="batiment"/> <br />
        <label for="etage" class="label_recherche">Etage</label><input type="text" name="etage"/> <br />
        <label for="digicode" class="label_recherche">Digicode</label><input type="text" name="digicode"/> <br />
        <label for="telephone" class="label_recherche">Téléphone</label><input type="text" name="telephone"/> <br />
        <label for="email" class="label_recherche">Email</label><input type="text" name="email"/> <br />
        <label for="banque" class="label_recherche">Banque</label><input type="text" name="banque"/> <br />
        <label for="guichet" class="label_recherche">Guichet</label><input type="text" name="guichet"/> <br />
        <label for="compte" class="label_recherche">Compte</label><input type="text" name="compte"/> <br />
        <input type="submit" class="bouton" value="Ajouter"/>
    </fieldset>
</form>