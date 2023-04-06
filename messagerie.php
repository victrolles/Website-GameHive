<?php
session_start();
?>
<script src='javascript/functions.js'></script>
<script src='javascript/checkStatut.js'></script>

<?php 
include_once "php/database.php";
if (CheckLogin()==true){
    global $conn;
    $pseudo = $_COOKIE["pseudo"];
    $sql = "SELECT * FROM profil WHERE pseudo = '$pseudo'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $avatar = $row["avatar"];
    $id_profil = $row["id"];
} else {
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
                    <h2 class="page__title">Contacts</h2>
                    <div class="tweet__add">
                        <div class="search-container ">
                            <a href="#" class="search-btn">
                                <i class="fa fa-search"></i>
                            </a>
                            <input type="text" id="search-box" name="search" oninput="searchFriends()" placeholder="Search Friend" class="search-input">
                        </div>
                    </div>
                    <div class="friends__lists" id="friends-container"></div>
                </div>
            </div>
            <div class="right__sidebar">
                <div class="conversations">
                    <div class="conversations__header">
                        <div class="friends__lists__item">
                            <div class="avatar">
                                <?php if(isset($_SESSION["avatar_friend"])) {$avatar_friend = $_SESSION["avatar_friend"]; echo "<img class='ico' src='$avatar_friend' alt='avatar'>";} ?>
                            </div>
                            <div class="name">
                                <?php if(isset($_SESSION["pseudo_friend"])) {echo $_SESSION["pseudo_friend"];} ?>
                        </div>
                    </div>
                    <div class="content">
                        <div id="message-list"></div>
                        <div class="tweet__body">
                            <form id="message-form" enctype="multipart/form-data">
                                <textarea name="message" id="msg" cols="100%" rows="2" placeholder="Write your message"></textarea>
                                <div class="tweet__icons-wrapper">
                                    <div class="tweet__icons-add">
                                        <input type="file" id="img" name="picture" accept="image/png, image/jpeg">
                                    </div>
                                    <button class="button__tweet" type="submit" name="btn_add_post">Send</button>
                                </div>
                            </form>
                        </div>




                        <div id="message-error"></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>