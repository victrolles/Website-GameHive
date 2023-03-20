<?php
session_start();
?>
<script src='javascript/functions.js'></script>

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
                    <input type="text" name="profil_receiver" placeholder="profil_receiver">
                    <input type="submit" name="search" value="search">
                </form>
                </div>
                <div class="friends__lists">
                    <?php DisplayAllFriends(); ?>
                </div>
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
                        <form action="#" method="post" enctype="multipart/form-data">
                            <input type="file" name="picture" accept="image/png, image/jpeg"><br>
                            <input type="text" name="message" placeholder="message">
                            <input type="submit" name="send" value="send">
                        </form>
                        <?php Send();
                        if (isset($_SESSION["id_friend"])){
                            echo "<script> displayMessages();</script>";
                        }
                        ?>
                    </div>
                </div>

            </div>
            
            <!-- <?php 
            if (isset($_SESSION["id_friend"])){
                echo "Vous êtes en conversation avec ".$_SESSION["pseudo_friend"];
            } else {
                echo "Vous n'êtes pas en conversation";
            }
            ?> -->
            
            
            
        </div>
    </body>
</html>