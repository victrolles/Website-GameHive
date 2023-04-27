# GameHive

![avatar (1)](https://user-images.githubusercontent.com/95492416/234552592-4f870a63-913d-45a4-8575-368a87474904.png)

## Important :

Avant tout, il est fortement conseillé de lire le README sur GitHub pour avoir les images et la mise en forme. Cependant si ce n'est pas possible, ce n'est pas grave car ce sont surtout des illustrations mais le lien de chaque image pourrait réduire la lisibilité et la compréhension.

Lien README: https://github.com/victrolles/Website-GameHive/blob/main/README.md

Le projet est sauvegardé sur GitHub en Public :

Lien Projet : https://github.com/victrolles/Website-GameHive

Nous avons réalisé **3 commentaires groupés**, relative à leur langage, localisés dans les fichiers **accueil.php**, **functions.js** et **style.css**.

## Introduction :

En lien avec l'UV WE4A, nous avons réalisé un **réseau social** sur le thème des **jeux vidéos**.
Nous nous sommes inspirés du réseau social **Twitter** et nous y avons ajouté **notre touche personnelle** et **quelques fonctionnalités** par rapport au thème des jeux vidéos.

## Informations concernant l'exécution du projet :

Pour un design optimal, il est conseillé de l'ouvrir sur **grand écran (1920x1080px)** avec un zoom par défault de 100%.
Taille minimale d'ouverture de la page : 1200x720px. Donc ne pas ouvrir sur téléphone mais possibilité sur tablette.

Pour un design optimal, il est conseillé de l'ouvrir sur **Google Chrome** (Firefox fonctionne également très bien).

### Instructions :

- Mettre le dossier **GameHive** à l'emplacement dédié du serveur local.
  (PS : nous avons utilisé **XAMPP** donc nous l'avions mis dans **htdocs**)

- Importer la base de données nommée **gamehive** stockée dans **GameHive->SQL->gamehive.sql**.
  (PS : le fichier **gamehive.sql** crée directement la database donc il n'est pas nécessaire de la créer avant)

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

En plus du site Twitter, nous nous sommes inspirés de 2 vidéos pour le CSS du site  :
- Premièrement pour la page **index**, je (Osman GAYGUSUZ) me suis aidé de cette vidéo (https://www.youtube.com/watch?v=AhUIKhDbGCQ&t=51s&ab_channel=CodeAddict) afin d'avoir une base solide pour le developpement du site pour la partie **HTML et CSS**. J'ai appris à organiser le developpement de notre site en séparant les différentes fonctionnalités en différents fichiers et decouvert de nouvelles techniques pour coder plus rapidement.
- Deuxièmement pour la page **accueil**, je me suis inspiré de la page d'accueil de Facebook et de cette vidéo (https://www.youtube.com/watch?v=Se-P0ZK7sb4&t=24s&ab_channel=LightCode)
-Enfin je me suis inspiré du site **Twitter** pour réaliser le **CSS des pages login.php et signup.php** que nous avons utilisé pour **toutes les autres pages**.

### Aides complémentaires :

En plus d'avoir regardé des vidéos Youtube de Dgeo Dev et d'autres et des forums comme StackOverflow pour la globalité du projet, je (Victor Goudal) me suis fait aider par **ChatGPT** pour découvrir, apprendre et réaliser la partie Ajax et donc réaliser dans un premier temps la messagerie instantanée. J'ai tout de même très restreint son utilisation dans le reste du projet (différents fichiers PHP, CSS, SQL).

### Répartition des tâches :

Nous avons, ensemble, brainstormé sur les fonctionnalités, réalisé sur papier les designs des modifications et fonctionnalités apportées et réalisé une première version de la base de données sur Creately.

- **Osman** :
  - Dessin du logo GameHive.
  - Réalisation de l'HTML et du CSS des pages (accueil.php et index.php).
  - Reprise du PHP des pages **login.php et signup.php** (Victor) pour y implémenter le CSS.
  

- **Victor** :
  - Réalisation de tout le **PHP, Javascript et AJAX** du site.
  - Reprise du CSS des pages **signup.php et accueil.php** (Osman) pour faire le **CSS de toutes les autres pages**.
  - Réalisation du README et des commentaires.

## Informations concernant la composition du site (BDD, fonctionnalités) :

Nous avons donc réalisé le site web d'un réseau social comportant de nombreuses pages, certaines sont communes à la plupart des réseaux sociaux et les autres sont en rapport au thème des jeux vidéos. Voici toutes les pages :
- La page **d'accueil ou d'arrivée** des nouveaux arrivants (index.php)
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

Voici ci-dessous la structure de la base de données faite sur Creately :

![bdd_creately](https://user-images.githubusercontent.com/95492416/234591519-89c3b318-7e79-46ce-b2a6-f9e2d03abd1e.png)

## Détails / Fonctionnalités importantes et notables :

Mis à part les pages index.php, login.php et signup.php, toutes les pages possèdent des inclusions d'autres fichiers php. Les plus récurrentes sont le ```require_once``` du **header.php**, du **left-sidebar.php** et du **right-sidebar.php** qui se trouvent pratiquement dans toutes les pages.

Comme on peut le voir sur la page principale ci-dessous, celle-ci est **divisée en 3 parties** suivant l'axe vertical :

![accueil](https://user-images.githubusercontent.com/95492416/234594804-5124268e-819e-46ee-9893-849703c59884.png)

### Page principale (accueil.php) :

La page principale, comme son nom l'indique possède le plus de fonctionnalité. On parlera aussi des fonctionnalités des **sidebars** sur cette page car elles sont équivalentes sur les **sidebars** de toutes les pages Web.

#### Left-sidebar :

- La couleur de la page sur laquelle on est, permet à l'utilisateur de savoir sur quelle page il se trouve, on recupère l'information du lien grâce à des fonctions **parse-url** et **path_info** : ![colorleftsidebar](https://user-images.githubusercontent.com/95492416/234600266-0291906c-dbca-4701-8e06-f4c3ed955b95.png)

#### Right-sidebar :

- La barre de recherche est fonctionnelle et redirige vers la page **search.php** qui affiche tous les posts contenant le **mot-clé recherché** : ![searchrightsidebar](https://user-images.githubusercontent.com/95492416/234601812-f82adf61-6c37-4889-8aff-65a76f4b18a7.png)

- La division **Top 3 Trends** affiche directement **les 3 mot-clés avec # les plus postés**. Les 3 Trendings sont cliquables et redirige vers la page **search.php** avec le #mot en tendance en mot-clé recherché :![trendrightsidebar](https://user-images.githubusercontent.com/95492416/234604229-d6104303-2a3b-41e3-8525-6c55bc76f0cd.png)
 
- Un raccourci a été créé pour recevoir la notification et accepter les demandes d'amis (il est aussi possible d'accepter les demandes d'amis en allant sur le profil du joueur) : ![demandeamisrightsidebar](https://user-images.githubusercontent.com/95492416/234604924-61bba786-e016-466d-8928-db5aebd8990b.png)

#### Main or Midbar :

- Seul la barre du milieu peut-être scrollée.
- Seul tes posts et les posts des gens que tu suis apparaissent.
- On peut **cliquer sur les pseudos pour voir leur profil**.
- Les posts t'appartenant peuvent être modifiés ou supprimés en déplaçant la souris sur les **...**, ce qui affiche les 2 boutons : ![deletemain](https://user-images.githubusercontent.com/95492416/234606682-4ab9f578-47fe-467a-89af-2f1ba7084de4.png)

### Recherche de profil (search_profile.php) :

- On peut trier les profils en rentrant les premières lettres dans la barre de recherche. On a utilisé **Ajax** pour le faire de manière dynamique : ![searchprofile](https://user-images.githubusercontent.com/95492416/234611811-bc281dd8-ca19-45e7-923a-78dfcd2f93eb.png)

### Classement (classement.php) :

La page classement permet aux joueurs de se comparer sur différents jeux et sur des modes de jeux comme par exemple les modes (multi ou classé), (solo, duo, trio, squad) sur les jeux multijoueurs.

- Grâce à **Ajax**, on peut utiliser de manière dynamique la barre de recherche **Gamemode** et la barre de recherche filtre **Game** pour, d'abord ou non, trier par jeux et ensuite trouver le mode de jeux en question. Les propositions sont toutes affichées dans une division avec un scroll.

- Puis grâce à **Ajax** et **un Select**, on peut se **comparer à ses amis, ses followers, ses followings et le global** : ![select](https://user-images.githubusercontent.com/95492416/234614994-d8cbf16a-b266-44d3-8851-aa8c1ac2b131.png)

- Les informations du jeu et gamemode sont affichées dans l'url pour permettre à l'utilisateur de pouvoir directement les modifier s'il le souhaite.

### Messagerie privée et instantanée (messagerie.php) :

- Si on a beaucoup d'amis, on peut rechercher de manière dynamique un ami.
- Tous les messages d'une conversation sont affichés et on peut scroller dans les messages.
- On peut cliquer sur le pseudo dans la conversation pour être redirigé vers son profil.
- On a un système de notification qui vérifie toutes les 2s si on a reçu un nouveau message. Si tu es en conversation avec la personne, la messagerie est mise à jour automatiquement sinon elle affiche une cloche à côté du pseudo en question :  ![notif](https://user-images.githubusercontent.com/95492416/234623546-bef315f4-5633-45ac-b2d5-d128fff1046b.png)

### Profil (profil.php) :

- Les badges sont des trophées acquis dans les jeux vidéos que tu peux mettre en avant dans ton profil. Si tu es l'auteur, tu peux les changer comme montré ci-dessous : ![badge](https://user-images.githubusercontent.com/95492416/234624612-1ac672fd-95ae-466a-9b12-7b5d82346693.png)

## Conclusion :

Ce projet nous aura été hyper enrichissant pour découvrir les bases du web tel que le fonctionnement du PHP, JS, Ajax, CSS, SQL. On a vraiment pu réaliser un site complet, fonctionnel et ergonomique, ce qui nous permettra d'avoir un projet concret et solide en WEB pour l'avenir.
