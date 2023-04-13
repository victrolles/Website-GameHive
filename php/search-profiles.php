<?php
session_start();
include "database.php";
ConnectDatabase();
global $conn;

$pseudo = $_COOKIE["pseudo"];
$id_profil = GetIdFromPseudo("");

if (isset($_GET['query'])) {
    $profil_receiver = $_GET['query'];
    $sql = "SELECT id, avatar, pseudo FROM profil WHERE pseudo like '%$profil_receiver%' AND id != $id_profil";
} else {
    $sql = "SELECT id, avatar, pseudo FROM profil WHERE id != $id_profil";
}
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $pseudo = $row["pseudo"];
        $avatar = $row["avatar"];
        echo "<div class='friends__lists__item'>";
        echo "<div class='avatar'><a href='profil.php?pseudo=$pseudo'><img class='ico' src='$avatar' alt='Avatar'></a></div>";
        echo "<div class='pseudo'><a href='profil.php?pseudo=$pseudo'>$pseudo</a></div>";
        echo "</div>";
    }
} else {
    echo "No friends.";
}

?>