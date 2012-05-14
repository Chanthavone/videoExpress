<div class="titre">
	<h2> <span>Message</span> </h2>
</div>
<br />

<?php	
	$mess = $_GET['mess'];
	
	switch($mess){							
		case "updateAboOk" : 
			echo "Les informations de l'abonné ont bien été modifiées.";
		break;
		
		case "updateAboNok" : 
			echo "Il y a eu une erreur dans la modification des informations.";
		break;
		
		case "ajoutAboOk" : 
			echo "L'abonné a bien été ajouté dans la base de données.";
		break;
		
		case "ajoutAboNok" : 
			echo "Un des champs saisis est incorrect.";
		break;
		
		case "retourOk" : 
			echo "Retour bien effectué.";
		break;
		
		case "retourNok" : 
			echo "Le film ou l\'exemplaire saisi n\'a pas été emprunté.";
		break;
		
		case "retourImpossible" : 
			echo "Impossible de retourner la cassette.";
		break;
        
        case "ajoutFilmOk" : 
			echo "La film a bien été ajouté dans la base de données.";
		break;
		
		case "ajoutFilmNok" : 
			echo "Un des champs saisis est incorrect.";
		break;
        
        case "modifierFilmOk" : 
			echo "La film a bien été modifié.";
		break;
		
		case "modifierFilmNok" : 
			echo "Un des champs saisis est incorrect.";
		break;
		
		default:
			require("site_client/accueil.php");	
		break;
	}
?>

<br />