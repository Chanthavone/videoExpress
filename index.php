﻿<?php
	include("commun/librairies/outils.inc");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<!--<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=ISO-8859-1">-->
		<link href="commun/styles/style.css" rel="stylesheet" type="text/css" />
		<link rel="icon" type="image/png" href="images/favicon.jpg" />
		<title><?php echo $_GET['module'];?> </title>
	</head>
	
	<body>
		<?php
			banniere("VideoExpress","Chanthavone et Diallo");
		?>
		<div id="conteneur_general">
			<div id="conteneur_principal" class="conteneur">
				<?php
					// Désactivation des magic_quotes_gpc
					ini_set('magic_quotes_gpc', 0);

					// Connexion à la base de données
					$serv = db_connect();

					if (isset ($_GET['module'])){
						$module = $_GET['module'];
					}
					else { 
						$module = 'accueil';
					}

					switch($module){
					
						case "accueil" : 
							require("site_client/accueil.php");	
						break;
						
						case "accueilDescriptif" : 
							require("site_client/accueilDescriptif.php");	
						break;

						case "accueilRecherche" : 
							require("site_client/accueilRecherche.php");	
						break;
						
						case "recherche" : 
							require("site_client/recherche.php");	
						break;
						
						case "identificationD" : 
							if(isset($_COOKIE['identite']))
								require("site_client/detenues.php");	
							else
								require("site_client/identificationD.php");
						break;
						
						case "identificationC" : 
							if(isset($_COOKIE['identite']))
								require("site_client/commande.php");
							else
								require("site_client/identificationC.php");	
						break;
						
						case "descriptif" :
							require("site_client/descriptif.php");
						break;

						case "commande" :
							require("site_client/commande.php");
						break;

						case "confirmeCommande" :
							require("site_client/confirmeCommande.php");
						break;
						
						case "executeCommande" :
							require("site_client/executeCommande.php");
						break;
						
						case "detenues" :
							require("site_client/detenues.php");
						break;
						
						case "index" :
							require("site_client/gestion/index.htm");
						break;
						
						case "menu" :
							require("site_client/gestion/menu.php");
						break;
						
						case "accueilRetour" :
							require("site_client/gestion/accueilRetour.php");
						break;
						
						case "retour" :
							require("site_client/gestion/retour.php");
						break;
						
						case "ajoutSelection" :
							require("site_client/ajoutSelection.php");
						break;

						case "voirSelection" :
							require("site_client/voirSelection.php");
						break;

						case "suppSelection" :
							require("site_client/suppSelection.php");
						break;

						case "viderSelection" :
							require("site_client/viderSelection.php");
						break;
						
						case "connexion" :
							require("site_client/connexion.php");
						break;
						
						default:
							require("site_client/accueil.php");	
						break;
					}

				?>
			</div>
			<div id="conteneur_gauche">
				<div id="conteneur_identification" class="conteneur">
					<?php
						if(isset($_COOKIE['identite']))
							require("site_client/menuClient.php");	
						else
							require("site_client/identification.php");
					?>
				</div>
				<div id="conteneur_panier" class="conteneur">
					<h1>Panier ici</h1>
				</div>
			</div>
		</div>
		<div id="footer">
			<div id="footer_texte">
				Copyright © Université Pierre et Marie Curie - Paris VI .  Tous droits réservés.
			</div>
		</div>
	</body>
</html>