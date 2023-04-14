<?php
$pseudo_sidebar = $_COOKIE['pseudo'];
$sql = "SELECT * FROM profil WHERE pseudo = '$pseudo_sidebar'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$avatar_sidebar = $row["avatar"];
?>

<div class="sidebar">

    <ul style="list-style: none">
    <li><img class="ico" src="images/avatar.png" alt=""></li>
    <li class="active__menu"><i class="fa fa-home"></i><span><a href="accueil.php">Accueil</a></span></li>
    <li><i class="fa fa-hashtag"></i><span><a href="search_profile.php">Search Profile</a></span></li>
    <li><i class="far fa-star"></i><span><a href="classement.php">Classement</a></span></li>
    <li><i class="far fa-envelope"></i><span><a href="messagerie.php">Messages</a></span></li>
    <li><i class="fa fa-bookmark"></i><span><a href="badge_creator.php">Badge Creator</a></span></li>
    <li><i class="fa fa-user"></i><span><a href=<?php echo "profil.php?pseudo=$pseudo_sidebar"?>>Profile</a></span></li>
    </ul>

    <div class="profile">
        <img class="profile__avatar ico" src="<?php echo $avatar_sidebar; ?>" alt="">
        <div class="profile__info">
            <p class="profile__pseudo"><?php echo $pseudo_sidebar; ?></p>
        </div>
    </div>
    
    <form class="logout" method="post">
        <button class="sidebar__tweet" type="submit" name="deconnexion">Log out</button>
    </form>
    
</div>

<?php
if (isset($_POST["deconnexion"])){
    header("location: login.php");
}