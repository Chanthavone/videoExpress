<?php

	/* Verifie que l'abonne est bien enregistre
	@param[in] $nom : Nom de l'abonne
	@param[in] $numAbonne : Numero de l'abonne
	@return Vrai si il existe, Faux sinon
	*/
	function verifAbonnes($nom,$numAbonne){
		global $serv;
		$req = "SELECT Distinct * FROM abonnes WHERE Nom=\"$nom\" AND Code=\"$numAbonne\";";
		$res = db_execSQL($req,$serv);
		if(mysql_num_rows($res)==0)
			return false;
		else 
			return true;
	}
	
	/* Met à jour le nombre de cassettes d'un abonne
	@param[in] $noFilm : le numero d'un abonne
	@param[in] $maj : incremente ou decremente NbCassettes
	*/
	function majNbCassettes($codeAbonne,$maj){
		global $serv;
		$req = "UPDATE abonnes SET NbCassettes=NbCassettes$maj WHERE Code=\"$codeAbonne\";";
		$res = db_execSQL($req,$serv);
	}

	/* Recupere le nom d'un abonne
	@param[in] $numAbonne : Numero de l'abonne
	@return Vrai si il existe, Faux sinon
	*/
	function getNom($numAbonne){
		global $serv;
		$req = "SELECT Distinct Nom FROM abonnes WHERE Code=\"$numAbonne\";";
		$res = db_execSQL($req,$serv);
		$resultat = mysql_fetch_assoc($res);
		return $resultat['Nom'];		
	}
    
    /* Insert un abonne
	@param[in] $code : le code client de l'abonne
	@param[in] $nom : le nom de l'abonne
	@param[in] $prenom : le prenom de l'abonne
    @param[in] $rue : la rue de l'abonne
    @param[in] $codepostal : le code postal de l'abonne
    ....
	*/
	function insertAbonne($code,$nom,$prenom,$rue,$codepostal,$ville,$batiment=null,$etage=null,$digicode=null,$tel=null,$mail=null,$banque,$guichet,$compte){
		global $serv;
		$req = "INSERT INTO abonnes VALUES('$code','$nom','$prenom','$rue','$codepostal','$ville','$batiment','$etage','$digicode','$tel','$mail',$banque,$guichet,'$compte',0);";
		$res = db_execSQL($req,$serv);
	}
    
    /* Permet d'obtenir la liste de tous les abonnes ainsi que leurs informations
    @return : Retourne la liste des abonnes
    */
    function getAbonnes() {
        global $serv;
        $req = "SELECT * FROM abonnes;";
        $res = db_execSQL($req,$serv);
		
		$recherche = array();
		while($result = mysql_fetch_assoc($res)) {
			$recherche[] = $result;
		}
		return $recherche;
    }
    
    /* Supprimer un abonne
    @param[in] $code : code de l'abonne 
    */
    function deleteAbonne($code) {
        global $serv;
        $req = "DELETE FROM abonnes WHERE Code = '$code';";
        $res = db_execSQL($req,$serv);
    }

?>