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

$numberOfFriends = GetNumberOfFriends($id_profil);
$numberOfBadges = GetNumberOfBadges($id_profil);
$numberOfPosts = GetNumberOfPosts($id_profil);
$numberOfFollowers = GetNumberOfFollowers($id_profil);
$numberOfFollowings = GetNumberOfFollowings($id_profil);

?>

<?php include "php/header.php"; ?>

<div class="grid-container">

    <?php require_once('php/left-sidebar.php'); ?>

    <div class="main profile">

        <p class="page__title">My Profile</p>

        <div class="container">

            <div class="profile__infos">

                <div class="left">

                    <img class='ico' src='<?php echo $avatar ?>' alt='avatar'>

                    <h2>Informations</h2>

                    <p><?php echo $prenom . " " . $nom; ?></p>

                    <p><?php echo $pseudo; ?></p>

                    <p><?php echo $description; ?></p>

                </div>

                <div class="right">

                    <?php

                    if ($pseudo == $_COOKIE["pseudo"]){

                        echo "  <div class='profile__edit'>
                                    <i class='far fa-edit'></i>
                                    <a href='edit_profile.php'>
                                        <p>Edit profile</p>
                                    </a>
                                </div>";
                    }

                    require_once('php/display_badges.php');
                    
                    ?>

                </div>

            </div>

            <h2>Statistiques</h2>

            <div class="profile__stats">

                <div class="left">

                    <p>Amis : <?php echo $numberOfFriends; ?></p>

                    <p>Badges débloqués: <?php echo $numberOfBadges; ?></p>

                    <p>Posts : <?php echo $numberOfPosts; ?></p>

                </div>

                <div class="right">

                    <p>Followers : <?php echo $numberOfFollowers; ?></p>

                    <p>Followings : <?php echo $numberOfFollowings; ?></p>

                </div>

            </div>

            <?php

            if ($pseudo == $_COOKIE["pseudo"]){

                echo "  <h2>Infos Complémentaires</h2>

                        <p>Date de naissance : $datedenaissance</p>

                        <p>Email : $email</p>";
            }












             

                
                

                

                if ($pseudo != $_COOKIE["pseudo"]){

                    $id_profil2 = GetIdFromPseudo($_COOKIE["pseudo"]);

                    echo "  <form action='php/friends_follows.php' method='post'>
                                <input type='hidden' name='id_profil' value='$id_profil'>
                                <input type='hidden' name='pseudo' value='$pseudo'>";

                    if (CheckIfFriend($id_profil2, $id_profil)){

                        if (CheckIfAccepted($id_profil2, $id_profil)){

                            echo "<input class = 'button__tweet' type='submit' name='submit' value='Unfriend'>";

                        } else {
                            if (CheckIfProfil1SentRequest($id_profil2, $id_profil))
                            {
                                echo "<input class = 'button__tweet' type='submit' name='submit' value='En Attente'>";

                            }else {

                                echo "<input class = 'button__tweet' type='submit' name='submit' value='Accepter'>";
                            }
                            
                        }
                    } else {

                        echo "<input class = 'button__tweet' type='submit' name='submit' value='Addfriend'>";
                    }

                    if (CheckIfFollowing($id_profil2, $id_profil)){

                        echo "<input class = 'button__tweet' type='submit' name='submit' value='Unfollow'>";

                    } else {

                        echo "<input class = 'button__tweet' type='submit' name='submit' value='Follow'>";
                    }

                    echo "</form>";
                }

            ?>

        </div>
    </div>

    <?php require_once('php/right-sidebar.php'); ?>

</div>