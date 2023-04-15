<?php
session_start();
include "database.php";
ConnectDatabase();

if (isset($_POST["id_friend"])) {

    $id_friend = $_POST["id_friend"];
    $_SESSION["id_friend"] = $id_friend;

    //check and remove unseen messages
    $pseudo = $_COOKIE["pseudo"];
    
    $sql = "UPDATE
                message
            SET
                vu = 1
            WHERE
                id_receiver = ( SELECT
                                    id
                                FROM
                                    profil
                                WHERE
                                    pseudo = '$pseudo')
            AND
                id_sender = '$id_friend'
            AND
                vu = 0";

    $conn -> query($sql);
}
?>