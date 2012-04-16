<?php
	/*Acteurs
	@return $acteurs : les differents acteurs de films*/
	function getActeurs(){
		global $serv;
		$req = "SELECT Distinct Acteur FROM acteurs ORDER BY 1;";
		$res = db_execSQL($req,$serv);
		while($result = mysql_fetch_assoc($res)) {
			$acteurs[]=$result['Acteur'];
		}
		return $acteurs;
	}
	
	/* Les principaux acteurs d'un film
	@param[in] $numFilm : Numero d'un film
	@return Une chaine de caracteres representant les principaux acteurs
	*/
	function getActeursFilm($numFilm){
		global $serv;
		$req = "SELECT Distinct Acteur FROM acteurs WHERE NoFilm = $numFilm ORDER BY 1;";
		$res = db_execSQL($req,$serv);
		$result = mysql_fetch_assoc($res);
		$acteurs = $result['Acteur'];
		while($result = mysql_fetch_assoc($res)) {
			$acteurs .= "," .$result['Acteur'] ;
		}
		return $acteurs;	
	}
?>