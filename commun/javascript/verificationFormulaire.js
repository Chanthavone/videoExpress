/* Remet à vide un champ composé d'espace (ex = "      " => "")
@param[in] Texte = champ composé d'espaces
*/
function purge(Texte) {
	if(Texte.value[0]==" ") {
	Texte.value=""; 
	}
}

function accueilDescriptif(){	
	var numFilm = document.getElementById('numFilm');
	var myForm = document.getElementById('formDescriptif');
	var erreur = false;
	if(numFilm.value == ""){
		document.getElementById('numFilm_js').innerHTML="<img border='0' src='commun/images/error.gif' /> Entrer un numéro de film";
		erreur = true;	
	}
	else if(!numFilm.value.match(/^[0-9]+$/)){
		if(numFilm.value.match(/[a-zA-Zéàëêïîôöûüâäàè_ .]/)){
			document.getElementById('numFilm_js').innerHTML="<img border='0' src='commun/images/error.gif' /> Le numéro de film doit être composé de chiffre";
			erreur = true;		
		}
	}
	
	if(erreur == true) {	
		myForm.addEventListener('submit', function(e) { e.preventDefault(); }, true);
	}
	else {
		myForm.submit();
	}
}

function identification(){
	var input = document.getElementsByTagName('input');
	var myForm = document.getElementById('formIdentification');
	var erreur = false;
	for (var i = 0, c = input.length; i < c; i++) {
		if(input[i].name == "nom" ){
			if(input[i].value == ""){
				document.getElementById('nom_js').innerHTML="<img border='0' src='commun/images/error.gif' /> Vide";
				erreur = true;
			}
			else if(!input[i].value.match(/^[a-zA-Zéàëêïîôöûüâäàè\- ]{2,30}$/)){
				if(input[i].value.split('').length < 2)
					document.getElementById('nom_js').innerHTML="<img border='0' src='commun/images/error.gif' /> Deux caractéres minimum";
				else if (input[i].value.split('').length > 30)
					document.getElementById('nom_js').innerHTML="<img border='0' src='commun/images/error.gif' /> Trente caractéres maximum";
				else
					document.getElementById('nom_js').innerHTML="<img border='0' src='commun/images/error.gif' /> Caractéres incorrect";
				erreur = true;			
			}
			else
				document.getElementById('nom_js').innerHTML="<img border='0' src='commun/images/ok.gif' />";
		}
		else if(input[i].name == "pass"){
			if(input[i].value == ""){
				document.getElementById('pass_js').innerHTML="<img border='0' src='commun/images/error.gif' /> Vide";
				erreur = true;
			}
			else if(!input[i].value.match(/^[a-zA-Z0-9éàëêïîôöûüâäàè\- ]{2,30}$/)){
				if(input[i].value.split('').length < 2)
					document.getElementById('pass_js').innerHTML="<img border='0' src='commun/images/error.gif' /> Deux caractéres minimum";
				else if (input[i].value.split('').length > 30)
					document.getElementById('pass_js').innerHTML="<img border='0' src='commun/images/error.gif' /> Trente caractéres maximum";
				else
					document.getElementById('pass_js').innerHTML="<img border='0' src='commun/images/error.gif' /> Caractéres incorrect";
				erreur = true;			
			}
			else
				document.getElementById('pass_js').innerHTML="<img border='0' src='commun/images/ok.gif' />";			
		}
	}
	
	if(erreur == true) {
		myForm.addEventListener('submit', function(e) { e.preventDefault(); }, true);
	}
	else {
		myForm.submit();
	}
}

function commande(){
	var input = document.getElementsByTagName('input');
	var myForm = document.getElementById('formCommande');
	var erreur = [];
	var j = 1;

	for (var i = 0, c = input.length; i < c; i++) {
		if(input[i].type== "text" ) {
			erreur[j - 1] = false;
			var support = document.getElementsByName('support' + j);
			if(input[i].value == ""){
				document.getElementById('numFilm' + j +'_js').innerHTML="<img border='0' src='commun/images/error.gif' /> Entrer un numéro de film";
				erreur[j - 1] = true;	
			}
			else if(!input[i].value.match(/^[0-9]+$/)){
				if(input[i].value.match(/[a-zA-Zéàëêïîôöûüâäàè_ .]/)){
					document.getElementById('numFilm' + j +'_js').innerHTML="<img border='0' src='commun/images/error.gif' /> Le numéro de film doit être composé de chiffre";
					erreur[j - 1] = true;		
				}
			}

			if(!support[0].checked && !support[1].checked && !erreur[j - 1]){ //on a bon num et pas coché 
				document.getElementById('numFilm' + j +'_js').innerHTML="<img border='0' src='commun/images/error.gif' /> Vous devez cocher un support";
				erreur[j - 1] = true;
			}
			else if(!support[0].checked && !support[1].checked && erreur[j - 1]){ // une erreur et pas coché
				document.getElementById('numFilm' + j +'_js').innerHTML = "";
				erreur[j - 1] = 'vide';
			}
			else if((support[0].checked || support[1].checked) && erreur[j - 1]){ // une erreur et coché 

			}
			else if ((support[0].checked || support[1].checked) && !erreur[j - 1]){//on a bon num et coché
				document.getElementById('numFilm' + j +'_js').innerHTML = "<img border='0' src='commun/images/ok.gif' />";
			}			
			j++;
		}
	}
	var valide = false; var vide = 0;
	for (var id in erreur) {
		if(erreur[id] == true) {
			valide = true;
			myForm.addEventListener('submit', function(e) { e.preventDefault(); }, true);
		}
		else if(erreur[id] == 'vide'){
			vide++;
		}
	}

	if(vide == (j-1)){
		myForm.addEventListener('submit', function(e) { e.preventDefault(); }, true);
	}
	else if(valide == false) {
		myForm.submit();
	}
	
}

function accueilRetour(){
	var numFilm = document.getElementById('numFilm');
	var numExemplaire = document.getElementById('numExemplaire');
	var myForm = document.getElementById('formRetour');
	var erreur = false;

	if(numFilm.value == ""){
		document.getElementById('numFilm_js').innerHTML="<img border='0' src='commun/images/error.gif' /> Entrer un numéro de film";
		erreur = true;	
	}
	else if(!numFilm.value.match(/^[0-9]+$/)){
		if(numFilm.value.match(/[a-zA-Zéàëêïîôöûüâäàè_ .]/)){
			document.getElementById('numFilm_js').innerHTML="<img border='0' src='commun/images/error.gif' /> Le numéro de film doit être composé de chiffre";
			erreur = true;		
		}
	}
	else
		document.getElementById('numFilm_js').innerHTML="<img border='0' src='commun/images/ok.gif' />";	
		
	if(numExemplaire.value == ""){
		document.getElementById('numExemplaire_js').innerHTML="<img border='0' src='commun/images/error.gif' /> Entrer un numéro d'exemplaire";
		erreur = true;	
	}
	else if(!numExemplaire.value.match(/^[0-9]+$/)){
		if(numExemplaire.value.match(/[a-zA-Zéàëêïîôöûüâäàè_ .]/)){
			document.getElementById('numExemplaire_js').innerHTML="<img border='0' src='commun/images/error.gif' /> Le numéro d'exemplaire doit être composé de chiffre";
			erreur = true;		
		}
	}	
	else
		document.getElementById('numExemplaire_js').innerHTML="<img border='0' src='commun/images/ok.gif' />";
		
	if(erreur == true) {	
		myForm.addEventListener('submit', function(e) { e.preventDefault(); }, true);
	}
	else {
		myForm.submit();
	}
}

function panier(erreur){

	var myForm = document.getElementById('formPanier');
	if(erreur == true) {	
		myForm.addEventListener('submit', function(e) { e.preventDefault(); }, true);
	}
	else {
		myForm.submit();
	}
}

function ajoutAbonne() {
	var code = document.getElementById('code');
	var nom = document.getElementById('nom');
	var prenom = document.getElementById('prenom');
	var rue = document.getElementById('rue');
	var codepostal = document.getElementById('codepostal');
	var ville = document.getElementById('ville');
	var batiment = document.getElementById('batiment');
	var etage = document.getElementById('etage');
	var digicode = document.getElementById('digicode');
	var telephone = document.getElementById('telephone');
	var email = document.getElementById('email');
	var banque = document.getElementById('banque');
	var guichet = document.getElementById('guichet');
	var compte = document.getElementById('compte');
	var erreur = false;
	
	if(code.value == ""){
		document.getElementById('js_code').innerHTML="<img border='0' src='commun/images/error.gif' /> Entrer un numéro de film";
		erreur = true;	
	}
	if(nom.value == ""){
		document.getElementById('js_nom').innerHTML="<img border='0' src='commun/images/error.gif' /> Entrer un numéro de film";
		erreur = true;	
	}
	if(prenom.value == ""){
		document.getElementById('js_prenom').innerHTML="<img border='0' src='commun/images/error.gif' /> Entrer un numéro de film";
		erreur = true;	
	}
	if(rue.value == ""){
		document.getElementById('js_rue').innerHTML="<img border='0' src='commun/images/error.gif' /> Entrer un numéro de film";
		erreur = true;	
	}
	if(codepostal.value == ""){
		document.getElementById('js_codepostal').innerHTML="<img border='0' src='commun/images/error.gif' /> Entrer un numéro de film";
		erreur = true;	
	}
	if(ville.value == ""){
		document.getElementById('js_ville').innerHTML="<img border='0' src='commun/images/error.gif' /> Entrer un numéro de film";
		erreur = true;	
	}
	if(banque.value == ""){
		document.getElementById('js_banque').innerHTML="<img border='0' src='commun/images/error.gif' /> Entrer un numéro de film";
		erreur = true;	
	}
	if(guichet.value == ""){
		document.getElementById('js_guichet').innerHTML="<img border='0' src='commun/images/error.gif' /> Entrer un numéro de film";
		erreur = true;	
	}
	if(compte.value == ""){
		document.getElementById('js_compte').innerHTML="<img border='0' src='commun/images/error.gif' /> Entrer un numéro de film";
		erreur = true;	
	}
}