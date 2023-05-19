function cliqueBtnChoixCon ()
{
	// Modifier la couleur de connexion et inscription
	modifierCoulConIns( "choixIns", "choixCon" );

	// Afficher le formulaire de la connexion
	let formulaire = document.getElementById("formulaireConnexion");
	formulaire.style.display = 'block';

	// Effacer le formulaire de l'inscription
	let formulaireIns = document.getElementById("formulaireInscription");
	formulaireIns.style.display = 'none';
}


function cliqueBtnChoixIns()
{
	// Modifier la couleur de connexion et inscription
	modifierCoulConIns( "choixCon", "choixIns" );

	// Effacer le formulaire de la connexion
	let formulaireCons = document.getElementById("formulaireConnexion");
	formulaireCons.style.display = 'none';

	// Afficher le formulaire de l'inscription
	let formulaireIns = document.getElementById("formulaireInscription");
	formulaireIns.style.display = 'block';
}


function modifierCoulConIns ( choixViolet, choixGris )
{
	var choixCon = document.getElementById(choixViolet);
	choixCon.style.color  = "#BDC3C7";
	choixCon.style.borderBottom = "1px solid #BDC3C7";

	var choixIns = document.getElementById(choixGris);
	choixIns.style.color  = "#5C5792";
	choixIns.style.borderBottom = "1px solid #5C5792";
}


function ouvrirCGU()
{
	window.open( "../cgu.html", "CGU", "width=300,height=400" )
}