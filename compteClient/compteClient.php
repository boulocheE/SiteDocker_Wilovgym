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
			include '../pageAccueil/php/page_accueil.php';

			$mail = 'pas_de_mail';

			session_start();

			$session_valide = isset($_SESSION['mail']);
			if( $session_valide )
			{
				// session valide
				$mail = $_SESSION['mail'];
				$informations = get_tableau_info('../pageAccueil/php/'.$fichier_stockage, $mail);
				// tableau associatif respectant cette règle : nom_formule => 'prix€durée'
				$formules = [ 
					'vip' => '50€2',
					'premium' => '40€3',
					'basic' => '20€2',
					'etudiant' => '15€1'
				];
			}
		?>
		<section class = "informationsGenerales" >
			<h2> Formules </h2>

			<?php
			if($session_valide)
			{
				foreach ($formules as $nom_formule => $info_formule)
				{
					$infos = explode('€', $info_formule);
					$prix_formule = $infos[0];
						$duree_formule = $infos[1];
					
					// vérifier que les formules sont bien renseignées
					if( !isset($prix_formule) || !isset($duree_formule) ) echo '<p class="erreur">Erreur dans la récuperation des informations de formules</p>';

					echo '
					<article id = "'.$nom_formule.'">';

					if ( $informations['formule'] == $nom_formule )
							echo '<div id="formule_selectionee">';
						else
							echo '<div class = "info_formule">';

						echo '<ul>
								<li class = "titre_formule"><b>'.$nom_formule.'</b></li>
								<li class = "info_formule">Prix  :</li>
								<li class = "val_formule" >'.$prix_formule.'€</li>
								<li class = "info_formule">Durée :</li>
								<li class = "val_formule" >'.$duree_formule.'h</li>
							</ul>
						</div>
						<div class = "infoAcces"></div>
						<div class = "planning"></div>
					</article>';
				}
			}else{
				// la session a expiré
				echo '<h3>Session Expirée, Cliquer sur Déconnexion</h3>';
				header("Location: ../pageAccueil/php/scriptConnexion.php"); // rediriger vers l'espace utilisateur
			}
			?>

		</section>	

		<section class = "informationsPersonnelles">
			<h2> Informations Personnelles </h2>
			<?php
				if( $session_valide )
				{
					foreach ( $informations as $nom_info => $info )
					{
						if( $nom_info == 'mdp' )
						{
							echo '<a href="#"> modifier le mot de passe</a>'; 
						}
						else
						{
							echo '<h4>' . $nom_info . ' : ' . $info . '</h4>
							';
						}
					}
				}
			?>

			<div class = "divBtnDeconnexion">
				<input type = "button" id = "deconnexion" name = "deconnexion" value = "Déconnexion" onclick = "btnDeconnexion();">
			</div>
		</section>
	</body>

</html>