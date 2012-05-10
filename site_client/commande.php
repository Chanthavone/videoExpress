<div class="titre">
	<h2> <span>Commandes</span> </h2>
</div>
<!-- Pour avoir la fonction de verification en javascript -->
<script type="text/javascript" src="commun/javascript/verificationFormulaire.js"></script>
<?php
	//Pour avoir la fonction de verification de l'admin
	include("modele/modeleAdmin.php");
	//Pour avoir la fonction de verification de l'abonne
	include("modele/modeleAbonnes.php");
	//Pour avoir la fonction de recuperation des emprunts
	include("modele/modeleEmpres.php");
    
	$cookie = false;
	//on verifie si on a un cookie
	if(isset($_COOKIE['identite'])){
		//on initialise les variables
		$nom = $_COOKIE['identite'][0] ; $pass = $_COOKIE['identite'][1]; 
	}
	//sinon on verifie si les elements du formulaire existe
	elseif(isset($_POST['pass'])){
		//on initialise les variables
		$pass = $_POST['pass']; 
		if(isset($_POST['nom']))
			$nom = $_POST['nom'] ;
		else
			$nom = getNom($pass);
		$cookie = true;
	}
	else{
		header("Location: index.php?module=identificationC");
	}
	//on appelle la fonction de verification
	$existeAbonne = verifAbonnes($nom,$pass);
		
	//Si il existe on affiche la page de reference, sinon on affiche un message d'erreur
	if($existeAbonne){
		//si on a pas de cookie
		if($cookie){
			setcookie("identite[0]", $nom);
			setcookie("identite[1]", $pass);
		}
        //on recupere les emprunts et on initialise des variables
        $maxEmprunt = 3;
        $emprunts = getEmprunts($pass);
        $nbCommande = getNbEmprunts($pass);
        if($nbCommande > $maxEmprunt)
            $nbCommandeRestant = 0;
        else
            $nbCommandeRestant = abs($nbCommande - $maxEmprunt) ;
        
        //on affiche le nombre de commande que l'abonne peut passer
        echo '<br /><div id="intro">
                Vous pouvez commander jusqu\'à 3 films à la fois!<br />
                Vous pouvez encore commander <b>'.$nbCommandeRestant.'</b> films.
                <br class="blank" />
            </div>';     
        //si le nombre commande restant est positif on affiche un tableau 
        if($nbCommandeRestant > 0 ){
            echo '<form id="formCommande" action="index.php?module=confirmeCommande" method="post">';
                echo '<fieldset class="formulaire">';
                    echo '<legend>Formulaire de commande</legend>';
                    echo '<table>';
                    //si on commande a partir du panier
                    if(isset($_POST['commandePanier']) || 
					($module == "identificationC" && isset($_COOKIE['selection']) && $_COOKIE['selection'][0]!=0) ){
                        
                        for($i = 1 ; $i <= $nbCommandeRestant ; ++$i){
                            if($_COOKIE['selection'][0] >= $i){
                                $infosFilm = unserialize($_COOKIE['selection'][$i]);
                                $noFilm = $infosFilm[0]; $support = $infosFilm[1] ;
                                if($support == "DVD"){
                                    $checkdvd = 'checked="checked"';
                                    $checkvhs = '';
                                }
                                else{
                                    $checkdvd = '';
                                    $checkvhs = 'checked="checked"';
                                }
                                echo '<tr><td><label>Numéro du film '.$i.' : </label><input type="text" name="numFilm'.$i.'" value="'.$noFilm.'" /></td>
                                    <td><label>Support'.$i.' : </label>
                                    <input type="radio" '.$checkdvd.'  name="support'.$i.'" value="dvd" /><label>DVD</label>
                                    <input type="radio" '.$checkvhs.' name="support'.$i.'" value="vhs"/><label>VHS</label></td>
                                    <td><label id="numFilm'.$i.'_js"></label></td></tr>';
                            }
                            else{
                                 echo '<tr><td><label>Numéro du film '.$i.' : </label><input type="text" onblur="purge(this)" name="numFilm'.$i.'" /></td>
                                    <td><label>Support'.$i.' : </label><input type="radio" name="support'.$i.'" value="dvd" /><label>DVD</label>
                                    <input type="radio" name="support'.$i.'" value="vhs" /><label>VHS</label></td>
                                    <td><label id="numFilm'.$i.'_js"></label></td></tr>';                           
                            }
                        }                        
                    }
                    else{ //si on commande normalement, c'est a dire à partir du bouton commande
                        for($i = 1 ; $i <= $nbCommandeRestant ; ++$i){
                            echo '<tr><td><label>Numéro du film '.$i.' : </label><input type="text" onblur="purge(this)" name="numFilm'.$i.'" /></td>
                                <td><label>Support'.$i.' : </label><input type="radio" name="support'.$i.'" value="dvd" /><label>DVD</label>
                                <input type="radio" name="support'.$i.'" value="vhs" /><label>VHS</label></td>
                                <td><label id="numFilm'.$i.'_js"></label></td></tr>';
                        }
                    }
                    echo '</table>';
                    echo '<input type="hidden" name="pass" value="'.$pass.'" />';
                    echo '<input type="submit" class="bouton" onClick="commande()" value="Commander" />';
                echo '</fieldset>';
            echo '</form>';
        }
    }
	else{
		$existeAdmin  = verifAdmin($nom,$pass);
		if($existeAdmin)
			echo "Vous êtes connecté en tant que administrateur. Vous ne pouvez donc pas commander des cassetttes.";
		else
			echo "Le nom ou le code de l'abonné est incorrect. Réesseyez !";
	}
    
	echo '<a href="javascript:history.go(-1)">Retour</a>';

?>