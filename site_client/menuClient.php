<?php if($_COOKIE['identite'][2] == 'abonne'){ ?>
		<ul id="menuClient">
			<li> <a href="index.php?module=detenues">Videos détenues</a> </li>
			<li> <a href="index.php?module=commande">Commander un film</a> </li>
			<li> <a href="index.php?module=deconnexion">Déconnexion</a> </li>
		</ul>
<?php }
	elseif($_COOKIE['identite'][2] == 'admin'){ ?>
		<ul id="menuClient">
			<li><a href="index.php?module=gestion&admin=accueilRetour">Retour de cassettes</a></li>
			<li><a href="index.php?module=gestion&admin=ajoutAbonne">Ajouter un abonné</a></li>
			<li><a href="index.php?module=gestion&admin=listeAbonnes">Liste de abonnés</a></li>
			<li><a href="index.php?module=gestion&admin=ajoutFilm">Ajouter un film</a></li>
            <li><a href="index.php?module=gestion&admin=listeFilms">Liste des films</a></li>
            <li><a href="index.php?module=deconnexion">Déconnexion</a></li>
		</ul>
<?php } ?>