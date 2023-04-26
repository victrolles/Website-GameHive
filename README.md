# GameHive

![avatar (1)](https://user-images.githubusercontent.com/95492416/234552592-4f870a63-913d-45a4-8575-368a87474904.png)

## Important:

Avant tout, il est fortement conseillé de lire le README sur GitHub pour avoir les images et la mise en forme. Cependant si ce n'est pas possible, ce n'est pas grave car ce sont surtout des illustrations mais le lien de chaque image pourrait réduire la lisibilité et la compréhension.

Lien README: https://github.com/victrolles/Website-GameHive/blob/main/README.md

Le projet est save sur GitHub en Public :

Lien Projet : https://github.com/victrolles/Website-GameHive

## Introduction :

En lien avec l'UV WE4A, nous avons réalisé un **réseau social** sur le thème des **jeux vidéos**.
Nous nous sommes inspirés du réseau social **Twitter** et nous y avons ajouté **notre touche personnel** et **quelques fonctionnalités** en rapport avec le thème des jeux vidéos.

## Informations concernant l'execution du projet :

Pour un design optimal, il est conseillé de l'ouvrir sur **grand écran (1920x1080px)** avec un zoom par défault de 100%.
Taille minimal d'ouverture de la page : 1200x720px. Donc ne pas ouvrir sur téléphone mais possibilité sur tablette.

Pour un design optimal, il est conseillé de l'ouvrir sur **Google Chrome** (Firefox fonctionne également très bien).

### Instruction :

- Mettre le dossier **GameHive** à l'emplacement dédié du serveur local.
  (PS : nous avons utilisé **XAMPP** donc nous l'avions mis dans **htdocs**)

- Importer la base de donnée nommé **gamehive** stockée dans **GameHive->SQL->gamehive.sql**.
  (PS : le fichier **gamehive.sql** crée directement la database donc il n'est pas nécéssaire de la créer avant)

- Pour voir au mieux toutes les fonctionnalités, il est conseillé de se connecter sur le compte le plus complet : 
  - Identifiant : **victrolles** 
  - Mot de passe : **1234**
  (PS : la plupart des comptes ont le même mot de passe **1234**)

## Informations concernant la réalisation du projet :

### Site WEB :

- Réalisé en HTML, CSS, PHP, Javascript (ajax), SQL.
- Réalisé par les débutants **Victor Goudal** et **Osman Gaygusuz**.
- Réalisé sur le navigateur **Google Chrome**.
- Réalisé avec l'outil **XAMPP**.

### Inspiration :

Nous nous sommes inspirés de 2 vidéos pour le CSS du site :
- **Osman : TODO**
- **Osman : TODO**

### Aides complémentaires :

En plus d'avoir regardé des vidéos Youtube de Dgeo Dev et d'autres et des forums comme StackOverflow pour la globalité du projet, je (Victor Goudal) me suis fait aider par **ChatGPT** pour découvrir, apprendre et réalisé la partie Ajax et donc réalisé dans un premier temps la messagerie instantanée. J'ai tout de même très restreint son utilisation dans le reste du projet (différentes fichiers PHP, CSS, SQL).

### Répartition des tâches :

Nous avons, ensemble, brainstormé sur les fonctionnalités, réalisé les designs des modifications et fonctionnalités apportées sur papier et réalisé une première version de la base de donnée sur Creately.

- **Osman** :
  - Dessiné le logo GameHive.
  - Réalisé l'HTML et le CSS des pages (accueil.php et index.php).
  - Repris le PHP des pages **login.php et signup.php** (Victor) pour y implémenter le CSS.
  

- **Victor** :
  - Réalisé tout le **PHP, Javascript et AJAX** du site.
  - Repris le CSS des pages **signup.php et accueil.php** (Osman) pour faire le **CSS de toutes les autres pages**.
  - Réalisé le README et les commentaires.

## Information concernant la composition du site (BDD, fonctionnalités) :

Nous avons donc réalisé le site web d'un réseau social comportant de nombreuses pages commune pour réseau social et d'autres par rapport au thème des jeux vidéos. Voici toutes les pages :
- La page **d'accueil ou d'arrivée** des nouveaux arrivant (index.php)
- La page de **création de compte** (signup.php)
- La page de **connexion** (login.php)
- La page **principale** du compte (accueil.php)
- La page de **recherche de profil** (search_profile.php)
- La page de **classement** (classement.php)
- La page de **messagerie** privée et instantanée (messagerie.php)
- La page de **création de badge** (badge_creator.php)
- La page **profil** (profil.php)
- La page de **recherche de post** (search.php)
- La page pour **éditer son profil** (edit_profile.php)

### La base de donnée :

Voici ci-dessous la structure de la base de donnée faite sur Creately :

![bdd_creately](https://user-images.githubusercontent.com/95492416/234591519-89c3b318-7e79-46ce-b2a6-f9e2d03abd1e.png)

## Détails / Fonctionnalités importantes et notables:

Mis à part les pages index.php, login.php et signup.php, toutes les pages possèdes des inclusions d'autres fichiers php. La plus récurrentes est le ```require_once``` du **header.php**, du **left-sidebar.php** et du **right-sidebar.php** qui se trouves dans quasi toutes les pages.

Comme on peut le voir sur la page principale ci-dessous où l'on voit qu'elle est **divisé en 3 parties** suivant l'axe vertical :

![accueil](https://user-images.githubusercontent.com/95492416/234594804-5124268e-819e-46ee-9893-849703c59884.png)

### Page principale (accueil.php) :

La page principale, comme son nom l'indique possède le plus de fonctionnalité. On parlera aussi des fonctionnalités des **sidebars** sur cette page car elles sont équivalentes sur les **sidebars** de toutes les pages Web.

#### Left-sidebar :

- La couleur de la page sur laquel on est, permet à l'utilisateur de savoir sur quelle page il se trouve, on recupère l'information du lien grace à des fonctions **parse-url** et **path_info** : ![colorleftsidebar](https://user-images.githubusercontent.com/95492416/234600266-0291906c-dbca-4701-8e06-f4c3ed955b95.png)

#### Right-sidebar :

- La barre de recherche est fonctionnel et redirige vers la page **search.php** qui affiche tous les posts contenant le **mot-clé recherché** : ![searchrightsidebar](https://user-images.githubusercontent.com/95492416/234601812-f82adf61-6c37-4889-8aff-65a76f4b18a7.png)

- La division **Top 3 Trends** affiche directement **les 3 mot-clés avec # les plus postés**. Les 3 Trendings sont clickables et redirige vers la page **search.php** avec le #mot en tendance en mot-clé recherché :![trendrightsidebar](https://user-images.githubusercontent.com/95492416/234604229-d6104303-2a3b-41e3-8525-6c55bc76f0cd.png)
 
- Un raccourcie a été créé pour recevoir la notification et accepter les demandes d'amis (Il est aussi possible d'accepter les demandes d'amis en allant sur le profil du joueur) : ![demandeamisrightsidebar](https://user-images.githubusercontent.com/95492416/234604924-61bba786-e016-466d-8928-db5aebd8990b.png)

#### Main or Midbar :

- Seul la bar du milieu peut-être scrollée.
- Seul tes posts et les posts des gens que tu follow apparaissent.
- On peut **cliquer les pseudo pour voir leur profil**.
- Les posts t'appartenant peuvent être modifiés ou supprimés en déplacant la souris sur les **...**, ce qui affhiche les 2 boutons : ![deletemain](https://user-images.githubusercontent.com/95492416/234606682-4ab9f578-47fe-467a-89af-2f1ba7084de4.png)

### recherche de profil (search_profile.php) :

- On peut trié les profils en rentrant les premières lettres dans la bar de recherche, on a utilisé **Ajax** pour le faire de manière dynamique : ![searchprofile](https://user-images.githubusercontent.com/95492416/234611811-bc281dd8-ca19-45e7-923a-78dfcd2f93eb.png)

### classement (classement.php) :

La page classement permet aux joueurs de se comparer sur différents jeux et sur des modes de jeux comme par exemple les modes (multi ou classé), (solo, duo, trio, squad) sur les jeux multijoueurs.

- Grace à **Ajax**, on peut utiliser de manière dynamique la bar de recherche **Gamemode** et la bar de recherche filtre **Game** pour d'abord ou non trié par jeux et ensuite trouver le mode de jeux en question. Les propositions sont toutes affichées dans une division avec un scroll

- Puis grace à **Ajax** et **un Select**, on peut se **comparer avec ses amis, ses followers, ses followings et le global** : ![select](https://user-images.githubusercontent.com/95492416/234614994-d8cbf16a-b266-44d3-8851-aa8c1ac2b131.png)

- Les informations du jeu et gamemode sont affichées dans le lien pour permettre à l'utilisateur de pouvoir directement modifier s'il le souhaite.

### messagerie privée et instantanée (messagerie.php) :

- Si on a beaucoup d'amis, on peut rechercher de manière dynamique un amis.
- Tous les messages d'une conversation sont affichés et on peut scroll dans les messages.
- On peut cliquer sur le pseudo dans la conversation pour être rediregier vers son profile.
- On a système de notification qui check toutes les 2s et si t'es en conversation avec la personne, met à jour automatiquement les messages sinon affiche une cloche à côté du pseudo en question :  ![notif](https://user-images.githubusercontent.com/95492416/234623546-bef315f4-5633-45ac-b2d5-d128fff1046b.png)

### profil (profil.php) :

- Les badges sont des trophées acquis dans les jeux vidéos que tu peux mettre en avant dans ton profil. Si tu es l'auteur tu peux les changer comme montrer ci-dessous : ![badge](https://user-images.githubusercontent.com/95492416/234624612-1ac672fd-95ae-466a-9b12-7b5d82346693.png)

## Conclusion :

Ce projet nous aura été hyper enrichissant pour découvrir les bases du web tel que le fonctionnement du PHP, JS, Ajax, CSS, SQL. On a vraiment pu réaliser un site complet, fonctionnel et ergonomique, ce qui nous permettra d'avoir un projet concret et solide en WEB.
