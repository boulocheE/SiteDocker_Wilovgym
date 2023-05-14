function btnDeconnexion ()
{
	window.location.href='../index.html';
}


function donneePerso ( mailUser )
{
	var ligne;

	var nom;
	var prenom;
	var dateNaissance;
	var adrMail;
	var numTel;
	var formule;

	fetch('../')
		.then( data => {
			ligne = data.split('\n');

			for ( let cpt = 0; cpt < ligne.length; cpt ++ )
			{
				if ( ligne.split('\t')[3] == mailUser )
				{
					nom           = ligne.split('\t')[0];
					prenom        = ligne.split('\t')[1];
					dateNaissance = ligne.split('\t')[2];
					adrMail       = ligne.split('\t')[3];
					numTel        = ligne.split('\t')[4];
					formule       = ligne.split('\t')[6];
				}
			}
		})
		.catch(error => console.error(error));

}

// .then(response => response.text())