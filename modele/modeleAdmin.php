<?php

	/* Verifie que un admin est bien enregistre
	@param[in] $nom : Nom de l'admin
	@param[in] $numAbonne : Numero de l'admin
	@return Vrai si il existe, Faux sinon
	*/
	function verifAdmin($nom,$numAbonne){
		global $serv;
		$req = "SELECT Distinct * FROM admin WHERE Nom=\"$nom\" AND Code=\"$numAbonne\";";
		$res = db_execSQL($req,$serv);
		if(mysql_num_rows($res)==0)
			return false;
		else 
			return true;
	}
	
?>