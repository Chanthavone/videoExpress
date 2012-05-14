<div class="titre">
	<h2> <span>Recherche</span> </h2>
</div>

<?php
	//Pour avoir la fonction de recherche
	include("modele/modeleFilms.php");
	
	//on verifie si les elements du formulaire existe

		//on initialise les variables
		if(isset($_POST['rechercher'])){
			$titre = $_POST['titre'] ; $support		=	$_POST['support']		; $disponibilite 	= $_POST['disponibilite'];
			$genre = $_POST['genre'] ; $realisateur = 	$_POST['realisateur'] 	; $acteur 			= $_POST['acteur'];
			$_SESSION['recherche'] = $_POST;
		}
		else{
			$titre = $_SESSION['recherche']['titre'] ; $support	= $_SESSION['recherche']['support']; 
			$disponibilite 	= $_SESSION['recherche']['disponibilite']; $genre = $_SESSION['recherche']['genre'] ; 
			$realisateur = 	$_SESSION['recherche']['realisateur'] 	; $acteur = $_SESSION['recherche']['acteur']; 
		}
		//on appelle la fonction de recherche
		$recherche = rechercheFilm($titre,$support,$disponibilite,$genre,$realisateur,$acteur,0,0);
		
		//on initialise les variables pour la pagination
		$nombre = 4 ;$donnée_a_transmettre="module=recherche&page";$total = count($recherche);
		//si on a l'id de la limite alors on la récupére
		if(isset($_GET['page'])){
			$nbpages = ceil($total/$nombre);
			if($_GET['page'] >= $total)
				header("location:index.php?module=error&action=error404");
			else{
				$page= $_GET['page'];
				$noPage = round($page / 4) + 1;
			}
		}
		else{//sinon on l'initialise
			$page = 0;
			$noPage = 1;
		}
		//on re-appelle la fonction de recherche cette fois ci avec la limite
		$recherche = rechercheFilm($titre,$support,$disponibilite,$genre,$realisateur,$acteur,$page,$nombre);	

		//Si on a des resultats on affiche, sinon on affiche un message d'erreur
		if($total > 0){
			echo '<h2 id="titre_rech">Resultat de la recherche ('.$total.') - Page n°'.$noPage.'</h2>';
			echo '<div id="liste_film">';
				foreach($recherche as $search){
					echo '<div id="bloc_film">';
						echo '<div id="bloc_film_image">';
							echo '<img src="commun/images/films/'.$search['Image'].'" height="120" width="90" />';
						echo '</div>';
						echo '<div id="bloc_film_descriptif">';
							echo '<h4><a href="index.php?module=descriptif&numFilm='.$search['NoFilm'].'">'.$search['Titre'].'</a></h4><br />
								  Genre : <em>'.$search['Genre'].'</em><br />
								  Réalisateur : <em>'.$search['Realisateur'].'</em><br />';
						echo '</div>';
						//Ajout selection
						echo '<div id="bloc_film_selection">';
							echo '<div id="bloc_film_selection_ajout">';
							echo '<td><form action="index.php?module=ajoutSelection" method="post">
										<input type="hidden" name="noFilm" value="'.$search["NoFilm"].'" />
                                        <div id="div_vhs">
                                            <img src="commun/images/vhs.jpg" height="30" widht="50">
                                            <input type="submit" name="VHS" class="bouton" id="submitVhs" value="Ajouter" />
                                        </div>
                                        <hr>
                                        <div id="div_dvd">
                                            <img src="commun/images/dvd.jpg" height="40" widht="50">
                                            <input type="submit" name="DVD" class="bouton" id="submitDvd" value="Ajouter" />
                                        </div>
								</form></td></tr>';
					echo '</div></div></div>';
					echo '<hr>';
				}
			echo '</div>';
			
			//Voir selection	
			echo '<form action="index.php?module=voirSelection" method="post">
				<input type="submit" class="bouton" value="Voir Selection" />
				</form>';
			echo displayNextPreviousButtons($page,$total,$nombre,$donnée_a_transmettre);
		}
		else{
			echo '<h3>Aucun Resultat ! </h3>';
		}

	//Lien de retour
	echo '<a href="index.php?module=accueilRecherche">Retour</a>';

?>