<?php
session_start();
include "database.php";
ConnectDatabase();
global $conn;

$id_profil = GetIdFromPseudo("");

if (isset($_GET['game_name']) && isset($_GET['gamemode']) && isset($_GET['classement_select'])) {
    $game_name = $_GET['game_name'];
    $gamemode_name = $_GET['gamemode'];
    $classement_select = $_GET['classement_select'];

    switch ($classement_select) {
        case 0:
            $sql = "SELECT
                        PRO.avatar,
                        PRO.pseudo,
                        CLS.score
                    FROM
                        game GME
                    INNER JOIN
                        gamemode MDE
                            ON
                                GME.id = MDE.id_game
                    INNER JOIN
                        classement CLS
                            ON
                                MDE.id = CLS.id_gamemode
                    INNER JOIN
                        profil PRO
                            ON
                                CLS.id_profil = PRO.id
                    WHERE
                        GME.nom = '$game_name'
                    AND
                        MDE.nom = '$gamemode_name'
                    ORDER BY
                        CLS.score DESC";
            break;
        case 1:
            $sql = "SELECT DISTINCT
                        PRO.avatar,
                        PRO.pseudo,
                        CLS.score 
                    FROM
                        game GME 
                    INNER JOIN
                        gamemode MDE
                            ON
                                GME.id = MDE.id_game 
                    INNER JOIN
                        classement CLS
                            ON
                                MDE.id = CLS.id_gamemode 
                    INNER JOIN
                        profil PRO
                            ON
                                CLS.id_profil = PRO.id 
                    INNER JOIN
                        friend F
                            ON
                                (CLS.id_profil = F.id_profil1)
                            OR
                                (CLS.id_profil = F.id_profil2)
                    WHERE
                        GME.nom = '$game_name'
                    AND
                        MDE.nom = '$gamemode_name'
                    AND
                        (F.id_profil1 = '$id_profil' OR F.id_profil2 = '$id_profil')
                    AND
                        F.accepter = 1
                    ORDER BY
                        CLS.score DESC";
            break;
        case 2:
            $sql = "SELECT DISTINCT
                        PRO.avatar,
                        PRO.pseudo,
                        CLS.score 
                    FROM
                        game GME 
                    INNER JOIN
                        gamemode MDE
                            ON
                                GME.id = MDE.id_game 
                    INNER JOIN
                        classement CLS
                            ON
                                MDE.id = CLS.id_gamemode 
                    INNER JOIN
                        profil PRO
                            ON
                                CLS.id_profil = PRO.id 
                    INNER JOIN
                        follow F
                            ON
                                CLS.id_profil = F.id_followed
                            OR
                                CLS.id_profil = '$id_profil' 
                    WHERE
                        GME.nom = '$game_name'
                    AND
                        MDE.nom = '$gamemode_name' 
                    AND
                        (CLS.id_profil = '$id_profil' OR F.id_follower = '$id_profil')
                    ORDER BY
                        CLS.score DESC";
            break;
        case 3:
            $sql = "SELECT DISTINCT
                        PRO.avatar,
                        PRO.pseudo,
                        CLS.score 
                    FROM
                        game GME 
                    INNER JOIN
                        gamemode MDE
                            ON
                                GME.id = MDE.id_game 
                    INNER JOIN
                        classement CLS
                            ON
                                MDE.id = CLS.id_gamemode 
                    INNER JOIN
                        profil PRO
                            ON
                                CLS.id_profil = PRO.id 
                    INNER JOIN
                        follow F
                            ON
                                CLS.id_profil = F.id_follower
                            OR
                                CLS.id_profil = '$id_profil' 
                    WHERE
                        GME.nom = '$game_name'
                    AND
                        MDE.nom = '$gamemode_name' 
                    AND
                        (CLS.id_profil = '$id_profil' OR F.id_followed = '$id_profil')
                    ORDER BY
                        CLS.score DESC";
            break;
        default:
            $sql = "SELECT
                        PRO.avatar,
                        PRO.pseudo,
                        CLS.score
                    FROM
                        game GME
                    INNER JOIN
                        gamemode MDE
                            ON
                                GME.id = MDE.id_game
                    INNER JOIN
                        classement CLS
                            ON
                                MDE.id = CLS.id_gamemode
                    INNER JOIN
                        profil PRO
                            ON
                                CLS.id_profil = PRO.id
                    WHERE
                        GME.nom = '$game_name'
                    AND
                        MDE.nom = '$gamemode_name'
                    ORDER BY
                        CLS.score DESC";
            break;
      }
    
    $result = $conn->query($sql);

    echo "<div class='table'>";

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {

            $avatar = $row["avatar"];
            $pseudo = $row["pseudo"];
            $score = $row["score"];

            echo "  <div class='table__row'>

                        <div class='friends__lists__item left'>
                            <div class='avatar'>
                                <a href='profil.php?pseudo=$pseudo'>
                                    <img class='ico' src='$avatar' alt='avatar'>
                                </a>
                            </div>
                            <div class='pseudo'>
                                <a href='profil.php?pseudo=$pseudo'>
                                    <p>$pseudo</p>
                                </a>
                            </div>
                        </div>

                        <div class='score right'>
                            <p>$score</p>
                        </div>
                    </div>";
        }
    }

    echo "      <div class='table__row__end'>
                    <p>
                        <br>
                    </p>
                </div>
            </div>";
}

?>