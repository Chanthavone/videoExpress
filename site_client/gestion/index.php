<?php
    //Pour avoir la fonction de verification de l'admin
	include("modele/modeleAdmin.php");
    
    if(isset($_COOKIE['identite'])){
		//on initialise les variables
		$nom = $_COOKIE['identite'][0] ;
        $pass = $_COOKIE['identite'][1]; 
	}
    else {
        //Si on est pas identifié on donne de identifiants vides pour avoir la page d'identification
        $nom = '';
        $pass = '';
    }
    
    $existeAdmin  = verifAdmin($nom,$pass);
    
    if ($existeAdmin) {
        $admin = $_GET['admin'];
        switch($admin){
            case "menu" :
                require("site_client/gestion/menu.php");
            break;
            
            case "accueilRetour" :
                require("site_client/gestion/accueilRetour.php");
            break;
            
            case "ajoutAbonne" :
                require("site_client/gestion/ajoutAbonne.php");
            break;
            
            case "listeAbonnes" :
                require("site_client/gestion/listeAbonnes.php");
            break;
            
            case "ajoutFilm" :
                require("site_client/gestion/ajoutFilm.php");
            break;
            
            case "listeFilms" :
                require("site_client/gestion/listeFilms.php");
            break;
            
            case "supprimerAbonne" :
                require("site_client/gestion/supprimerAbonne.php");
            break;
            
            case "supprimerFilm" :
                require("site_client/gestion/supprimerFilm.php");
            break;
            
            case "detailsFilm" :
                require("site_client/gestion/detailsFilm.php");
            break;
            
            case "detailsAbonne" :
                require("site_client/gestion/detailsAbonne.php");
            break;
			
			case "modifierFilm" :
                require("site_client/gestion/modifierFilm.php");
            break;
            
            case "modifierAbonne" :
                require("site_client/gestion/modifierAbonne.php");
            break;
            
            case "ajoutCassette" :
                require("site_client/gestion/ajoutCassette.php");
            break;
			
			case "message" :
				require("site_client/gestion/message.php");
			break;
            
            case "retour" :
                require("site_client/gestion/retour.php");
            break;
            
            default :
                require("site_client/gestion/menu.php");	
            break;
        }
    }
    else {
?>

<!-- Pour avoir la fonction de verification en javascript -->
<script type="text/javascript" src="commun/javascript/verificationFormulaire.js"></script>

<div class="titre">
	<h2> <span>Identification administrateur</span> </h2>
</div>

<form id="formIdentification" action="index.php?module=menu" method="post">
	<fieldset class="formulaire">
		<legend>Identification</legend>
		<label class="label_recherche">Administrateur : </label><input type="text" name="nom" onblur="purge(this)" value="Belmi"/><label id="nom_js"></label><br />
		<label class="label_recherche">Mot de passe : </label><input type="password" name="pass" onblur="purge(this)" value="4367Xs"/><label id="pass_js"></label><br />
		<input type="submit" class="bouton" value="Se connecter" onClick="identification()"/>
	</fieldset>
</form>

<?php
    }
?>
