<?php

include_once "php/header.php";
include "php/database.php";

ConnectDatabase();

?>

<html>
    <body>

        <div class="grid-container">

            <?php require_once('php/left-sidebar.php'); ?>

            <div class="main">

                <p class="page__title">Badge Creator</p>

                <div class="container">

                    <section class="form badge_creator">

                        <header>Badge Creator</header>

                        <form method="post" enctype="multipart/form-data">

                            <br><br>

                            <div class="field input">
                                <label>Game</label>
                                <input type="text" name="game" placeholder="Game" required>
                            </div>

                            <br><br>

                            <div class="field input">
                                <label>Image du badge</label>
                                <input type="file" name="image" id="image" placeholder="Image" required>
                            </div>

                            <br><br>

                            <div class="field input">
                                <label>Description</label>
                                <textarea id="description" name="description" rows="3" cols="100%"></textarea>
                            </div>

                            <br><br>

                            <div class="field button">
                                <input class="button__tweet" type="submit" name="submit" value="Valider">
                            </div>

                            <br><br>

                        </form>
                    </section>
                </div>
            </div>

            <?php require_once('php/right-sidebar.php'); ?>

        <?php
            if (isset($_POST["submit"])){

                if (CheckExistingGame()==true){

                    echo "Ce jeu existe<br>";

                    CreateNewBadge();

                } else {
                    
                    echo "Ce jeu n'existe pas<br>";
                }
            }
        ?>

    </body>
</html>