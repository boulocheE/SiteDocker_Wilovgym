function page_accueil(){
    return '<!DOCTYPE html>
<html lang = 'fr'>

	<head>
		<title> WilovGym </title>

		<meta charset = \'utf-8\'>
		<meta content = \'Author\' lang = \'fr\' name = \'BOULOCHE Eleonore\'>

		<link   rel = \'stylesheet\' href = "pageAccueil/index.css" media = \'all\' type = \'text/css\'>
		<script src = "pageAccueil/script.js"></script>
	</head>


	<body>
		<h1> Bienvenue chez WilovGym </h1>

		<section>
			<input type = "button" id = "choixCon" value = "Connexion"   onclick = "cliqueBtnChoixCon();">
			<input type = "button" id = "choixIns" value = "Inscription" onclick = "cliqueBtnChoixIns();">


			<form id = "formulaireConnexion" action = "pageAccueil/php/scriptConnexion.php" method = "post">
				<div class = "divMailCon"> <input type = "text"     id = "mailCon"  name  = "mailCon" placeholder = "adresse mail" required> </div>
				<div class = "divMdpCon" > <input type = "password" id = "mdpCon"   name  = "mdpCon"  placeholder = "mot de passe" required> </div>
				<div class = "divBtnCon" > <input type = "submit"   id = "connexion" value = "Se connecter"                                  > </div>
			</form>


			<form id = "formulaireInscription" action = "pageAccueil/php/scriptInscription.php" method = "post">
				<div class = "divNomPrenomIns">
					<input type = "text" id = "nomIns"    name = "nomIns"    placeholder = "nom"    required>
					<input type = "text" id = "prenomIns" name = "prenomIns" placeholder = "prenom" required>
				</div>

				<div class = "divDateNaisIns">
					<input type = "date" id = "dateNaissanceIns" name = "dateNaissanceIns" min="1970-01-01" required>
				</div>

				<div class = "divMailNumIns">
					<input type = "email" id = "mailIns" name = "mailIns"         placeholder = "nom.prenom@gmail.com" required>
					<input type = "tel"   id = "numIns"  name = "numIns"
					       pattern = "0[0-9]{1}[ -.][0-9]{2}[ -.][0-9]{2}[ -.][0-9]{2}[ -.][0-9]{2}" placeholder = "+33X XX XX XX XX">
				</div>

				<div class = "divMdpIns">
					<input type = "password" id = "mdpIns"        name = "mdpIns" minlength = "8" placeholder = "8 caractères minimum"      required>
					<input type = "password" id = "mdpConfirmIns" name = "mdpIns" minlength = "8" placeholder = "Confirmation mot de passe" required>
				</div>

				<div class = "divChoixIns">
					<input type = "radio" id = "vipChoix"      name = "choix"      value = "vip" checked>
					<label for = "vipChoix"     > VIP      </label>

					<input type = "radio" id = "premiumChoix"  name = "choix"  value = "premium"        >
					<label for = "premiumChoix" > Premium  </label>

					<input type = "radio" id = "basicChoix"    name = "choix"    value = "basic"        >
					<label for = "basicChoix"   > Basique  </label>

					<input type = "radio" id = "etudiantChoix" name = "choix" value = "etudiant"        >
					<label for = "etudiantChoix"> Etudiant </label>

				</div>

				<div class = "reglement">
					<input type = "checkbox" id = "cgu" name = "cgu" required>
					<label for = "cgu"> J\'accepte les <a href = "#" onclick = "ouvrirCGU()">conditions générales d\'utilisation</a> </label>
				</div>

				<div class = "divBtnIns"> <input type = "submit" id = "inscription" value = "S\'inscrire" > </div>
			</form>


			<script>
				let formulaire = document.getElementById( "formulaireInscription" );
				formulaire.style.display = \'none\';
			</script>

		</section>

		<img src="images/gym.svg" alt="Image SVG">

	</body>

</html>
';
}