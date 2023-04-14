<?php

include "php/database.php";
global $conn;

if (!CheckLogin()){
    header("location: login.php");
}

if (isset($_GET["pseudo"]) && $_GET["pseudo"] != ""){
    $pseudo = $_GET["pseudo"];
    $id_profil = GetIdFromPseudo($pseudo);
    $sql = "SELECT * FROM profil WHERE pseudo = '$pseudo'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $prenom = $row["name"];
    $nom = $row["surname"];
    $avatar = $row["avatar"];
    $datedenaissance = $row["datedenaissance"];
    $email = $row["email"];
    $description = $row["description"];
} else {
    header("location: accueil.php");
}
?>

<?php include "php/header.php"; ?>

<div class="grid-container">

    <?php require_once('php/left-sidebar.php'); ?>
    <div class="main profile">
        <p class="page__title">My Profile</p>

        <div class="container">
            <?php 
                $numberOfFriends = GetNumberOfFriends($id_profil);
                $numberOfBadges = GetNumberOfBadges($id_profil);
                $numberOfPosts = GetNumberOfPosts($id_profil);
                $numberOfFollowers = GetNumberOfFollowers($id_profil);
                $numberOfFollowings = GetNumberOfFollowings($id_profil);

                echo "Prénom : $prenom";
                echo "<br>Nom : $nom";
                echo "<br>Pseudo : $pseudo";
                echo "<br>Description : $description";
                echo "<br><img class='ico' src='$avatar' alt='avatar'>";
                echo "<br>Nombre d'amis : $numberOfFriends";
                echo "<br>Nombre de badges : $numberOfBadges";
                echo "<br>Nombre de posts : $numberOfPosts";
                echo "<br>Nombre de followers : $numberOfFollowers";
                echo "<br>Nombre de followings : $numberOfFollowings<br>";

                if ($pseudo == $_COOKIE["pseudo"]){
                    echo "Date de naissance : $datedenaissance";
                    echo "<br>Email : $email<br>";
                }
                

                require_once('php/display_badges.php');

                if ($pseudo == $_COOKIE["pseudo"]){
                    echo "<br><a href='edit_profile.php'>Edit profile</a>";
                }

                if ($pseudo != $_COOKIE["pseudo"]){

                    $id_profil2 = GetIdFromPseudo($_COOKIE["pseudo"]);

                    echo "<form action='php/friends_follows.php' method='post'>";
                    echo "<input type='hidden' name='id_profil' value='$id_profil'>";
                    echo "<input type='hidden' name='pseudo' value='$pseudo'>";

                    if (CheckIfFriend($id_profil, $id_profil2)){
                        echo "<br><input type='submit' name='submit' value='Unfriend'>";
                    } else {
                        echo "<br><input type='submit' name='submit' value='Addfriend'>";
                    }

                    if (CheckIfFollowing($id_profil2, $id_profil)){
                        echo "<br><input type='submit' name='submit' value='Unfollow'>";
                    } else {
                        echo "<br><input type='submit' name='submit' value='Follow'>";
                    }
                    echo "</form>";
                }

            ?>
        </div>
    </div>
    <?php require_once('php/right-sidebar.php'); ?>

</body>
</html>