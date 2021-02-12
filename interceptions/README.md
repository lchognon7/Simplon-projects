# Interception 🐹 MVC

Le Consortium international des journalistes d'investigation (ICIJ), (en anglais « International Consortium of Investigative Journalists ») est une organisation à but non lucratif basée à Washington D.C.

Ce groupement est à l'origine des [Paradise Papers](https://fr.wikipedia.org/wiki/Paradise_Papers), une enquête internationale, qui a révélé les activités offshores de nombreuses personnalités et ainsi que des multinationales.

Aujourd'hui l'ICIJ se tourne vers vous pour *débugger* une petite plateforme web construite selon la méthode MVC par un développeur senior parti précipitamment en RDC.

## Votre mission

Pour remplir ces quatre missions, vous utiliserez votre flair ainsi que les identifiants fournis par le client (cf [Ressources](#ressources))
1. Il semblerait qu'un code commenté au mauvais endroit empêche le bon affichage de la page `index.php?login` .. mais où ?
2. Zut la page `index.php?backoffice` ne s'affiche pas. Le développeur sénior m'a parlé d'une vue manquante mais je n'ai pas compris. Vous comprenez, vous ?
3. Le routeur devrait pouvoir gérer `index.php?user-create`, là ce n'est pas le cas, vous pouvez y jeter un oeil svp ?
4. Normalement la homepage (le contrôleur par défaut) s'affiche en mode dark. C'est à dire fond noir et écriture blanche. Possible de corriger ça svp ?

**Et pour aller plus loin ...**

Flûte, on dirait que la suppression d'un utilisateur n'est pas possible...
- Pourriez-vous en identifier la raison svp ?
- Parviendrez-vous à réparer ça ? Merci !

## Modalités pédagogiques

Travail en groupe prédéfini par le formateur mais à rendu individuel à effectuer en une demi-journée.

## Ressources

- Export de la base de données (BDD)
- La BDD comprend une unique table `users` qui contient une seule entrée
- Voici le login & mot de passe qui vous permettront de vous connecter :
  - Identifiant : `will-fitzgibbon@icij.org`
  - Mot de passe : `Journalism that makes a difference`

## Livrables

- Lien vers le dépot Git contenant le projet modifié par vos soins
- Lien vers une démo en ligne

## Contexte du projet

```
A partir d'un back-end existant (qu'il ait été ou non réalisé par l'apprenant), je suis en mesure d'apporter des modifications majeurs aux traitements réalisés côté serveur.
En particulier, je suis en mesure d'ajouter de nouveaux traitements de données existantes voire de collecter ou de restituer de nouvelles données.

Critères d'évaluation
Le fonctionnement de l'application est conforme aux besoins exprimés dans le dossier de conception technique :
- les modifications demandées ont bien été appliqués,
- le back-end reste fonctionnel.

De plus, je veille à ce que le code réalisé soit documenté et testé (aussi bien d'un point de vue fonctionnel que sécurité).
```

## Album recommandé pour ce projet
[100th window](https://www.youtube.com/watch?v=FYVBx_1sgYY&list=OLAK5uy_n4MOZ1jMRSOCzcS1O7n1WpXgyTejYVB9E&index=1)