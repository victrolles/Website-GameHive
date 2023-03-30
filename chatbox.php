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
    <?php include "head.php";?>
    
    <body>
        <div class="wrapper d-flex">
    
            <div class="autre ">
                <?php echo "Pseudo : ".$pseudo."<br><br>"; ?>
                <div class="avatar"><img src=<?php echo "$avatar"?> alt="avatar"></div>
                <form action="#" method="post">
                    <input type="submit" name="deconnexion" value="Se déconnecter">
                </form>
                <?php
                if (isset($_POST["deconnexion"])){
                    Logout();
                    header("location: login.php");
                }
                ?>
            </div>

            <div class="friends">
                <h2 class="title">Contacts</h2>
                <div class="friends__search">
                <form action="#" method="post">
                    <input type="text" id="search-box" oninput="searchFriends()" name="profil_receiver" placeholder="profil_receiver">
                </form>
                </div>
                <div class="friends__lists" id="friends-container"></div>
            </div>
            
            <div class="conversations">
                <div class="conversations__header">
                    <div class="friends__lists__item">
                        <div class="avatar">
                            <?php if(isset($_SESSION["avatar_friend"])) {$avatar_friend = $_SESSION["avatar_friend"]; echo "<img src='$avatar_friend' alt='avatar'>";} ?>
                        </div>
                        <div class="name">
                            <?php if(isset($_SESSION["pseudo_friend"])) {echo $_SESSION["pseudo_friend"];} ?>
                    </div>
                </div>
                <div class="content">
                    <div id="message-list"></div>
                    <div class="message-send">
                        <form id="message-form" enctype="multipart/form-data">
                            <input type="file" id="img" name="picture" accept="image/png, image/jpeg"><br>
                            <input type="text" id="msg" name="message" placeholder="message">
                            <button type="submit">Send</button>
                        </form>
                    </div>
                    <div id="message-error"></div>
                </div>
            </div>
        </div>
    </body>
</html>