<?php if($_COOKIE['identite'][2] == 'abonne'){ ?>
		<ul id="menuClient">
			<li> <a href="index.php?module=detenues">Videos détenues</a> </li>
			<li> <a href="index.php?module=commande">Vos commandes</a> </li>
			<li> <a href="index.php?module=deconnexion">Déconnexion</a> </li>
		</ul>
<?php }
	elseif($_COOKIE['identite'][2] == 'admin'){ ?>
		<ul id="menuClient">
			<li> <a href="index.php?module=accueilRetour">Retour de cassettes</a> </li>
			<li> <a href="#">Enregistrer de nouveaux abonnés</a> </li>
			<li> <a href="#">Modifier des fiches d'abonnés</a> </li>
			<li> <a href="#">Radier des abonnés</a> </li>
			<li> <a href="index.php?module=deconnexion">Déconnexion</a> </li>
		</ul>
<?php } ?>