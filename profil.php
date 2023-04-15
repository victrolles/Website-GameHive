<?php

include "php/database.php";
global $conn;

if (!CheckLogin()){

    header("location: login.php");
}

if (isset($_GET["pseudo"]) && $_GET["pseudo"] != ""){

    $pseudo = $_GET["pseudo"];
    $id_profil = GetIdFromPseudo($pseudo);

    $sql = "SELECT
                *
            FROM
                profil
            WHERE
                pseudo = '$pseudo'";

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

                echo "  <p>Prénom : $prenom</p>
                        <br>
                        <p>Nom : $nom</p>
                        <br>
                        <p>Pseudo : $pseudo</p>
                        <br>
                        <p>Description : $description</p>
                        <br>
                        <img class='ico' src='$avatar' alt='avatar'>
                        <br>
                        <p>Nombre d'amis : $numberOfFriends</p>
                        <br>
                        <p>Nombre de badges : $numberOfBadges</p>
                        <br>
                        <p>Nombre de posts : $numberOfPosts</p>
                        <br>
                        <p>Nombre de followers : $numberOfFollowers</p>
                        <br>
                        <p>Nombre de followings : $numberOfFollowings</p>
                        <br>";

                if ($pseudo == $_COOKIE["pseudo"]){

                    echo "  Date de naissance : $datedenaissance
                            <br>Email : $email<br>";
                }
                

                require_once('php/display_badges.php');

                if ($pseudo == $_COOKIE["pseudo"]){

                    echo "  <br>
                            <a href='edit_profile.php'>
                                <p>Edit profile</p>
                            </a>";
                }

                if ($pseudo != $_COOKIE["pseudo"]){

                    $id_profil2 = GetIdFromPseudo($_COOKIE["pseudo"]);

                    echo "  <form action='php/friends_follows.php' method='post'>
                                <input type='hidden' name='id_profil' value='$id_profil'>
                                <input type='hidden' name='pseudo' value='$pseudo'>";

                    if (CheckIfFriend($id_profil2, $id_profil)){

                        if (CheckIfAccepted($id_profil2, $id_profil)){

                            echo "  <br>
                                    <input type='submit' name='submit' value='Unfriend'>";

                        } else {
                            if (CheckIfProfil1SentRequest($id_profil2, $id_profil))
                            {
                                echo "  <br>
                                        <input type='submit' name='submit' value='En Attente'>";

                            }else {

                                echo "  <br>
                                        <input type='submit' name='submit' value='Accepter'>";
                            }
                            
                        }
                    } else {

                        echo "  <br>
                                <input type='submit' name='submit' value='Addfriend'>";
                    }

                    if (CheckIfFollowing($id_profil2, $id_profil)){

                        echo "  <br>
                                <input type='submit' name='submit' value='Unfollow'>";

                    } else {

                        echo "  <br>
                                <input type='submit' name='submit' value='Follow'>";
                    }

                    echo "</form>";
                }

            ?>

        </div>
    </div>

    <?php require_once('php/right-sidebar.php'); ?>

</div>