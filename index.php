<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<!--<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=ISO-8859-1">-->
		<link href="commun/styles/style.css" rel="stylesheet" type="text/css" />
		<!--<link rel="icon" type="image/png" href="commun/images/favicon.ico" />-->
		<script src="commun/javascript/jquery-1.5.2.min.js"></script>
        <script src="commun/javascript/slides.min.jquery.js"></script>
        <script src="commun/javascript/fonction.js"></script>
		<title><?php echo isset($_GET['module']) ? $_GET['module'] : 'Accueil';?> </title>
	</head>
	
	<body>
		<?php
			include("commun/librairies/outils.inc");
			banniere("","Chanthavone & Diallo");
		?>
		<div id="conteneur_general">
			<div id="conteneur_droite">
				<?php
					if(!isset ($_GET['module']) || $_GET['module'] == "accueil") {
						require("site_client/slides.php");	
					}
				?>
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
							
							case "gestion" :
								require("site_client/gestion/index.php");
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
							
							case "deconnexion" :
								require("site_client/deconnexion.php");
							break;
							
							case "suppCookie" :
								require("site_client/suppCookie.php");
							break;
							
							default:
								require("site_client/accueil.php");	
							break;
						}

					?>
					<br class="blank" />
				</div>
			</div>
			<div id="conteneur_gauche">
				<div id="conteneur_identification" class="conteneur">
					<div class="titre2">
						<h2> <span> <?php echo (isset($_COOKIE['identite'])) ? 'Menu Client' : 'Identification';?> </span> </h2>
					</div>
					<?php
						if(isset($_COOKIE['identite']))
							require("site_client/menuClient.php");
						else
							require("site_client/identification.php");
					?>
					<br class="blank" />
				</div>
				<div id="conteneur_panier" class="conteneur">
					<div class="titre2">
						<h2> <span> Votre Panier</span> </h2>
					</div>
					<?php
						require("site_client/panier.php");
					?>
					<br class="blank" />					
				</div>
				<div id="conteneur_pub">
				</div>
				<br class="blank" />
			</div>
			<br class="blank" />
		</div>
		<div id="footer">
			<div id="footer_texte">
				Copyright © Université Pierre et Marie Curie - Paris VI .  Tous droits réservés.
			</div>
		</div>
	</body>
</html>