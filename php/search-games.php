<?php

include "database.php";
ConnectDatabase();

global $conn;

if (isset($_GET['query'])) {

    $profil_receiver = $_GET['query'];

    $sql = "SELECT
                id,
                nom
            FROM
                game
            WHERE
                nom like '%$profil_receiver%'
            AND
                id != 3";

} else {

    $sql = "SELECT
                id,
                nom
            FROM
                game
            WHERE
                id != 3";
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<div class='dropdown-content-game'>";

    while($row = $result->fetch_assoc()) {

        $id = $row["id"];
        $game_name = $row["nom"];

        echo "  <div class='dropdown-content-game__item'>

                        <a href='classement.php?game_name=$game_name'>
                            <p>$game_name</p>
                        </a>
                    
                </div>";
    }

    echo "</div>";
}

?>