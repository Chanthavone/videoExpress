<?php

	/* L'ou les  emprunt(s) de l'abonne
	@param[in] $codeAbonne : code de l'abonne
	@return $emprunt : L'ou les  emprunt(s) de l'abonne
	*/
	function getEmprunts($codeAbonne){
		global $serv;
		$req = "SELECT Distinct *,date_format(DateEmpRes,'%d/%m/%Y') as d FROM empres e WHERE CodeAbonne=\"$codeAbonne\" AND EXISTS(select * from cassettes c
		where Statut=\"empruntee\" And c.NoFilm=e.nofilm and e.NoExemplaire = c.NoExemplaire)ORDER BY 1;";
		$res = db_execSQL($req,$serv);
		$emprunt[] = mysql_fetch_assoc($res);
		while($result = mysql_fetch_assoc($res)) {
			$emprunt[]=$result;
		}
		return $emprunt;
	}

	/* Le nombre d'emprunt d'un abonne
	@param[in] $codeAbonne : code de l'abonne
	@return Le nombre d'emprunt
	*/
	function getNbEmprunts($codeAbonne){
		global $serv;
		$req = "SELECT Distinct * FROM empres e WHERE CodeAbonne=\"$codeAbonne\" AND EXISTS(select * from cassettes c
		where Statut=\"empruntee\" And c.NoFilm=e.nofilm and e.NoExemplaire = c.NoExemplaire);";
		$res = db_execSQL($req,$serv);

		return mysql_num_rows($res);
	}
	
	/* Le code abonne de l'emprunteur
	@param[in] $noFilm : le numero du film
	@param[in] $noExemplaire : le numero d'exemplaire de la cassette
	@return codeAbonne de l'emprunteur
	*/
	function getCodeAbonne($noFilm,$noExemplaire){
		global $serv;
		$req = "SELECT Distinct CodeAbonne FROM empres WHERE NoFilm=\"$noFilm\" AND NoExemplaire=\"$noExemplaire\";";
		$res = db_execSQL($req,$serv);
		$resultat = mysql_fetch_assoc($res);
		return $resultat['CodeAbonne'];	
	}
	
	/* Supprime l'emprunt d'une cassette
	@param[in] $noFilm : le numero du film
	@param[in] $noExemplaire : le numero d'exemplaire de la cassette
	*/
	function deleteEmpRes($noFilm,$noExemplaire){
		global $serv;
		$req = "DELETE FROM empres WHERE NoFilm=\"$noFilm\" AND NoExemplaire=\"$noExemplaire\";";
		$res = db_execSQL($req,$serv);
	}
	
	/* Insert l'emprunt d'une cassette
	@param[in] $noFilm : le numero du film
	@param[in] $noExemplaire : le numero d'exemplaire de la cassette
	@param[in] $codeAbonne : code de l'abonne
	*/
	function insertEmpRes($noFilm,$noExemplaire,$codeAbonne){
		global $serv;
		$req = "INSERT INTO empres VALUES(\"$noFilm\",\"$noExemplaire\",\"$codeAbonne\",NOW());";
		$res = db_execSQL($req,$serv);
	}
	
	/* Indique si une cassette est reservee
	@param[in] $noFilm : le numero du film
	@param[in] $noExemplaire : le numero d'exemplaire de la cassette
	@param[in] $codeAbonne : code de l'abonne
	return vrai si la cassette est reservee, sinon faux
	*/
	function cassetteReservee($noFilm,$noExemplaire,$codeAbonne){
		global $serv;
		$req = "SELECT Distinct * FROM empres WHERE NoFilm=\"$noFilm\" AND NoExemplaire=\"$noExemplaire\" AND CodeAbonne=\"$codeAbonne\";";
		$res = db_execSQL($req,$serv);
		if(mysql_num_rows($res) == 0)
			return false;
		else 
			return true;
	}
	
	/* Met à jour les reservations de cassettes avec le statut 'reservees'
	*/
	function reservationValable(){
		global $serv;
		$req = "SELECT Distinct *,DATE_ADD(DateEmpRes, INTERVAL 5 MINUTE) AS date0,now() as date1 FROM empres e WHERE EXISTS(select * from cassettes c
		where Statut=\"reservee\" And c.NoFilm=e.NoFilm and e.NoExemplaire = c.NoExemplaire);";
		$res = db_execSQL($req,$serv);
		while($resultat = mysql_fetch_assoc($res)) {
			if($resultat['date0'] < $resultat['date1']){
				$noFilm = $resultat['NoFilm']; $noExemplaire = $resultat['NoExemplaire'];
				majStatut($noFilm,$noExemplaire,'disponible');
				deleteEmpRes($noFilm,$noExemplaire);
			}
		}
	}

?>