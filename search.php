<?php 

include_once "php/database.php";

if (!CheckLogin()){
    header("location: login.php");
}

?>
<html lang="fr">
    <?php include "php/header.php";?>
    
    <body>
        <div class="grid-container">
    
            <?php require_once('php/left-sidebar.php'); ?>
            <div class="main">

                



<?php

    $search_texte = $_GET['search_texte'];

    $sql = "SELECT
                POS.id AS id_post,
                PRO.pseudo, PRO.avatar,
                POS.texte,
                POS.date,
                POS.image
            FROM
                post POS
            INNER JOIN
                profil PRO
                    ON
                        POS.id_profil = PRO.id
            WHERE
                POS.texte LIKE '%#$search_texte%'
            ORDER BY
                date DESC";
    
    $data = mysqli_query($conn, $sql);

    function toDate($date) {
        $date = new DateTime($date);
        return $date->format('M d, Y - h:i A');
    }

    echo "<p class='page__title'>Search: #$search_texte</p>";

    if (mysqli_num_rows($data) == 0){

        echo "<p>No results found</p>";

    } else {


    while($row=mysqli_fetch_assoc($data))
    {
        $id = $row['id_post'];
        $pseudo = $row['pseudo'];
        $avatar = $row['avatar'];
        $post_text = $row['texte'];
        $post_date = $row['date'];

    ?>

    <div class="tweet__box">

        <div class="tweet__left">
            <img src="<?php echo $avatar?>" alt="avatar">
        </div>

        <div class="tweet__body">

            <a href="profil.php?pseudo=<?php echo $pseudo; ?>">

                <div class="tweet__header">

                    <p class="tweet__name"><?php echo $pseudo; ?></p>
                    <p class="tweet__date"><?php echo toDate($post_date)?></p>

                </div>

            </a>

            <p class="tweet__text"><?php echo $post_text; ?></p>

            <?php
            if (isset($row["image"]) && $row["image"] != ""){

                $row["image"] = str_replace("../", "", $row["image"]);
                
                echo "<div class='tweet__image'><img src='$row[image]' alt='Image'></div>";
            }?>
            
            <div class="tweet__icons">
                <a href=""><i class="far fa-comment"></i></a>
                <a href=""><i class="far fa-reply"></i></a>
                <a href=""><i class="far fa-heart"></i></a>
                <a href=""><i class="far fa-upload"></i></a>
                <a href=""><i class="far fa-chart-bar"></i></a>
            </div>
        </div>
    </div>

    <?php
        }
    }
    ?>





















            </div>
            <?php require_once('php/right-sidebar.php'); ?>
        </div>
    </body>
</html>