<?php

session_start();
include "database.php";
ConnectDatabase();

global $conn;

// Get the logged-in user's ID
$id_profil = GetIdFromPseudo("");
// Get the ID of the conversation partner
$id_profil_receiver = $_SESSION["id_friend"];

$sql = "SELECT DISTINCT
            id_sender
        FROM
            message
        WHERE
            id_receiver = '$id_profil'
        AND
            vu = 0";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        if ($row["id_sender"] == $id_profil_receiver) {

            echo "displayMessage";

        } else {

            echo "reloadFriends";
        }
    }
} else {
    
    echo "no result\n";
}