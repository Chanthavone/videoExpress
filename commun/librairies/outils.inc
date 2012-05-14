<?php

	/*Affiche le nom du site(VideoEXPRESS) et les noms des auteurs de la page courante
	@param[in] $page : Référence de fichier de la page d'accueil du service
	@param[in] $auteurs : Les noms des auteurs 
	*/
	function banniere($page,$auteurs) {
		echo '<div id="header">
			<div id="banniere">
				<div id="titre">
					<a href="'.$page.'"><div id="lien_banniere"></div></a>
				</div>
				<br />
				<div id="auteur">
					©'.$auteurs.'
				</div>
			</div>
			<div id="menu">
				<ul class="menu">
					<li class="menu"> <a href="index.php?module=accueil">Accueil</a> </li>
					<li class="menu"> <a href="index.php?module=accueilDescriptif">Descriptif</a> </li>
					<li class="menu"> <a href="index.php?module=accueilRecherche">Recherche</a> </li>
					<li class="menu"> <a href="index.php?module=identificationD">IdentificationD</a> </li>
					<li class="menu"> <a href="index.php?module=identificationC">IdentificationC</a> </li>
				</ul>
			</div>
		</div>';
	}

	/* Effectue une demande de connexion au serveur mysql 
	@return 0 si il y'a une erreur ; sinon elle renvoie la valeur de l'identifiant de connexion
	*/
	function db_connect(){
		$connect = mysql_connect("localhost", "root", "");
		if(!$connect){
			die('Connexion impossible : ' . mysql_error());
			return 0;
		}
		if($mysql_select = mysql_select_db("video82")){
			return $connect;
		}
		else{
			die('Erreur lors de la selection de la base de donnée : ' . mysql_error());
			return 0;
		}
	}

	/* Execute une requête
	@param[in] $req : La requête
	@param[in] $serv : La connexion d'identifiant
	@return 0 si il y'a une erreur ; sinon elle renvoie la valeur de l'identifiant de résultat 
	*/
	function db_execSQL($req,$serv){
			//l'encodage
			mysql_query("SET NAMES 'utf8'");
			$res = mysql_query($req,$serv);
			if(!$res){
				die('Erreur dans la requête : ' . mysql_error());
				return 0;		
			}
			return $res;
	}
	
	/* systeme de pagination 1 2 3 4
		@param[in] 	$nb : Le nombre total de page a afficher
		@param[in] 	$total : Le nombre total de resultat
		@param[in] 	$donnée_a_transmettre : Les données à transmettre dans l'URL
		@return 	$pagination : Les paginations
	*/
	function Pagination($nb,$total,$donnée_a_transmettre) {
			$nbpages=ceil($total/$nb);
			$numeroPages = 1;
			$compteurPages = 1;
			$limite  = 0;
			$pagination="";
			while($numeroPages <= $nbpages) {
				$pagination= ''.$pagination.'<a id="page" href = "index.php?'.$donnée_a_transmettre.'='.$limite.' " >'.$numeroPages.'</a>';
				$limite = $limite + $nb;
				$numeroPages = $numeroPages + 1;
				$compteurPages = $compteurPages + 1;
				if($compteurPages == 10) 
					$compteurPages = 1;	
			}
			return $pagination;
	}

	/* 	Les liens suivant et precedent
		@param[in] 	$page : La page à transmettre
		@param[in] 	$total : Le nombre total de resultat
		@param[in] 	$nb : Le nombre total de page a afficher
		@param[in] 	$donnée_a_transmettre : Les données à transmettre dans l'URL
		@return 	$lien : Les liens suivant et precedent
	*/
	function displayNextPreviousButtons($page,$total,$nb,$donnée_a_transmettre) {
		$limiteSuivante = $page + $nb;
		$limitePrecedente = $page - $nb;
		$lien='<br /><div id="liens" >';

		if($page != 0) {
		   $lien=''.$lien.'<a href="index.php?'.$donnée_a_transmettre.'='.$limitePrecedente.'">
		   <img src="commun/images/precedent.png" alt="Précédent" title="Précédent" border="0"/></a>';
		}
		if(ceil($total/$nb) > 1){
			$pagination= Pagination($nb,$total,$donnée_a_transmettre);
			$lien=' '.$lien.' '.$pagination.' ';
		}
		//$nbpages=ceil($total/$nb);
		if($limiteSuivante < $total) {
			$lien=''.$lien.'<a href="index.php?'.$donnée_a_transmettre.'='.$limiteSuivante.'">
			<img src="commun/images/suivant.png" alt="Suivant" title="Suivant" border="0"/></a>';       
		}
		$lien=''.$lien.'</div> ';

		return $lien;
	}
	
	/* Vérifie le formulaire de création de l'abonne
	@param[in] $code : Le code de l'abonne
	@param[in] $nom : Le nom de l'abonne
	...
	@return true s'il n'y a pas d'erreur sinon false
	*/
	function verifInsertionAbonne($code,$nom,$prenom,$rue,$codepostal,$ville,$batiment,$etage,$digicode,$telephone,$email,$banque,$guichet,$compte) {
		// Regex
		$regnum = "/^[0-9]+$/";
		$regemail = "/^.+\@.+\..+$/";
		
		// Si un de ces champs est vide, on retourne false
		if (empty($code) || empty($nom) || empty($prenom) || empty($rue) || empty($codepostal) || empty($ville) || empty($banque) || empty($guichet) || empty($compte)) {
			return false;
		}
		
 		// Si ces champs ne sont pas rempli avec des caractères numériques, on retourne false
		if (!preg_match($regnum,$codepostal) || (!empty($digicode) && !preg_match($regnum,$digicode)) || 
			(!empty($telephone) && !preg_match($regnum,$telephone)) || !preg_match($regnum,$banque) || !preg_match($regnum,$guichet)) {
			return false;
		}
		
		// Si le champs email ne correspond pas au format d'une adresse mail, on retourne false
		if (!empty($email) && !preg_match($regemail,$email)) {
			return true;
		}
		return true;
	}
    
    function verifInsertionFilm($nofilm,$titre,$annee,$duree) {
        $regnum = "/^[0-9]+$/";
        if (empty($nofilm) || empty($titre)) {
            return false;
        }
        if ((!empty($annee) && !preg_match($regnum,$annee)) || (!empty($duree) && !preg_match($regnum,$duree))) {
            return false;
        }
        return true;
    }
?>
