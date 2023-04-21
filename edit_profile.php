<?php 

include_once "php/database.php";

if (!CheckLogin()){
    header("location: accueil.php");
}

?>
<html lang="fr">

    <head>
        <link rel="stylesheet" href="css/signup.css">
    </head>

    <?php include "php/header.php";?>
    
    <body>
        <div class="grid-container">
    
            <?php require_once('php/left-sidebar.php'); ?>

            <div class="main form signup">

                <div class="title">
                    <h1>Modifier mon profil</h1>
                </div>

                <div class="report">
                    <p>Modifier seulement les éléments nécessaires</p>
                    <p>Les données non remplies ne seront donc pas modifiées !</p>
                </div>

                <form action="php/redirect_edit_profile.php" method="POST" enctype="multipart/form-data">

                    <div class="field input">
                        <label>Prénom</label>
                        <input type="text" name="name" placeholder="prenom">
                    </div>

                    <div class="field input">
                        <label>Nom</label>
                        <input type="text" name="surname" placeholder="nom">
                    </div>

                    <div class="field input">
                        <label>Pseudo</label>
                        <input type="text" name="pseudo" placeholder="pseudo">
                    </div>

                    <div class="field input">
                        <label>Date de naissance</label>
                        <input type="date" name="datedenaissance">
                    </div>

                    <div class="field input">
                        <label>Adresse email</label>
                        <input type="text" name="email" placeholder="adresse email">
                    </div>

                    <div class="field image">
                        <label>Choisir une image</label>
                        <input type="file" name="image" accept="image/png, image/jpeg">
                    </div>

                    <div class="field input">
                        <label>Description</label>
                        <input type="text" name="description" placeholder="description">
                    </div>

                    <div class="field button">
                        <input type="submit" name="submit" value="Valider">
                    </div>

                </form>

            </div>

            <?php require_once('php/right-sidebar.php'); ?>
            
        </div>
    </body>
</html>