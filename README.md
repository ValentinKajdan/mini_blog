# Mini Blog

Mini Blog de Valentin Kajdan pour la LPDW

## Fonctionnalités

Il faut au préalable créer un compte dans la base de données à la main (le rôle n'a pas d'importance).

## Contenu

Un utilisateur non connecté (anonyme) peut visualiser tout le contenu du blog (catégories et articles) et poster des commentaires

paths :
  - /                  : homepage (liste des 5 derniers articles)
  - /articles          : liste de tous les articles
  - /articles/{id}     : détails d'un article par id (contenu et commentaires de l'article)
  - /categories        : liste de toutes les catégories
  - /categories/{id}   : détails d'une catégorie par id (affichage des articles correpondant)

### Connexion

paths :
  - /login             : formulaire de connexion

### Administration

Une fois connecté, l'utilisateur (admin) peut créer des articles et des catégories

paths :
  - /admin             : panel d'administration
  - /article/new       : création d'un nouvel article
  - /category/new      : création d'une nouvelle catégorie

Ces pages sont inaccessibles en étant présent en anonyme

### Réalisation

Les fonctionnalités suivantes sont mises en place :
  - Création d'article
  - Création de catégorie
  - Affichage et création de commentaire
  - Sécurité
  - Utilisation de formulaires Symfony (stylé avec materializecss)
  - L'utilisation d'un service pour compter le nombre de commentaires (j'ai créé le service et la fonction Twig mais je n'arrive pas à l'appeler)

Les fonctionnalités suivantes sont manquantes :
  - Présence et gestion des tags (Entity et mise en place faite mais pas d'affichage)
  - Suppression et modification de contenu (catégorie & articles)
  - Pagination sur la page qui liste les articles
