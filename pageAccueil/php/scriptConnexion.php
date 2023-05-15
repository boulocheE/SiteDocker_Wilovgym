<?php
include 'page_accueil.php';

$mail = $_POST['mailCon'];
$mdp = $_POST['mdpCon' ];

$connexion = check_info_connexion($fichier_stockage, $mail, $mdp);

if( $connexion == 0 ) // connexion réussie
{
    session_start();
    $_SESSION['mail'] = $mail;
    header("Location: ../../compteClient/compteClient.php"); // rediriger vers l'espace utilisateur
}
else 
{
    echo code_head(false);
    if( $connexion == 1 ) echo code_accueil("", "", "", $mail, "", "", 1, false, true); // mot de passe incorrect
    else echo code_accueil("", "", "", $mail, "", "", 1, true, false);                  // mail incorrect
}

?>
