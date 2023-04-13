<?php
session_start();
?>
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
            <div class="main">
                <div class="classement">
                    <div class="searchgame">
                        <h2 class="page__title">Search a Game</h2>
                        <div class="tweet__add">
                            <div class="search-container ">
                                <a href="#" class="search-btn">
                                    <i class="fa fa-search"></i>
                                </a>
                                <input type="text" id="search-box" name="search" oninput="searchGames()" placeholder="Search a Game" class="search-input">
                            </div>
                        </div>
                    </div>
                    <div class="searchgame">
                        <h2 class="page__title">Search a Gamemode</h2>
                        <div class="tweet__add">
                            <div class="search-container ">
                                <a href="#" class="search-btn">
                                    <i class="fa fa-search"></i>
                                </a>
                                <input type="text" id="search-box2" name="search" oninput="searchGamemodes()" placeholder="Search a Gamemode" class="search-input">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="friends__lists" id="games-container"></div>
                <div class="friends__lists" id="gamemodes-container"></div>
                <?php
                if (isset ($_GET['game_name']) && isset($_GET['gamemode']) ) {
                    if ($_GET['game_name'] != "" && $_GET['gamemode'] != "") {
                        echo "<div class='select' oninput='ClassementResult()'>";
                        echo "<select id='classement-select'>";
                        echo "<option value='0' selected>Global</option>";
                        echo "<option value='1'>Friends</option>";
                        echo "<option value='2'>Followings</option>";
                        echo "<option value='3'>Followers</option>";
                        echo "</select>";
                        echo "</div>";
                    }
                }
                ?>

                <div id="result-container"></div>
            </div>
            <?php require_once('php/right-sidebar.php'); ?>
        </div>
    </body>
</html>