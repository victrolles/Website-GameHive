<?php

include "database.php";
ConnectDatabase();

global $conn;

$value = $_POST["submit"];
$id_profil2 = $_POST["id_profil"];
$pseudo = $_POST["pseudo"];
$id_profil = GetIdFromPseudo("");

if ($value == 'Unfriend'){

    $sql = "DELETE FROM
                friend
            WHERE
                (id_profil1 = '$id_profil' AND id_profil2 = '$id_profil2')
            OR
                (id_profil1 = '$id_profil2' AND id_profil2 = '$id_profil')";

} else if ($value == 'Addfriend'){

    $sql = "INSERT INTO
                friend (id_profil1, id_profil2, accepter)
            VALUES
                ('$id_profil', '$id_profil2', 0)";

} else if ($value == 'Unfollow'){

    $sql = "DELETE FROM
                follow
            WHERE
                id_follower = '$id_profil'
            AND
                id_followed = '$id_profil2'";

} else if ($value == 'Follow'){

    $sql = "INSERT INTO
                follow (id_follower, id_followed)
            VALUES
                ('$id_profil', '$id_profil2')";

} else if ($value == 'Accepter'){

    $sql = "UPDATE
                friend
            SET
                accepter = 1
            WHERE
                id_profil1 = '$id_profil2'
            AND
                id_profil2 = '$id_profil'";

} else {

    header("Location: ../profil.php?pseudo=$pseudo");
}

$conn->query($sql);

header("Location: ../profil.php?pseudo=$pseudo");

?>