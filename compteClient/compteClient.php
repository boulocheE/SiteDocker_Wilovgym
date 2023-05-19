<!DOCTYPE html>
<html lang = 'fr'>

	<head>
		<title> Espace client </title>

		<meta charset = 'utf-8'>
		<meta content = 'Author' lang = 'fr' name = 'BOULOCHE Eleonore'>

		<link rel = 'stylesheet'    href = "tableauDeBord.css" media = 'all' type = 'text/css'>

		<script src = "script.js"></script>
	</head>

	<?php
		include '../pageAccueil/php/page_accueil.php';

		$mail = 'pas_de_mail';
		session_start();
		$session_valide = isset($_SESSION['mail']);

		if( $session_valide )
		{
			$mail = $_SESSION['mail'];
			$informations = get_tableau_info('../pageAccueil/php/'.$fichier_stockage, $mail);
			$formule_choisie = trim($informations['formule']);
		}
		else
			// la session a expiré
			header("Location: ../pageAccueil/php/scriptConnexion.php"); // rediriger vers l'espace utilisateur
	?>


	<body>
		<section class = "informationsGenerales" >
			<h2> Formules </h2>
			<?php
				if($formule_choisie == 'vip')
					echo '<article id = "vip" class="formuleChoisie">';
				else
					echo '<article id = "vip">';
			?>
				<div class = "info_formule">
					<h3> Formule : VIP </h3>
					<ul>
						<li> <b> Prix : </b> 359,99€ </li>
						<li> <b> Durée : </b> 12 mois avec engagement </li>
					</ul>
						
				<div class = "infoAcces">
					<ul>
						<li> Accès illimité aux équipements de musculation et de cardio </li>
						<li> Accès illimité aux cours collectifs </li>
						<li> Coaching personnalisé inclus </li>
						<li> Accès à des événements exclusifs </li>
						<li> Accès à des services supplémentaires </li>
						<li> Accès à des horaires d'ouverture étendus </li>
						<li> Accès à des équipements de pointe </li>
						<li> Accès à des vestiaires de luxe </li>
				</div>

			</article>


			<?php
				if($formule_choisie == 'premium')
					echo '<article id = "premium" class="formuleChoisie">';
				else
					echo '<article id = "premium">';
			?>
				<div class = "info_formule">
					<h3> Formule : Premium </h3>
					<ul>
						<li> <b> Prix : </b> 359,99€ </li>
						<li> <b> Durée : </b> 12 mois avec engagement </li>
					</ul>

				<div class = "infoAcces">
					<ul>
						<li> Accès illimité aux équipements de musculation et de cardio </li>
						<li> Accès illimité aux cours collectifs </li>
						<li> Coaching personnalisé inclus </li>
						<li> Accès à des événements exclusifs </li>
						<li> Accès à des services supplémentaires </li>
						<li> Accès à des horaires d'ouverture étendus </li>
						<li> Accès à des équipements de pointe </li>
						<li> Accès à des vestiaires de luxe </li>
					</ul>
				</div>

			</article>


			<?php
				if($formule_choisie == 'basic')
					echo '<article id = "basic" class="formuleChoisie">';
				else
					echo '<article id = "basic">';
			?>
				<div class = "info_formule">
					<h3> Formule : Basic </h3>

					<ul>
						<li> <b> Prix : </b> 239,99€ </li>
						<li> <b> Durée : </b> 12 mois avec engagement </li>
					</ul>

				<div class = "infoAcces">
					<ul>
						<li> Accès illimité aux équipements de musculation et de cardio </li>
						<li> Accès illimité aux cours collectifs </li>
						<li> Coaching non inclus </li>
						<li> Accès à des vestiaires communs </li>
					</ul>
				</div>

			</article>


			<?php
				if($formule_choisie == 'etudiant')
					echo '<article id = "etudiant" class="formuleChoisie">';
				else
					echo '<article id = "etudiant">';
			?>
				<div class = "info_formule">
					<h3> Formule : Etudiant </h3>

					<ul>
						<li> <b> Prix : </b> 189,99€ </li>
						<li> <b> Durée : </b> 12 mois avec engagement </li>
					</ul>

				<div class = "infoAcces">
					<ul>
						<li> Accès illimité aux équipements de musculation et de cardio </li>
						<li> Accès illimité aux cours collectifs </li>
						<li> Coaching non inclus </li>
						<li> Accès à des vestiaires communs </li>
					</ul>
				</div>

			</article>
		</section>

		<section class = "informationsPersonnelles">
			<h2> Paramètres </h2>
			<ul>
				<?php
				echo "<li class = 'typeInfo' > Nom </li>
				<li class = 'infoRenseigne' > ".trim($informations['nom']) ."</li>
				<li class = 'typeInfo' > Prenom </li>
				<li class = 'infoRenseigne' >". trim($informations['prenom']) ."</li>
				<li class = 'typeInfo' > Date de Naissance </li>
				<li class = 'infoRenseigne' >". trim($informations['dateNaissance']) ."</li>
				<li class = 'typeInfo' > Mail </li>
				<li class = 'infoRenseigne' >". trim($informations['mail']) ."</li>
				<li class = 'typeInfo' > Tel </li>
				<li class = 'infoRenseigne' > ".trim($informations['tel']) ."</li>";
				?>
			</ul>
			<div class = "divBtnDeconnexion">
				<input type = "button" id = "deconnexion" name = "deconnexion" value = "Déconnexion" onclick = "btnDeconnexion();">
			</div>
		</section>
	</body>

</html>