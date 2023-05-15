<?php
include'page_accueil.php';


$mail_valide = false;
$mdp_valide = false;

// === verification du mail ===
$mail = 'pas_de_mail';
if( isset( $_POST['mailIns'] ) ) 
    $mail = $_POST['mailIns'];

$mail_valide = check_mail($fichier_stockage, $mail);


// === verification des mots de passe ===
$mdp     = 'pas_de_mot_de_passe';
$mdpconf = 'pas_de_mot_de_passe_de_confirmation';
if( isset( $_POST['mdpIns'] ) )         $mdp     = $_POST['mdpIns'];
if( isset( $_POST['mdpConfirmIns'] ) )  $mdpconf = $_POST['mdpConfirmIns'];

$mdp_valide = ( $mdp == $mdpconf );



// === Enregistrement & traitement des données ===
if(isset($_POST['nomIns']) && isset($_POST['prenomIns']) && isset($_POST['dateNaissanceIns']) && isset($_POST['mailIns']) && isset($_POST['numIns']) && isset($_POST['mdpIns']) && isset($_POST['choix']))
{
    $nom = $_POST['nomIns'];
    $prenom = $_POST['prenomIns'];
    $date = $_POST['dateNaissanceIns'];
    $num = $_POST['numIns'];
    $formule = $_POST['choix'];
}

if( !$mdp_valide || !$mail_valide ) // rester sur la page d'inscription, afficher le.s message.s d'erreur et re-remplir les données de l'utilisateur, sauf le mot de passe
{
    echo code_head(true);
    echo code_accueil($nom, $prenom, $date, $mail, $num, $formule, 2, !$mail_valide, !$mdp_valide);
}
else // passer à l'ecran de connexion et remplir l'adresse e-mail de l'utilisateur
{
    enregistrer_donnees($fichier_stockage, $_POST['nomIns'], $_POST['prenomIns'],  $_POST['dateNaissanceIns'], $_POST['mailIns'], $_POST['numIns'], $_POST['mdpIns'], $_POST['choix']);

    echo code_head(false);
    echo code_accueil($nom, $prenom, $date, $mail, $num, $formule, 1, false, false);
}

?>
