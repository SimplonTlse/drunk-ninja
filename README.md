Coding Apéro - Ninja !
==============================


Install
---
- clone !
- composer install

Usage
---
```php artisan ninja```

## Le pitch

Un ninja veut devenir le meilleur au lancer de shurikens.

Pour devenir le meilleur, il s'entraîne en les lançant sur des cibles près d'un lac.

Si le shuriken touche la cible, il a le droit de le remettre dans sa sacoche, dans le cas contraire, il tombe à l'eau.

Toucher la cible lui rapporte des points. Faire tomber un shuriken lui en fait perdre.

Faire une suite d'une même action lui procure un bonus multiplicateur.

Afin d'être vraiment satisfait de son entraînement, il doit avoir marqué 200 points.

## Set de jeu

Voici un exemple de données concrètes qui peuvent être utilisées pour le jeu, vous pouvez librement les adapter.

- Nombre de shurikens dans la sacoche : 60

- Taux de réussite sur la cible : 70%

- Point si cible touchée : 1

- Point perdu si cible non touchée : 10

- Bonus de combo : x2 (Touchée : 1, 2, 4, 8... Ratée : 10, 20, 30...)

## Objectifs

Dans une programmation orientée objet, vous pourrez utiliser les apports des dernières versions de PHP 7.x

Nous recommandons de démarrer un nouveau projet avec composer et d'ajouter uniquement les dépendances dont vous avez besoin, par opposition à l'usage d'un framework.

L'application peut être lancée en ligne de commande, ou via un controleur web.

Le sujet offre des perspectives de contraintes et donc de tests unitaires.

## Pour aller plus loin

Si vous souhaitez aller plus loin, vous pouvez également intégrer une fonction de "log" qui permettra de retracer l'historique des lancer du ninja, voire de rejouer cet historique (event-sourcing).

Vous pouvez également aller donner un coup de main aux voisins.
