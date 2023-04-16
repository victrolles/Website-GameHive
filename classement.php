<script src='javascript/searchGame.js'></script>

<?php 

include_once "php/database.php";

if (!CheckLogin()){
    header("location: accueil.php");
}

?>

<html lang="fr">

    <?php include "php/header.php";?>
    
    <body>
        <div class="grid-container">
    
            <?php require_once('php/left-sidebar.php'); ?>

            <div class="main classement">

                <p class="page__title">Classement</p>

                <div class="search__bar">

                    <div class="left">

                        <div class="search-container ">

                            <a href="#" class="search-btn">
                                <i class="fa fa-search"></i>
                            </a>

                            <input type="text" id="gamemode-text" class="search-input" name="search" onclick="searchGamemodes()" oninput="searchGamemodes()" placeholder="Enter your gamemode">

                        </div>

                    </div>

                    <div class="right">

                        <p>Filter :</p>

                        <div class="search-container ">

                            <a href="#" class="search-btn">
                                <i class="fa fa-search"></i>
                            </a>

                            <input type="text" id="game-text" class="search-input" name="search" onclick="searchGames()" oninput="searchGames()" placeholder="Enter your game">

                        </div>

                    </div>

                    

                </div>

                <div id="gamemodes-container"></div>

                <div id="games-container"></div>

                <?php

                if (isset ($_GET['game_name']) && isset($_GET['gamemode']) ) {

                    if ($_GET['game_name'] != "" && $_GET['gamemode'] != "") {

                        ?>

                        <div class="classement__infos">

                            <div class="left">
                                    
                                    <p>Game : <?php echo $_GET['game_name']?></p>
    
                                    <p>Gamemode : <?php echo $_GET['gamemode']?></p>

                            </div>

                            <div class="right">

                                <div class='select' oninput='ClassementResult()'>
                                    <select id='classement-select'>
                                        <option value='0' selected>Global</option>
                                        <option value='1'>Friends</option>
                                        <option value='2'>Followings</option>
                                        <option value='3'>Followers</option>
                                    </select>
                                </div>

                            </div>

                        </div>

                        
                        <?php            
                    }
                }
                ?>

                <div id="result-container"></div>

            </div>

            <?php require_once('php/right-sidebar.php'); ?>
            
        </div>
    </body>
</html>