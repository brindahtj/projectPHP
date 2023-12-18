# Projet e-commerce en PHP procédural 

Dans ce projet nous allons créer un site e-commerce en PHP procédural avec une partie front-end et une partie back-end. Ce projet sera découpé en plusieurs étapes. Chaque étape sera à réaliser sur une journée de travail au maximum. Pour chaque étape, vous aurez un fichier etape.txt qui vous guidera dans la réalisation de l'étape. Le but de ce projet est de vous faire coder un projet complet en PHP procédural. Vous allez donc devoir utiliser toutes les connaissances acquises durant la formation. Vous aurez également des notions à rechercher par vous-même. 


## JOUR 1

### Etape 1

- Mise en place de l'environnement de travail 
- Création de la base de données et des tables
- Création du fichier init.php (Ce fichier contiendra la connexion à la bdd et les variables globales du site (chemin, racine, url, etc..)) afin de pouvoir l'appeler dans tous les fichiers du site sans avoir à refaire la connexion à la bdd
- Création des fichiers d'inclusion (header.php, footer.php et autres si besoin)
- Création du fichier function.php (Ce fichier contiendra toutes les fonctions)

### Etape 2 (creation de la table membre)
- membre:
    - id_membre(int, auto_increment primary key)
    - civilite(enum('m', 'f', 'a'))
    - pseudo(varchar(50) unique)
    - mdp(varchar(100))
    - nom(varchar(100))
    - prenom(varchar(100))
    - email(varchar(100) unique)
    - adresse(varchar(255))
    - code_postal(int 5 unsigned zerofill)
    - ville(varchar(100))
    - pays(varchar(100))
    - statut(int) // 0 = membre, 1 = admin
    - picture(varchar(255))
    - created_at(datetime)


### Etape 3 (Inscription)
Dans cette étape nous allons créer la partie inscription et connexion du site.

1. Traiter le formulaire d'inscription:

   `Tous les champs sont obligatoires sauf la photo`
    `Le pseudo doit contenir entre 4 et 20 caractères et ne doit contenir que des caractères alphanumériques (utiliser la fonction preg_match()) avec l'expression régulière suivante : '#^[a-zA-Z0-9.*-]+$#' et pour la longueur utiliser la fonction strlen()`
    `Le mot de passe doit contenir entre 4 et 20 caractères`
    `Le mot de passe et la confirmation doivent être identiques`
    `Vérifier si le pseudo existe déjà dans la bdd`
    `Vérifier si le mail existe déjà dans la bdd`
    `Crypter le mot de passe avec la fonction password_hash()`
    `Uploader la photo de profil de l'user dans le dossier photo si une photo a été uploadée`
    `Insérer le nouvel user dans la bdd`
    `Rediriger l'user vers la page connexion.php`


    Si l'inscription est réussie, on affiche un message de succès et on redirige l'user vers la page connexion.php
    Les messages d'erreur doivent être affichés en rouge et les messages de succès en vert
    Le formulaire doit être pré-rempli avec les données saisies par l'user en cas d'erreur
    Le message d'erreur doit être affiché en dessous du champ concerné
    Le message doit être explicite (ex: Le pseudo doit contenir entre 4 et 20 caractères et ne doit contenir que des caractères alphanumériques)

### Etape 4 (Connexion)

1. Traiter le formulaire de connexion:

    `Vérifier si le pseudo existe dans la bdd`
    `Vérifier si le mot de passe saisi correspond au mot de passe de cet user (Utiliser la fonction password_verify())`
    `Créer une session membre qui contiendra toutes les informations du membre connecté`
    `Rediriger l'user vers la page profil.php et lui afficher ces infos (Tout user qui n'est pas connecté ne pourra pas accéder à la page profil.php)`

    Si la connexion est réussie, on affiche un message de succès et on redirige l'user vers la page profil.php

2. Dans le fichier function.php Faites une fonction userConnected() qui vérifie si l'user est connecté . Cette fonction doit renvoyer un booléen et une fonction userIsAdmin() qui vérifie si l'user qui est connecté est admin.Cette fonction doit renvoyer un booléen

3. Si un qui user est déjà connecté essai d'accéder à la page connxion.php , vous devez le rediriger vers profil.php en utilisant la fonction header('location:')

4. Si l'user n'est pas connecté mais veux accéder à profil.php on le redirige vers index.php

5. Réorganiser les liens du menu en utilisant `<?php if(): ?>` lien du menu `<?php endif ?>`

    Si l'user est admin il doit voir Backoffice dans le menu profil qui pointe vers la page index.php qui se trouve dans admin

    Si l'user est connecté il verra dans son menu PROFIL - DECONNEXION

    Si l'user n'est pas connecté il ne verra que CONNEXION - INSCRIPTION & PANIER

6. Créer un fichier deconnexion.php qui permet de déconnecter l'user et de le rediriger vers la page index.php


### BONUS

1. En utilisant la fonction mail() de PHP, envoyer un mail à l'user qui vient de s'inscrire pour le remercier de son inscription et lui souhaiter la bienvenue sur le site.

2. Si l'utilisateur ne met pas de photo de profil,utiliser l'API de `[userrandome](https://randomuser.me/photos)` pour générer une photo de profil aléatoire en fonction du sexe de l'utilisateur.
   
3. Utiliser la SESSION pour gérer l'affichage des messages d'erreur et de succès. (ex: Si l'user actualise la page, le message doit disparaitre)


## JOUR 2

### Etape 5 (Gestion des produits)

1. Créer la table produit:
   - produit:
    - id_produit(int, auto_increment primary key)
    - reference(varchar(100) unique)
    - categorie(varchar(100))
    - titre(varchar(100))
    - description(text)
    - couleur(varchar(20))
    - taille(varchar(10))
    - public(enum('m', 'f', 'unisexe', 'enfant'))
    - photo(varchar(255))
    - prix(int)
    - stock(int)

2. Traiter le formulaire d'ajout de produit:

    `Tous les champs sont obligatoires`
    `La référence est unique et  doit contenir entre 4 et 20 caractères et ne doit contenir que des caractères alphanumériques `
    `Vérifier si la référence existe déjà dans la bdd`
    `Uploader la photo du produit dans le dossier photo si une photo a été uploadée`
    `Insérer le nouveau produit dans la bdd`
    `Rediriger l'user vers la page gestion_produit.php`

    Si l'ajout est réussi, on affiche un message de succès et on affiche le produit ajouté dans un tableau en dessous du formulaire avec un bouton modifier et supprimer.
    Les messages d'erreur doivent être affichés en rouge et les messages de succès en vert
    Le formulaire doit être pré-rempli avec les données saisies par l'user en cas d'erreur
    Le message d'erreur doit être affiché en dessous du champ concerné
    Le message doit être explicite (ex: La référence doit contenir entre 4 et 20 caractères et ne doit contenir que des caractères alphanumériques)

3. Au clic sur le bouton modifier, on pré-rempli le formulaire avec les infos du produit et on affiche un bouton modifier. Au clic sur ce bouton, on modifie le produit dans la bdd et on redirige l'user vers la même page.

4. Au clic sur le bouton supprimer, on supprime le produit de la bdd et on redirige l'user vers la même page.


### Etape 6 (Gestion des accès)

1. L'user doit être admin pour accéder à la partie back-office du site. Si l'user n'est pas admin et qu'il essaie d'accéder à la partie back-office, on le redirige vers la page index.php


### BONUS

1. Créer une table categorie:
   - categorie:
    - id_categorie(int, auto_increment primary key)
    - titre(varchar(100))

2. La table produit doit avoir une colonne categorie_id qui fait référence à la colonne id_categorie de la table categorie
   
3. Le titre de la catégorie doit être unique

4. Créer un fichier categorie.php qui permet d'ajouter, modifier et supprimer des catégories

5. Les catégories qui ne sont pas liées à un produit peuvent être supprimées

6. L'input categorie du formulaire d'ajout de produit doit être un select qui contient toutes les catégories de la bdd


## JOUR 3

### Etape 7 (Affichage des produits sur le front office)

1. Faite une requête qui récupère les 9 derniers produits ajoutés dans la bdd et affichez-les sur la page index.php

### Etape 8 (Affichage des produits dans la page boutique)

1. Faite une requête qui récupère tous les produits de la bdd et affichez-les sur la page boutique.php

2. Au clic sur un filtre (public, catégorie, couleur, taille), on récupère la valeur du filtre et on affiche les produits correspondants dans la page boutique.

3. Si aucun filtre n'est sélectionné, on affiche tous les produits.

4. Si aucun produit ne correspond à la recherche, on affiche un message qui indique qu'aucun produit ne correspond à la recherche.

### Etape 9 (Affichage des produits dans la page fiche produit)

1. Au clic sur un produit, on récupère l'id du produit et on affiche les détails du produit dans la page fiche_produit.php
2. Si l'id du produit n'existe pas dans la bdd, on redirige l'user vers la page index.php
3. Si l'id du produit n'est pas défini, on redirige l'user vers la page index.php
4. Si l'id du produit est vide, on redirige l'user vers la page index.php
5.  Si l'id du produit n'existe pas dans la bdd, on redirige l'user vers la page index.php



## JOUR 5 (Gestion du panier)

Au clic sur le bouton ajouter au panier,

1. envoyer l'user vers le fichier panier.php

2. Faire une fonction creation_panier() dans le fichier function.php qui va créer une session panier

3. Faire une fonction ajoutProduit() qui prend en argument l'id,la quantité et le prix qui vérifie première si le produit est dans dans le panier Utiliser array_search() pour la vérification. Si le produit y est déjà , on incrémente la quantité sinon on l'ajoute.

4. Créer une fonction montantTaotal() dans function.php qui calcul le montant total du panier

5. Afficher les produits qui sont dans le panier dans une table html(id ou titre du produit, quantité, prix unitaire puis le montant total)

6. Afficher le montant total du panier

7. Créer un bouton vider le panier qui permet de supprimer tous les produits du panier

8. Créer un bouton supprimer qui permet de supprimer un produit du panier


## JOUR 6 (Gestion des commandes)
Si l'user clic sur le bouton payer(Ce bouton doit être dans une balise form)

1. boucler sur le panier et récupérer tous les datas puis vérifier si la quantité est disponible en stock

2. Si la quantité demandé est supérieur à la quantité en stock alors on fera un ajustement de la quantité demandée

3. Faire une fonction retirerProduit() qui prend l'id du produit à supprimer et supprime le produit du panier
4. Si la quantité demandé est disponible en stock alors on fait une requête qui insère la commande dans la table commande et on fait une requête qui met à jour le stock du produit dans la table produit
5. On met à jour la table produit en soustrayant la quantité commandée à la quantité en stock
6. On vide le panier
7. On redirige l'user vers la page profil.php et on affiche un message de succès
8. On envoie un mail à l'user pour lui confirmer sa commande
9. On met a jour le stock du produit dans la table produit
10. On met à jour la partie mes commandes dans la page profil.php pour afficher la nouvelle commande






