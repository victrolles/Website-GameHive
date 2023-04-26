# GameHive

![avatar (1)](https://user-images.githubusercontent.com/95492416/234552592-4f870a63-913d-45a4-8575-368a87474904.png)

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

- Réalisé en HTML, CSS, PHP, Javascript (ajax).
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

- **Victor** : **Victor : TODO**

- **Osman** : **Osman : TODO**

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

### Détails / Fonctionnalités importantes et notables:

Mis à part les pages index.php, login.php et signup.php, toutes les pages possèdes des inclusions d'autres fichiers php. La plus récurrentes est le ```require_once``` du **header.php**, du **left-sidebar.php** et du **right-sidebar.php** qui se trouves dans quasi toutes les pages.

Comme on peut le voir sur la page principale ci-dessous où l'on voit qu'elle est **divisé en 3 parties** suivant l'axe vertical :

![accueil](https://user-images.githubusercontent.com/95492416/234594804-5124268e-819e-46ee-9893-849703c59884.png)

#### Page principale :

La page principale, comme son nom l'indique possède le plus de fonctionnalité. On parlera aussi des fonctionnalités des **sidebars** sur cette page car elles sont équivalentes sur les **sidebars** de toutes les pages Web.

##### Left-sidebar :

- La couleur de la page sur laquel on est, permet à l'utilisateur de savoir sur quelle page il se trouve, on recupère l'information du lien grace à des fonctions **parse-url** et **path_info** : ![colorleftsidebar](https://user-images.githubusercontent.com/95492416/234600266-0291906c-dbca-4701-8e06-f4c3ed955b95.png)

##### Right-sidebar :

- La barre de recherche est fonctionnel et redirige vers la page **search.php** qui affiche tous les posts contenant le **mot-clé recherché** : ![searchrightsidebar](https://user-images.githubusercontent.com/95492416/234601812-f82adf61-6c37-4889-8aff-65a76f4b18a7.png)

- La division **Top 3 Trends** affiche directement **les 3 mot-clés avec # les plus postés**. Les 3 Trendings sont clickables et redirige vers la page **search.php** avec le #mot en tendance en mot-clé recherché :![trendrightsidebar](https://user-images.githubusercontent.com/95492416/234604229-d6104303-2a3b-41e3-8525-6c55bc76f0cd.png)
 
- Un raccourcie a été créé pour recevoir la notification et accepter les demandes d'amis (Il est aussi possible d'accepter les demandes d'amis en allant sur le profil du joueur) : ![demandeamisrightsidebar](https://user-images.githubusercontent.com/95492416/234604924-61bba786-e016-466d-8928-db5aebd8990b.png)

##### Main or Midbar :

- Seul la bar du millieu peut-être scrollée.
- Seul tes posts et les posts des gens que tu follow apparaissent.
- Les posts t'appartenant peuvent être modifiés ou supprimés en déplacant la souris sur les **...**, ce qui affhiche les 2 boutons : ![deletemain](https://user-images.githubusercontent.com/95492416/234606682-4ab9f578-47fe-467a-89af-2f1ba7084de4.png)
