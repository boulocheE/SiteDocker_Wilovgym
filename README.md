> **Equipe 7 :** Bouloche Eleonore, Giromella Hugo, Renaut Thibaut
>
> **Groupe :** A
>
> **Année :** 1ère

**IUT Le Havre - Projet SAE 2.03**

### Mode d'emploi lancement du docker et appui pour la présentation.

## **Section 1 : Mode d'emploi lancement docker**

!!!Commande à exécuter dans le dossier où se trouve le dit Dockerfile

1. `Créer une image docker` : commande: docker build -t wilovgym_img 
2. `Démarrer le docker` : commande: docker run --name wilovgym -d -p 3307:80 wilovgym_gym

il vous suffira par le suite d'ouvrir un navigateur et de taper dans la barre d'adresse "localhost:3900", puis d'admirer notre travail!


## **Section 2 : Notre projet**

L'objectif de notre projet et de recréer le site d'une salle de sport fictive (WilovGym), avec un système d'inscription puis de connexion.

# Languages utilisés

Nous avons principalement utilisé de l'HTML/CSS et du PHP.
L'HTML/CSS nous à servi pour la présentation et le style de la page, et le PHP pour gérer la récupération des données et l'affichage de la page HTML.
Nous avons aussi utilisés du JavaScipt pour gérer le dynamisme ou encore afficher les cgu.

# Navigation sur le site

Vous arrivez sur la page de connexion, si vous n'avez pas encore de compte vous devez cliquer sur "Inscription" afin de rentrer vos coordonnées.
Atention! Nous avons fait en sorte de vérifier le format de l'adresse e-mail, ou encore que vous ne rentrez pas un mot de passe aléatoire, pour éviter les faux comptes.
Il est également vérifier que l'addresse e-mail rentrée n'est pas déjà utilisée.

Une fois inscris, vous serez redirigé vers la page de connexion, il vous suffit maintenant de retre votre adresse mail et votre mot de passe pour arriver sur la page d'acceuil du site, où vous pourrez retrouver les différents abonnements disponibles ainsi que vos informations personnelles.

# Problème majeur rencontrés

Nous avons remarqué avec d'autres équipes que docker ne trouvais pas les script.sh quand nous ne sommes pas propriétaire du projet.
Pour remédier à ce problème, nous avos supprimé ce fichier et mis directement ses instructions dans le dockerfile.

