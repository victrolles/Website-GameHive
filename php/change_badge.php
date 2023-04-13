<?php
include "database.php";
ConnectDatabase();
global $conn;

$sup_badge = $_GET["sup"];
$add_badge = $_GET["add"];
// Get the logged-in user's ID
$id_profil = GetIdFromPseudo("");
$pseudo = $_COOKIE["pseudo"];

// modify selected from badge and add selected to badge
$sql = "UPDATE unlocked_badge SET selected = 0 WHERE id_badge = '$sup_badge' AND id_profil = '$id_profil'";
$result = $conn->query($sql);
$sql = "UPDATE unlocked_badge SET selected = 1 WHERE id_badge = '$add_badge' AND id_profil = '$id_profil'";
$result = $conn->query($sql);

header("Location: ../profil.php?pseudo=$pseudo");