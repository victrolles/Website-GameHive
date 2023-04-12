<?php
include "database.php";
ConnectDatabase();
global $conn;

$value = $_POST["submit"];
$id_profil2 = $_POST["id_profil"];
$pseudo = $_POST["pseudo"];
$id_profil = GetIdFromPseudo("");

if ($value == 'Unfriend'){
    $sql = "DELETE FROM friend WHERE (id_profil1 = '$id_profil' AND id_profil2 = '$id_profil2') OR (id_profil1 = '$id_profil2' AND id_profil2 = '$id_profil')";
} else if ($value == 'Addfriend'){
    $sql = "INSERT INTO friend (id_profil1, id_profil2) VALUES ('$id_profil', '$id_profil2')";
} else if ($value == 'Unfollow'){
    $sql = "DELETE FROM follow WHERE id_follower = '$id_profil' AND id_followed = '$id_profil2'";
} else if ($value == 'Follow'){
    $sql = "INSERT INTO follow (id_follower, id_followed) VALUES ('$id_profil', '$id_profil2')";
}

$conn->query($sql);

header("Location: ../profil.php?pseudo=$pseudo");