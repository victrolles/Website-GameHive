<?php

$pseudo_sidebar = $_COOKIE['pseudo'];

$sql = "SELECT
            *
        FROM
            profil
        WHERE
            pseudo = '$pseudo_sidebar'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$avatar_sidebar = $row["avatar"];

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$fileName = pathinfo($path, PATHINFO_FILENAME);

?>

<div class="sidebar">

    <ul style="list-style: none">
        <li>
            <img class="ico" src="images/avatar.png" alt="">
        </li>
        <li class="<?php echo ($fileName == 'accueil') ? 'active__menu' : ''; ?>">
            <i class="fa fa-home"></i>
            <span>
                <a href="accueil.php">
                    <p>Accueil</p>
                </a>
            </span>
        </li>
        <li class="<?php echo ($fileName == 'search_profile') ? 'active__menu' : ''; ?>">
            <i class="fa fa-hashtag"></i>
            <span>
                <a href="search_profile.php">
                    <p>Search Profile</p>
                </a>
            </span>
        </li>
        <li class="<?php echo ($fileName == 'classement') ? 'active__menu' : ''; ?>">
            <i class="far fa-star"></i>
            <span>
                <a href="classement.php">
                    <p>Classement</p>
                </a>
            </span>
        </li>
        <li class="<?php echo ($fileName == 'messagerie') ? 'active__menu' : ''; ?>">
            <i class="far fa-envelope"></i>
            <span>
                <a href="messagerie.php">
                    <p>Messages</p>
                </a>
            </span>
        </li>
        <li class="<?php echo ($fileName == 'badge_creator') ? 'active__menu' : ''; ?>">
            <i class="fa fa-bookmark"></i>
            <span>
                <a href="badge_creator.php">
                    <p>Badge Creator</p>
                </a>
            </span>
        </li>
        <li class="<?php echo ($fileName == 'profil') ? 'active__menu' : ''; ?>">
            <i class="fa fa-user"></i>
            <span>
                <a href=<?php echo "profil.php?pseudo=$pseudo_sidebar"?>>
                    <p>Profile</p>
                </a>
            </span>
        </li>
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

?>