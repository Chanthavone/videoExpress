/* Affiche le bouton "commander" ou le message "Vous n'avez choisi aucun film disponible"
	si aucun film disponible n'a été chosit
*/
function check(){
	var input = document.getElementsByTagName('input');
	var compt = 0;
	for (var i = 0, c = input.length; i < c; i++) {
		if(input[i].type=="checkbox" ) {
			if(input[i].checked==true){
				compt++;
			}
		}
	}
	var c = document.getElementById('commander');
	if(compt>0){
		c.style.visibility = "visible";
		document.getElementById('aucun_film').innerHTML="";			
	}
	else{
		c.style.visibility = "hidden";
		document.getElementById('aucun_film').innerHTML="<h3>Vous n'avez choisi aucun film disponible</h3>";	
	}
}