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

?>