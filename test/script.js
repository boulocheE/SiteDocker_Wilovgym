function btnDeconnexion ()
{
	window.location.href='../index.html';
}


function formuleVIP( mode )
{
	let formule;

	formule = document.getElementById("titreFormuleVip");
	formule.style.display = mode;

	formule = document.getElementById("divGaucheVip");
	formule.style.display = mode;

	formule = document.getElementById("divInfoVip");
	formule.style.display = mode;

	formule = document.getElementById("divGDroiteVip");
	formule.style.display = mode;
}


function formulePremium( mode )
{
	let formule;

	formule = document.getElementById("titreFormulePremium");
	formule.style.display = mode;

	formule = document.getElementById("divGauchePremium");
	formule.style.display = mode;

	formule = document.getElementById("divInfoPremium");
	formule.style.display = mode;

	formule = document.getElementById("divGDroitePremium");
	formule.style.display = mode;
}


function formuleBasique( mode )
{
	let formule;

	formule = document.getElementById("titreFormuleBasique");
	formule.style.display = mode;

	formule = document.getElementById("divGaucheBasique");
	formule.style.display = mode;

	formule = document.getElementById("divInfoBasique");
	formule.style.display = mode;

	formule = document.getElementById("divGDroiteBasique");
	formule.style.display = mode;
}


function formuleEtudiant( mode )
{
	let formule;

	formule = document.getElementById("titreFormuleEtudiant");
	formule.style.display = mode;

	formule = document.getElementById("divGaucheEtudiant");
	formule.style.display = mode;

	formule = document.getElementById("divInfoEtudiant");
	formule.style.display = mode;

	formule = document.getElementById("divGDroiteEtudiant");
	formule.style.display = mode;
}


function btnSuivant ( fleche, indice )
{
	if ( fleche == 'd' )
	{

		switch ( indice )
		{

			case 1 : {
				formuleVIP    ('none' );
				formulePremium('block');
			}

			case 2 : {
				formulePremium('none' );
				formuleBasique('block');
			}

			case 3 : {
				formuleBasique ('none' );
				formuleEtudiant('block');
			}

			case 4 : {
				formuleEtudiant('none' );
				formuleVIP     ('block');
			}

		}

	}


	if ( fleche == 'g' )
	{

		switch ( indice )
		{

			case 1 : {
				formuleVIP     ('none' );
				formuleEtudiant('block');
			}

			case 2 : {
				formuleEtudiant('none' );
				formuleBasique ('block');
			}

			case 3 : {
				formuleBasique ('none' );
				formulePremium ('block');
			}

			case 4 : {
				formulePremium ('none' );
				formuleVIP     ('block');
			}

		}

	}
}