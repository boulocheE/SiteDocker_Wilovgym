<?php
$fichier_stockage = 'test.txt';


// $page_inscription = true => formulaire d'inscription // sinon formulaire de connexion
function code_head(bool $page_inscription = false) : string 
{
	$res =  '
<!DOCTYPE html>
<html lang = "fr">

	<head>
		<title> WilovGym </title>

		<meta charset = "utf-8">
		<meta content = "Author" lang = "fr" name = "BOULOCHE Eleonore">

		<link   rel = "stylesheet" href = "../index.css" media = "all" type = "text/css">
		<script src = "../script.js"></script>
		<script>';
		if( $page_inscription )
		{
			$res .= '
			window.onload = function() {
				cliqueBtnChoixIns();
			};';
		}
		else
		{
			$res .= '
			window.onload = function() {
				cliqueBtnChoixCon();
			};';
		}
		$res .= '</script>
	</head>';


	return $res;
}

// remplir_form = 0 => pas de formulaire rempli // = 1 formulaire de connexion rempli // = 2 fomulaire d'inscription rempli // = 3 formulaire d'inscription & de connexion remplis
function code_accueil(string $nom = "", string $prenom = "", string $date = "", string $mail = "", string $tel = "", string $formule = "", int $remplir_form = 0, bool $err_mail = false, bool $err_mdp = false) : string 
{
	if( trim($nom) == '' && trim($prenom) == '' && trim($date) == '' && trim($mail) == '' && trim($tel) == '' && trim($formule) == '' ) $remplir_form = 0; // rien a remplire si pas d'infos
	if( $formule != 'vip' && $formule != 'premium' && $formule != 'basic' && $formule != 'etudiant' ) $formule = 'vip'; // valueure par défaut de la formule
	$res = '
	<body>

		<h1> Bienvenue chez WilovGym </h1>

		<section>
			<input type = "button" id = "choixCon" value = "Connexion"   onclick = "cliqueBtnChoixCon();">
			<input type = "button" id = "choixIns" value = "Inscription" onclick = "cliqueBtnChoixIns();">


			<form id = "formulaireConnexion" action = "./scriptConnexion.php" method = "post">';

				if( $remplir_form == 1 || $remplir_form == 3 ) 	$res .= '<div class = "divMailCon"> <input type = "text"     id = "mailCon"  name  = "mailCon" placeholder = "adresse mail" value="'.$mail.'" required> </div>';
				
				else 											$res .= '<div class = "divMailCon"> <input type = "text"     id = "mailCon"  name  = "mailCon" placeholder = "adresse mail" required> </div>';

				if( ( $remplir_form == 1 || $remplir_form == 3 ) && $err_mail ) $res .= '<label for="mailCon"><p class="erreur">Adresse mail inconnue</p></label>';
				$res .= '<div class = "divMdpCon" > <input type = "password" id = "mdpCon"   name  = "mdpCon"  placeholder = "mot de passe" required> </div>';
				if( ( $remplir_form == 1 || $remplir_form == 3 ) && $err_mdp ) $res .= '<label for="mdpCon"><p class="erreur">Mot de passe Incorrect</p></label>';
				$res .= '<div class = "divBtnCon" > <input type = "submit"   id = "connexion" value = "Se connecter"                                  > </div>
			</form>


			<form id = "formulaireInscription" action = "./scriptInscription.php" method = "post">
				<div class = "divNomPrenomIns">
					<input type = "text" id = "nomIns"    name = "nomIns"    placeholder = "nom" ';
					if( $remplir_form == 2 || $remplir_form == 3 && trim($nom) != '' ) $res .= ' value = "'.$nom.'" ';
					$res .= 'required>
					<input type = "text" id = "prenomIns" name = "prenomIns" placeholder = "prenom" ';
					if( $remplir_form == 2 || $remplir_form == 3 && trim($prenom) != '' ) $res .= ' value = "'.$prenom.'" ';
					$res .= 'required>
				</div>

				<div class = "divDateNaisIns">
					<input type = "date" id = "dateNaissanceIns" name = "dateNaissanceIns" min="1970-01-01" ';
					if( $remplir_form == 2 || $remplir_form == 3 && trim($date) != '' ) $res .= ' value = "'.$date.'" ';
					$res .= ' required>
				</div>

				<div class = "divMailNumIns">
					<input type = "email" id = "mailIns" name = "mailIns"         placeholder = "nom.prenom@gmail.com" ';
					if( $remplir_form == 2 || $remplir_form == 3 && trim($mail) != '' ) $res .= ' value = "'.$mail.'" ';
					$res .= ' required>
					<input type = "tel"   id = "numIns"  name = "numIns"
					pattern = "0[0-9]{1}[ -.][0-9]{2}[ -.][0-9]{2}[ -.][0-9]{2}[ -.][0-9]{2}" placeholder = "+33X XX XX XX XX" ';
					if( $remplir_form == 2 || $remplir_form == 3 && trim($tel) != '' ) $res .= ' value = "'.$tel.'" ';
					$res .= '>';
					if( $remplir_form >= 2 && $err_mail ) $res .= '<label for = "mailIns" class="erreur"> Il existe déjà un compte associé à cette adresse mail </label>';
				$res .= '</div>

				<div class = "divMdpIns">
					<input type = "password" id = "mdpIns"        name = "mdpIns" minlength = "8" placeholder = "8 caractères minimum"      required>
					<input type = "password" id = "mdpConfirmIns" name = "mdpConfirmIns" minlength = "8" placeholder = "Confirmation mot de passe" required>';
					if( $remplir_form >= 2 && $err_mdp ) $res .= '<label for = "mdpIns"><p class="erreur">Les mots de passe ne correspondent pas</p></label>';

				$res .= '</div>

				<div class = "divChoixIns">
					<input type = "radio" id = "vipChoix"      name = "choix"      value = "vip"';
					if( $formule == 'vip' ) $res .= ' checked';
					$res .= '>
					<label for = "vipChoix"     > VIP      </label>

					<input type = "radio" id = "premiumChoix"  name = "choix"  value = "premium"';
					if( $formule == 'premium' ) $res .= ' checked';
					$res .= '>
					<label for = "premiumChoix" > Premium  </label>

					<input type = "radio" id = "basicChoix"    name = "choix"    value = "basic"';
					if( $formule == 'basic' ) $res .= ' checked';
					$res .= '>
					<label for = "basicChoix"   > Basique  </label>

					<input type = "radio" id = "etudiantChoix" name = "choix" value = "etudiant"';
					if( $formule == 'etudiant' ) $res .= ' checked';
					$res .= '>
					<label for = "etudiantChoix"> Etudiant </label>

				</div> 

				<div class = "reglement">
					<input type = "checkbox" id = "cgu" name = "cgu" required>
					<label for = "cgu"> J\'accepte les <a href = "#" onclick = "ouvrirCGU()">conditions générales d"utilisation</a> </label>
				</div>

				<div class = "divBtnIns"> <input type = "submit" id = "inscription" value = "S\'inscrire" > </div>
			</form>
			
		</section>

		<img src="../../images/gym.svg" alt="Image SVG">

	</body>

	</html>';


	return $res;
}

function check_mail(string $fichier, string $mail) : bool
{
	$fLiseur = fopen($fichier, 'r');

	if( $fLiseur == false ) return true; // le chichier n'existe pas donc pas d'adresse e-mail a verifier
	
	fgets($fLiseur); // passer 1 ligne

	while( !feof($fLiseur) )
	{
		$ligne = fgets($fLiseur);
		$info = explode("|", $ligne); // explode avec \t ne fonctionnait pas TODO : changer le separateur 
		if( isset($info[3]) && $info[3] == $mail )
		{
		fclose($fLiseur);
		return false; // le mail est déjà contenu dans le fichier
		}
	}

	fclose($fLiseur);
	return true; // pas de mail dans le fichier
}

function enregistrer_donnees (string $fichier, string $nom, string $prenom, string $dateNaissance, string $mail, string $tel, string $mdp, string $formule)
{
	$fEcriture = fopen($fichier, 'a');
	if( $fEcriture == false ) 
	{
		echo '<h2>Erreur d\'ouverture du fichier</h2>';
		return;
	}

	fputs($fEcriture, $nom.'|'.$prenom.'|'.$dateNaissance.'|'.$mail.'|'.$tel.'|'.$mdp.'|'.$formule."\n");
	fclose($fEcriture);
}

// return 0 si le mot de passe et le mail sont corrects // '1' si le mot de passe ne correspond pas au mail // '2' si pas de mail enregistré // '-1' si erreur 
function check_info_connexion(string $fichier, string $mail, string $mot_de_passe) : int
{
	// verifier que le mail existe : 
	
	$fLecture = fopen($fichier, 'r');

	if( $fLecture == false ) return -1;

	fgets($fLecture); // passer 1 ligne

	while( !feof($fLecture) )
	{
		$ligne = fgets($fLecture);
		$info = explode('|', $ligne);
		if( isset($info[3]) && $info[3] == $mail )
		{
			fclose($fLecture);
			if( $info[5] == $mot_de_passe )	return 0; // correct
			return 1; // mot de passe incorrect
		}
	}
	fclose($fLecture);
	return 2; // mail introuvable
}

function get_tableau_info(string $fichier, string $mail) : array
{
	$res = array();
	if( trim($mail) == '' ) return $res;

	// trouver la ligne de l'utilisateur
	$fLecture = fopen($fichier, 'r');

	if( $fLecture == false ) return $res;

	$ligne_1 = fgets($fLecture); // prendre la 1e ligne pour les noms d'informations
	$info_1 = explode('|', $ligne_1);
	
	while( !feof($fLecture) )
	{
		$ligne = fgets($fLecture);
		$info = explode('|', $ligne);
		if( isset($info[3]) && $info[3] == $mail )
		{
			$i = 0;
			foreach( $info as $information_unique )
			{
				$nom_colonne = $info_1[$i];
				$res[$nom_colonne] = $information_unique;
				$i++;
			}
			fclose($fLecture);
			return $res;
		}
	}
	fclose($fLecture);
	return $res; // pas d'addresse mail trouvée, tableau vide.
}
/*
<script>
let formulaire = document.getElementById( "formulaireInscription" );
formulaire.style.display = "none";
</script>
*/

?>