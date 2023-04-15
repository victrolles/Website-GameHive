<?php
include_once "database.php";

ConnectDatabase();

$id = $_GET['id'];
$id_personnel = GetIdFromPseudo("");

$sql = "UPDATE friend SET accepter = 1 WHERE id_profil1 = $id AND id_profil2 = $id_personnel";
$conn->query($sql);

header("location: ../accueil.php");
?>