<?php
session_start();
include "database.php";
ConnectDatabase();
global $conn;

$pseudo = $_COOKIE["pseudo"];
$id_profil = GetIdFromPseudo();

if (isset($_GET['query'])) {
    $profil_receiver = $_GET['query'];
    $sql = "SELECT PRO.id, PRO.pseudo, PRO.avatar FROM profil PRO inner join friend FRD WHERE id_profil1 = (SELECT id FROM profil WHERE pseudo = '$pseudo') AND id_profil2 = PRO.id AND PRO.pseudo like '%$profil_receiver%' OR id_profil2 = (SELECT id FROM profil WHERE pseudo = '$pseudo') AND id_profil1 = PRO.id AND PRO.pseudo like '%$profil_receiver%'";
} else {
    $sql = "SELECT PRO.id, PRO.pseudo, PRO.avatar FROM profil PRO inner join friend FRD WHERE id_profil1 = (SELECT id FROM profil WHERE pseudo = '$pseudo') AND id_profil2 = PRO.id OR id_profil2 = (SELECT id FROM profil WHERE pseudo = '$pseudo') AND id_profil1 = PRO.id";
}
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $pseudo = $row["pseudo"];
        $avatar = $row["avatar"];
        echo "<div class='friends__lists__item'>";
        echo "<div class='avatar'><a href='chatbox.php' onclick='connectToFriend($id);'><img src='$avatar' alt='Avatar'></a></div>";
        echo "<div class='pseudo'><a href='chatbox.php' onclick='connectToFriend($id);'>$pseudo</a></div>";

        $sql = "SELECT * FROM message WHERE id_receiver = '$id_profil' AND id_sender = '$id' AND vu = 0";
        $result2 = $conn->query($sql);
        if ($result2->num_rows > 0) {
            if (isset($_SESSION["id_friend"]) && $_SESSION["id_friend"] != $id) {
                echo "<div class='statut'><img src='images/notif.png' alt='notification bell'></div>";
            } else {
                echo "<div class='statut'></div>";
            }
        } else {
            echo "<div class='statut'></div>";}
        echo "</div>";
    }
} else {
    echo "No friends.";
}

?>