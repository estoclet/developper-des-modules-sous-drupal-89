# Développer des modules sous Drupal 8/9

Voici le dépôt de codes pour le cours ["Développer des modules sous Drupal 8/9"](http://monpotedev.fr/tutos/developper-des-modules-sous-drupal-89).

**Soyez opérationnel en créant de puissants modules Drupal**

## Quel est le sujet de ce cours ?
Avec sa dernière version, Drupal 9, la célèbre plateforme de CMS open source a été mise à jour avec de nouvelles fonctionnalités permettant de créer facilement des applications Drupal complexes. Ce cours couvre ces nouvelles fonctionnalités de Drupal, vous aidant à rester au courant des déprédations du code et de l'architecture changeante à chaque version.

Ce cours couvre les aspects suivants : 
* Développer des modules Drupal 9 personnalisés pour vos applications
* Maîtriser les différents sous-systèmes et API de Drupal 9
* Modéliser, stocker, manipuler et traiter les données pour une gestion efficace des données
* Afficher les données et le contenu de manière propre et sûre en utilisant le système de thèmes
* Testez votre code pour éviter toute régression

## Instructions et navigations
Tout le code est organisé en dossiers. Par exemple, chapitre02.

Le code ressemblera à ce qui suit :
```
hello_world.hello:
  path: '/hello'
  defaults:
    _controller:  Drupal\hello_world\Controller\HelloWorldController::helloWorld
    _title: 'Notre première route'
  requirements:
    _permission: 'access content'
```
**Voici ce dont vous avez besoin pour ce cours :**
Si vous êtes un développeur Drupal et que vous souhaitez apprendre à utiliser Drupal 9 pour écrire des modules pour vos sites, ce cours est pour vous. Les créateurs de sites Drupal et les développeurs PHP ayant des compétences de base en programmation orientée objet trouveront également ce cours utile. Bien que ce ne soit pas nécessaire, une certaine expérience de Symfony vous aidera à comprendre facilement les concepts.

Avec la liste de logiciels et de matériel suivante, vous pouvez exécuter tous les fichiers de code présents dans le cours (chapitre 1-18).

### Logiciels et matériel requis

| chapitre  | Logiciels requis                                   | OS requis                    |
| --------- | -------------------------------------------------- | -----------------------------|
| 1-18      | Drupal 9 ou ultérieur(9.0.2, 9.0.3)                | Windows, Mac OS X, et  Linux |
| 1-18      | MySQL 5.7.8/MariaDB 10.3.7/Percona Server 5.7.8    | Windows, Mac OS X, et  Linux |
| 1-18      | Apache 2.4.7 ou ultérieur, Nginx 1.1 ou ultérieur  | Windows, Mac OS X, et  Linux |
| 1-18      | PHP 7.3 (installation via composer)                | Windows, Mac OS X, et  Linux |

## Installation

Pour mettre en place un environnement de développement local, procédez comme suit :

1. Exécutez les commandes suivantes :

```
$ docker-compose up -d
$ docker-compose exec php composer install
$ docker-compose exec php ./vendor/bin/run drupal:site-install
```

2. Rendez-vous sur [http://localhost:8080](http://localhost:8080) et vous avez un site Drupal fonctionnel. Pour vous connecter, utilisez `admin` / `admin`.

## Modules

Les modules couverts par le cours se trouvent dans le dossier "cours" à la racine du projet. Ils sont dupliqués dans chaque chapitre et sont liés par des liens symboliques individuels dans le dossier `custom` des modules de Drupal.

Par défaut, lors de la mise en place du projet, les modules du chapitre 2 sont liés par des liens symboliques. Vous pouvez changer cela en créant un fichier local `runner.yml` et en remplaçant la valeur `chapitre` qui est utilisée dans le lien symbolique (vérifier la valeur par défaut dans le fichier `runner.yml.dist`).

Une fois que cela est fait, vous pouvez exécuter la commande suivante pour symlinker les bons modules :

```bash
$ docker-compose exec php ./vendor/bin/run drupal:module-setup
```

## Mails

Tous les emails sortants utilisant l'expéditeur PHP natif sont capturés à l'aide de Mailhog. Vous pouvez accéder à ces courriels à l'adresse suivante : [http://localhost:8025](http://localhost:8025).

## Tests

Exécutez les tests comme suit :

```bash
$ docker-compose exec -u www-data php ./vendor/bin/phpunit
```

Ceci exécutera tous les tests dans les modules du cours configurés.

## Normes de codage

Pour exécuter la vérification des normes de codage, utilisez cette commande :

```bash
$ docker-compose exec php ./vendor/bin/run drupal:phpcs
```

Et cette commande pour essayer de résoudre automatiquement les problèmes de normes de codage qui surgissent :

```bash
$ docker-compose exec php ./vendor/bin/run drupal:phpcbf
```
