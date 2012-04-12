<?php
function banniere($page,$auteurs) {
	echo '<div id="header">
		<div id="banniere">
			<div id="titre">
				<h1>'.$page.'</h1>
			</div>
			<br />
			<div id="auteur">
				<h3>©'.$auteurs.'</h3>
			</div>
		</div>
		<div id="menu">
			<ul class="menu">
				<li class="menu"> <a href="index.php?module=accueil">Accueil</a> </li>
				<li class="menu"> <a href="index.php?module=accueildescriptif">Descriptif</a> </li>
				<li class="menu"> <a href="#">Recherche</a> </li>
				<li class="menu"> <a href="index.php?module=identificationD">IdentificationD</a> </li>
				<li class="menu"> <a href="index.php?module=identificationC">IdentificationC</a> </li>
			</ul>
		</div>
	</div>';
}

?>
