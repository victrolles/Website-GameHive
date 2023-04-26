<?php

session_start();
include "database.php";
ConnectDatabase();

global $conn;

$pseudo = $_COOKIE["pseudo"];
$id_profil = GetIdFromPseudo("");

if (isset($_GET['query'])) {

    $profil_receiver = $_GET['query'];

    $sql = "SELECT
            PRO.id,
            PRO.pseudo,
            PRO.avatar,
            MAX(MSG.time) as last_message_time
        FROM
            profil PRO
        INNER JOIN
            friend FRD ON (
                (id_profil1 = $id_profil
                 AND id_profil2 = PRO.id AND accepter = 1 AND
                    PRO.pseudo like '%$profil_receiver%')
                 OR
                (id_profil2 = $id_profil
                 AND id_profil1 = PRO.id AND accepter = 1 AND
                    PRO.pseudo like '%$profil_receiver%')
            )
        LEFT JOIN
            message MSG ON (
                MSG.id_sender = PRO.id AND MSG.id_receiver = $id_profil
            ) OR (
                MSG.id_sender = $id_profil AND MSG.id_receiver = PRO.id
            )
        GROUP BY
            PRO.id, PRO.pseudo, PRO.avatar
        ORDER BY
            last_message_time DESC";

}

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        $id = $row["id"];
        $pseudo = $row["pseudo"];
        $avatar = $row["avatar"];

        echo "  <div class='friends__lists__item'>

                    <div class='avatar'>
                        <a href='messagerie.php' onclick='connectToFriend($id);'>
                            <img class='ico' src='$avatar' alt='Avatar'>
                        </a>
                    </div>

                    <div class='pseudo'>
                        <a href='messagerie.php' onclick='connectToFriend($id);'>
                            <p>$pseudo</p>
                        </a>
                    </div>";

        $sql = "SELECT * FROM message WHERE id_receiver = '$id_profil' AND id_sender = '$id' AND vu = 0";

        $result2 = $conn->query($sql);

        if ($result2->num_rows > 0) {

            if (isset($_SESSION["id_friend"]) && $_SESSION["id_friend"] != $id) {

                echo "  <div class='statut'>
                            <img src='images/notif.png' alt='notification bell'>
                        </div>";

            } else {

                echo "  <div class='statut'>
                        </div>";
            }
        } else {

            echo "  <div class='statut'>
                    </div>";
        }
        echo "</div>";
    }
} else {

    echo "No friends.";
}

?>