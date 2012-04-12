<?php
	include("commun/librairies/outils.inc");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="commun/styles/style.css" rel="stylesheet" type="text/css" />
		<link rel="icon" type="image/png" href="images/favicon.jpg" />
		<title></title>
	</head>
	
	<body>
		<?php
			banniere("VideoExpress","Chanthavone et Diallo");
		?>
		<div id="conteneur_general">
			<?php
				// Désactivation des magic_quotes_gpc
				ini_set('magic_quotes_gpc', 0);

				// Connexion à la base de données
				mysql_connect("localhost", "root", "") or die("erreur de connexion BD");
				mysql_select_db("video82") or die("erreur: " . "video82");
				
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
					
					case "accueildescriptif" : 
						require("site_client/accueilDescriptif.php");	
					break;
					
					case "recherche" : 
						require("site_client/recherche.php");	
					break;
					
					case "identificationD" : 
						require("site_client/identificationD.php");	
					break;
					
					case "identificationC" : 
						require("site_client/identificationC.php");	
					break;
					
					case "descriptif" :
						require("site_client/descriptif.php");
					break;

					case "commande" :
						require("site_client/commande.php");
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
									
					default:
						require("site_client/accueil.php");	
					break;
				}

			?>
		</div>
		<div id="footer">
			<div id="footer_texte">
				Copyright © Université Pierre et Marie Curie - Paris VI .  Tous droits réservés.
			</div>
		</div>
	</body>
</html>
