<?php
$addVerif = $_GET['mailCon'];
$mdpVerif = $_GET['mdpCon' ];


$myFileLecture = fopen("test.txt", "a+");

$connexionOk = 1;

while ( !feof($myFileLecture) || !$connexionOk === 3 )
{
    $ligne = fgets($myFileLecture);
    $cara = explode("\t", $ligne);

    if($addVerif === $cara[3])
    {
        $connexionOk = 2;
        if($mdpVerif === $cara[5])
        {
            //t'autorise à te connecter
            $connexionOk = 3;
        }
    }
}


// if( $connexionOk == 1)
// {
//     echo "Addresse mail incorrect!";
// }

// if( $connexionOk  == 2)
// {
//     echo "Mot de passe impossible";
// }

// if ( $connexionOk == 3 )
// {
//     echo "Connecté";
// }

?>
