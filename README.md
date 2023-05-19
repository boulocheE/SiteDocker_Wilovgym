> **Equipe 7 :** Bouloche Eleonore, Giromella Hugo, Renaut Thibaut
>
> **Groupe :** A
>
> **Année :** 1ère

**IUT Le Havre - Projet SAE 2.03**

### Mode d'emploi lancement du docker et appui pour la présentation.

## **Section 1 : Mode d'emploi lancement docker**

!!! Commande à exécuter dans le dossier où se trouve le dit Dockerfile

1. Créer une image docker : `build -t wilovgym_img`
2. Démarrer le docker : `docker run --name wilovgym -d -p 3307:80 wilovgym_gym`

Il vous suffira par la suite d'ouvrir un navigateur et de taper dans la barre d'adresse `localhost:3900`.


## **Section 2 : Notre projet**

L'objectif de notre projet et de recréer le site d'une salle de sport fictive (WilovGym), avec un système d'inscription et de connexion.

# Languages utilisés

Nous avons principalement utilisé de l'HTML/CSS et du PHP.
L'HTML/CSS nous à servi pour la présentation et le style de la page, et le PHP pour gérer la récupération des données et l'affichage de la page HTML.
Nous avons aussi utilisés du JavaScipt pour gérer le dynamisme ou encore afficher les cgu.

# Navigation sur le site

Vous arrivez sur la page de connexion.

Si vous n'avez pas encore de compte vous devez cliquer sur `Inscription` afin de rentrer vos coordonnées.

Atention! Nous avons fait en sorte de vérifier le format de l'adresse e-mail. Les mots de passes doivent être équivalents pour être validé. Concernant le numéro de téléphones, vous devez mettre un **espace**, un **-** ou un **.**.

De plus, une adresse mail ne peut être utilisée **qu'une seule fois**. La vérification est effectuée avant d'enregistrer les données.

Une fois inscrit, vous serez redirigés vers la page de connexion. Il vous suffit maintenant de retrer votre adresse mail et votre mot de passe pour arriver sur la page d'acceuil du site. Sur cette dernière, vous aurez la possibilité de retrouver :
- vos informations personnelles ;
- les différentes formules ( contient le prix, la durée, et ce à quoi donne accès l'abonnement )

# Problème majeur rencontrés

Nous avons remarqué avec d'autres équipes que docker ne trouvait pas les ficheirs `script.sh`, lorsque nous ne sommes pas propriétaire du projet.
Pour remédier à ce problème, nous avons supprimé ce fichier et mis directement ses instructions dans le `Dockerfile`.
