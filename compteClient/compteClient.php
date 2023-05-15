<!DOCTYPE html>
<html lang = 'fr'>

	<head>
		<title> Espace client </title>

		<meta charset = 'utf-8'>
		<meta content = 'Author' lang = 'fr' name = 'BOULOCHE Eleonore'>

		<link rel = 'stylesheet'    href = "tableauDeBord.css" media = 'all' type = 'text/css'>

		<script src = "script.js"></script>
	</head>



	<body>
		<?php
			$mail = 'pas_de_mail';
			session_start();
			if( isset($_SESSION['mail']) ) $mail = $_SESSION['mail'];
			echo '<h2>' . $mail . '</h2>';
		?>
		<section class = "informationsGenerales" >
			<h2> Formule </h2>


			<article id = "formuleVip">
				<div class = "infoG">
					<ul>
						<li class = "info">Prix  :</li>
						<li class = "val" ></li>
						<li class = "info">Durée :</li>
						<li class = "val" ></li>
					</ul>

				</div>

				<div class = "infoAcces"></div>
				<div class = "planning"></div>
			</article>


			<article id = "formulePremium">
				<div class = "infoG">
					<ul>
						<li class = "info">Prix  :</li>
						<li class = "val" ></li>
						<li class = "info">Durée :</li>
						<li class = "val" ></li>
					</ul>
				</div>

				<div class = "infoAcces"></div>
				<div class = "planning"></div>
			</article>


			<article id = "formuleBasique">
				<div class = "infoG">
					<ul>
						<li class = "info">Prix  :</li>
						<li class = "val" ></li>
						<li class = "info">Durée :</li>
						<li class = "val" ></li>
					</ul>

				</div>

				<div class = "infoAcces"></div>
				<div class = "planning"></div>
			</article>


			<article id = "formuleEtudiant">
				<div class = "infoG">
					<ul>
						<li class = "info">Prix  :</li>
						<li class = "val" ></li>
						<li class = "info">Durée :</li>
						<li class = "val" ></li>
					</ul>
				</div>

				<div class = "infoAcces"></div>
				<div class = "planning"></div>
			</article>

		</section>	

		<section class = "informationsPersonnelles">
			<h2> Informations Personnelles </h2>
			<?php
				include '../pageAccueil/php/page_accueil.php';
				$informations = get_tableau_info('../pageAccueil/php/'.$fichier_stockage, $mail);

				foreach ( $informations as $nom_info => $info )
				{
					echo '<h4>' . $nom_info . ' : ' . $info . '</h4>
					';
				}
			?>
			<h2> Paramètres </h2>

			<div class = "divBtnDeconnexion">
				<input type = "button" id = "deconnexion" name = "deconnexion" value = "Déconnexion" onclick = "btnDeconnexion();">
			</div>
		</section>
	</body>

</html>