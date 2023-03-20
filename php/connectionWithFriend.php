<?php
session_start();
include "database.php";
ConnectDatabase();

if (isset($_POST["id_friend"])) {
    $id_friend = $_POST["id_friend"];
    $sql = "SELECT PRO.pseudo, PRO.avatar FROM profil PRO WHERE id = '$id_friend'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $_SESSION["id_friend"] = $id_friend;
    $_SESSION["pseudo_friend"] = $row["pseudo"];
    $_SESSION["avatar_friend"] = $row["avatar"];
    echo "id_friend $id_friend";
} else {
    echo "No id_friend";}
?>