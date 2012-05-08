<?php
	
	/*Les realisateurs 
	@return $realisateurs : les differents realisateurs de films*/
	function getRealisateurs(){
		global $serv;
		$req = "SELECT Distinct Realisateur FROM films ORDER BY 1;";
		$res = db_execSQL($req,$serv);
		while($result = mysql_fetch_assoc($res)) {
			$realisateurs[]=$result['Realisateur'];
		}
		return $realisateurs;
	}
	
	/*Les genres 
	@return $genres : les differents genre de films*/
	function getGenres(){
		global $serv;
		$req = "SELECT Distinct Genre FROM films ORDER BY 1;";
		$res = db_execSQL($req,$serv);
		while($result = mysql_fetch_assoc($res)) {
			$genres[]=$result['Genre'];
		}
		return $genres;
	}
	
	/*Resultat(s) de la recherche
	@param[in] $titre : Des mots du titre
	@param[in] $support : Le support du film
	@param[in] $disponibilite : La disponibilité du film
	@param[in] $genre : Le genre du film
	@param[in] $realisateur : Le nom du realisateur
	@param[in] $acteur : Le nom d'un acteur
	@return Le(s) resultat(s) de la recherche
	*/
	function rechercheFilm($titre,$support,$disponibilite,$genre,$realisateur,$acteur,$page,$nombre){
		global $serv;
		// A OPTIMISER
		$req = "SELECT DISTINCT * FROM films WHERE ";
		$And = "";
		if($titre <> ""){
			$req .= "$And Titre LIKE \"%$titre%\" ";
			$And = "And";
		}
		if($support <> "null"){
			$req .= "$And NoFilm in (SELECT NoFilm FROM cassettes WHERE Support = \"$support\") ";
			$And = "And";
		}
		if($disponibilite <> "null"){
			$req .= "$And NoFilm in (SELECT NoFilm FROM cassettes WHERE Statut = \"$disponibilite\") ";
			$And = "And";
		}
		if($genre <> "null"){
			$req .= "$And  Genre = \"$genre\" ";
			$And = "And";
		}
		if($realisateur <> "null"){
			$req .= "$And Realisateur = \"$realisateur\" ";
			$And = "And";
		}
		if($acteur <> "null"){
			$req .= "$And NoFilm in (SELECT NoFilm FROM acteurs WHERE Acteur = \"$acteur\") ";
			$And = "And";
		}
		if($And == "")
			$req = "SELECT DISTINCT * FROM films ORDER BY Titre ";
		//echo $req ."<br />";
		if($nombre <> 0){
			$req .= "LIMIT $page ,$nombre";
		}

		$res = db_execSQL($req,$serv);
		
		$recherche = array();
		while($result = mysql_fetch_assoc($res)) {
			$recherche[] = $result;
		}
		return $recherche;	
	}
	
	/* Le film selon son numero 
	@param[in] $numFilm : numero de film 
	@return un film
	*/	
	function getFilm($numFilm){
		global $serv;
		$req = "SELECT Distinct * FROM films WHERE NoFilm = \"$numFilm\" ;";
		$res = db_execSQL($req,$serv);
		return mysql_fetch_assoc($res);	
	}
	
	/* Le titre selon son numero de film
	@param[in] $numFilm : numero de film 
	@return un titre de film
	*/	
	function getTitre($numFilm){
		global $serv;
		$req = "SELECT Distinct Titre FROM films WHERE NoFilm = \"$numFilm\" ;";
		$res = db_execSQL($req,$serv);
		$resultat = mysql_fetch_assoc($res);
		return $resultat['Titre'];	
	}

	/* Le realisateur selon son numero de film
	@param[in] $numFilm : numero de film 
	@return un realisateur de film
	*/	
	function getRealisateur($numFilm){
		global $serv;
		$req = "SELECT Distinct Realisateur FROM films WHERE NoFilm = \"$numFilm\" ;";
		$res = db_execSQL($req,$serv);
		$resultat = mysql_fetch_assoc($res);
		return $resultat['Realisateur'];	
	}
	
	/* L'image d'un film selon son numero de film
	@param[in] $numFilm : numero de film 
	@return le nom de l'image
	*/
	function getImage($numFilm) {
		global $serv;
		$req = "SELECT Image FROM films WHERE NoFilm = \"$numFilm\" ;";
		$res = db_execSQL($req,$serv);
		$resultat = mysql_fetch_assoc($res);
		return $resultat['Image'];
	}
    
    /* Permet d'obtenir la liste de tous les abonnes ainsi que leurs informations
    @return : Retourne la liste des abonnes
    */
    function getListeFilms() {
        global $serv;
        $req = "SELECT * FROM films;";
        $res = db_execSQL($req,$serv);
		
		$recherche = array();
		while($result = mysql_fetch_assoc($res)) {
			$recherche[] = $result;
		}
		return $recherche;
    }
    
    /* Supprimer un film
    @param[in] $num : numéro du film
    */
    function deleteFilm($num) {
        global $serv;
        $req = "DELETE FROM films WHERE NoFilm = $num;";
        $res = db_execSQL($req,$serv);
    }
	
	/* Ajoute un film
	@param[in] $num : numéro du film
	...
	*/
    function insertFilm($numero,$titre,$nationalite,$realisateur,$couleur,$annee,$genre,$duree,$synopsis,$image){
		global $serv;
		$req = "INSERT INTO films VALUES($numero,'$titre','$nationalite','$realisateur','$couleur','$annee','$genre','$duree','$synopsis','$image');";
		$res = db_execSQL($req,$serv);
	}
?>