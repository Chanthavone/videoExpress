<?php

	/* Met à jour le statut d'une cassette
	@param[in] $noFilm : le numero du film
	@param[in] $noExemplaire : le numero d'exemplaire de la cassette
	@param[in] $statut : statut qu'on souhaite mettre à la cassettte
	*/
	function majStatut($noFilm,$noExemplaire,$statut){
		global $serv;
		$req = "UPDATE cassettes SET Statut=\"$statut\" WHERE NoFilm=\"$noFilm\" AND NoExemplaire=\"$noExemplaire\";";
		$res = db_execSQL($req,$serv);
	}

	/* Disponibilite d'une cassette
	@param[in] $noFilm : le numero du film
	@param[in] $support : support de la cassette
	@return 'oui' si disponible, sinon si disponible dans un autre support le support, sinon 'non' 
	*/	
	function getDisponibilite($noFilm,$support){
		global $serv;
		$req = "SELECT Distinct Statut FROM cassettes WHERE NoFilm=\"$noFilm\" AND Support=\"$support\";";
		$res = db_execSQL($req,$serv);
		$resultat = mysql_fetch_assoc($res);
		if($resultat['Statut'] == 'disponible'){
			return 'oui';
		}
		$req = "SELECT Distinct Support FROM cassettes WHERE NoFilm=\"$noFilm\" AND Support<>\"$support\";";
		$res = db_execSQL($req,$serv);		
		if(mysql_num_rows($res)==0)
			return 'non';
		else {
			$resultat = mysql_fetch_assoc($res);
			return $resultat['Support'];	
		}
	}

	/* Numero d'exemplaire
	@param[in] $noFilm : le numero du film
	@param[in] $support : support de la cassette
	@return un numero exemplaire
	*/		
	function getNoExemplaire($noFilm,$support){
		global $serv;
		$req = "SELECT Distinct NoExemplaire FROM cassettes WHERE NoFilm=\"$noFilm\" AND Support=\"$support\";";
		$res = db_execSQL($req,$serv);
		$resultat = mysql_fetch_assoc($res);
		return $resultat['NoExemplaire'];
	}

?>