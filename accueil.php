<!--
    Commentaire principale du projet :

    fichiers contenant des commentaires :

        - style.css


    Dossier :

        - Le dossier CSS contient le main fichier CSS "style.css" et les différents fichiers CSS contiennent le CSS spécifique à leur page.

        - Le dossier images contient toutes les images avec des sous-dossiers pour les images upload par l'utilisateur.

        - Le dossier javascript contient principalement du AJAX utilisé pour la messagerie et les bar de recherche.

        - Le dossier PHP contient soit des pages de redirection soit des pages appelées par les pages principales par des "ajax", "require_once" et "include".


    Points importants :

        - database.php :

            - Le fichier "php/database.php" reprend le votre et stocke la grande majorité des functions demandant des requêtes SQL,
            ce qui permet de rendre plus lisible les autres fichiers php qui servent d'afficher dans le site.
            Il n'est donc pas très lisible car nous n'avons pas mis de classe

        - header.php :

            - Le charset est défini en UTF-8

            - Le titre et l'icone ont été implémenté

            - On utilise les icons de "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"

            - On utilise les polices Poppins et Roboto

       
    Variables globales :

        Cookie :

            Utilisé uniquement pour le stocker le login de l'utilisateur :
            - "pseudo"
            - "encrypt_password"

        Session :

            Utilisé uniquement dans la messagerie pour se connecter à quelqu'un
            - "id_friend"


    A noter :

        - Une fonction "CheckLogin()" check systématiquement en début des pages WEB si le pseudo et le password correspondent.

        - Une fonction pré-faite "mysqli_real_escape_string()" permet d'éviter les problèmes aves les accents et les apostrophes.

        - Le mot de passe est crypté en mb5

        - Les images sont identifiées avec un code unique créé par "uniqid()"

        - Dès que le lien d'un photo est supprimer de la bdd, la photo est supprimer grace à "unlink()"



 -->

<?php

include "php/database.php";
require_once('php/header.php');

ob_start();

if (CheckLogin()==true){

    global $conn;

    $id_profil = GetIdFromPseudo("");

    $sql = "SELECT
                avatar
            FROM
                profil
            WHERE
                id = '$id_profil'";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $avatar = $row['avatar'];

} else {

    header("location: login.php");
}

?>

<body>

    <?php

    if(isset($_POST['btn_add_post'])){

        SendPost();
    }

    ?>

    <div class="grid-container">

        <?php require_once('php/left-sidebar.php'); ?>

        <div class="main">

            <p class="page__title">Home</p>

            <div class="tweet__box tweet__add">

                <div class="tweet__left">
                    <img src="<?php echo $avatar?>" alt="avatar">
                </div>

                <div class="tweet__body">

                    <form method="post" enctype="multipart/form-data">

                        <textarea name="post_text" id="" cols="100%" rows="3" placeholder="What's happening?" required></textarea>

                        <div class="tweet__icons-wrapper">

                            <div class="tweet__icons-add">
                                <input type="file" id="img" name="post_image" accept="image/png, image/jpeg">
                            </div>

                            <button class="button__tweet" type="submit" name="btn_add_post">Post</button>

                        </div>

                    </form>

                </div>

            </div>

            <?php require_once "php/tweet.php";?>

        </div>

        <?php require_once('php/right-sidebar.php'); ?>

    <?php
        if(isset($_GET['del'])){

            $Del_ID=$_GET['del'];

            // DELETE IMAGE from images folder
            $sql2 = "   SELECT
                            image
                        FROM
                            post
                        WHERE
                            id='$Del_ID'";

            $result = $conn->query($sql2);
            $row = $result->fetch_assoc();
            $image = $row['image'];

            if (file_exists($image)) {

                if (unlink($image)) {

                    echo "File deleted successfully.";

                } else {

                    echo "Error deleting the file.";
                }
            } else {

                echo "File not found.";
            }


            $sql="  DELETE FROM
                        post
                    WHERE
                        id='$Del_ID'";

            $post_query=$conn->query($sql);

            if($sql){
                
            header("Location: accueil.php");
            }
        }
    ?>

</body>