<?php

	/* Met � jour le statut d'une cassette
	@param[in] $noFilm : le numero du film
	@param[in] $noExemplaire : le numero d'exemplaire de la cassette
	@param[in] $statut : statut qu'on souhaite mettre � la cassettte
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
	function getDisponibilite($noFilm,$support,$codeAbonne){
		global $serv;
		$req = "SELECT Distinct * FROM cassettes WHERE NoFilm=\"$noFilm\" AND Support=\"$support\";";
		$res = db_execSQL($req,$serv);
		while($resultat = mysql_fetch_assoc($res)) {
			if($resultat['Statut'] == 'reservee'){
				if(cassetteReservee($noFilm,$resultat['NoExemplaire'],$codeAbonne))
					return 'oui';
			}
			elseif($resultat['Statut'] == 'disponible'){
				$disponible = true;
			}
		}
		if(isset($disponible))return 'oui';
		
		$req = "SELECT Distinct * FROM cassettes WHERE NoFilm=\"$noFilm\" AND (Statut=\"disponible\" OR Statut=\"reservee\");";
		$res = db_execSQL($req,$serv);		
		if(mysql_num_rows($res)==0)
			return 'non';
		else {
			while($resultat = mysql_fetch_assoc($res)) {
				if($resultat['Statut'] == 'reservee'){
					if(cassetteReservee($noFilm,$resultat['NoExemplaire'],$codeAbonne))
						return $resultat['Support'];
				}
				elseif($resultat['Statut'] == 'disponible'){
					$support = $resultat['Support'];
				}
			}
			if(isset($support))return $support;
		}
	}

	/* Numero d'exemplaire
	@param[in] $noFilm : le numero du film
	@param[in] $support : support de la cassette
	@return un numero exemplaire
	*/		
	function getNoExemplaire($noFilm,$support,$codeAbonne){
		global $serv;
		$req = "SELECT Distinct * FROM cassettes WHERE NoFilm=\"$noFilm\" AND Support=\"$support\";";
		$res = db_execSQL($req,$serv);
		while($resultat = mysql_fetch_assoc($res)) {
			if(cassetteReservee($noFilm,$resultat['NoExemplaire'],$codeAbonne)){
					deleteEmpRes($noFilm,$resultat['NoExemplaire']);
					return $resultat['NoExemplaire'];
			}
			else{
				$disponible[] = $resultat['NoExemplaire'];
			}
		}
		if(isset($disponible))return $disponible[0];
	}
    
    /* Insert une cassette dans la base de donn�es
    @param[in] $noFilm : le numero du film
    @param[in] $exemplaire : le numero d'exemplaire du film
	@param[in] $support : support de la cassette
    */
    function insertCassette($nofilm,$exemplaire,$support) {
        global $serv;
        $req = "INSERT INTO cassettes VALUES($nofilm,$exemplaire,'$support','disponible');";
        $res = db_execSQL($req,$serv);
    }
    
    /* R�cup�re le num�ro d'exemplaire le plus grand pour un film donn�
    @param[in] $nofilm : le num�ro du film
    @return le plus grand num�ro d'exemplaire
    */
    function getLastNoExemplaire($nofilm) {
        global $serv;
		$req = "SELECT MAX(NoExemplaire) FROM cassettes WHERE NoFilm=\"$nofilm\";";
		$res = db_execSQL($req,$serv);
        $resultat = mysql_fetch_row($res);
		return $resultat[0];
    }

?>