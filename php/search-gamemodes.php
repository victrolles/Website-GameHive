<?php
session_start();
include "database.php";
ConnectDatabase();
global $conn;

if (isset($_GET['query']) && !empty($_GET['query'])) {
    $profil_receiver = $_GET['query'];

    if (isset($_GET['game_name']) && $_GET['game_name'] != "null") {

        $game_name = $_GET['game_name'];

        $sql = "SELECT GAM.nom AS nom_game, MODE.nom AS nom_gamemode FROM gamemode MODE INNER JOIN game GAM ON MODE.id_game = GAM.id WHERE MODE.nom like '%$profil_receiver%' AND GAM.nom = '$game_name'";
    } else {

        $sql = "SELECT GAM.nom AS nom_game, MODE.nom AS nom_gamemode FROM gamemode MODE INNER JOIN game GAM ON MODE.id_game = GAM.id WHERE MODE.nom like '%$profil_receiver%'";
    }

} else {

    $sql = "SELECT GAM.nom AS nom_game, MODE.nom AS nom_gamemode FROM gamemode MODE INNER JOIN game GAM ON MODE.id_game = GAM.id";
}
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $game_name = $row["nom_game"];
        $gamemode_name = $row["nom_gamemode"];
        echo "<div class='friends__lists__item'>";
        echo "<div class='pseudo'><a href='classement.php?game_name=$game_name&gamemode=$gamemode_name'>$gamemode_name from $game_name</a></div>";
        echo "</div>";
    }
}

?>