
<script src='javascript/searchProfile.js'></script>

<?php 

include_once "php/database.php";

if (!CheckLogin()){
    header("location: login.php");
}

?>
<html lang="fr">
    <?php include "php/header.php";?>
    
    <body>
        <div class="grid-container">
    
            <?php require_once('php/left-sidebar.php'); ?>
            <div class="main">
                <div class="friends">
                    <h2 class="page__title">Search Profile</h2>
                    <div class="tweet__add">
                        <div class="search-container ">
                            <a href="#" class="search-btn">
                                <i class="fa fa-search"></i>
                            </a>
                            <input type="text" id="search-box" name="search" placeholder="Search Profile" class="search-input">
                        </div>
                    </div>
                    <div class="friends__lists" id="friends-container"></div>
                </div>
            </div>
            <?php require_once('php/right-sidebar.php'); ?>
        </div>
    </body>
</html>