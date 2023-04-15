<?php

$id_profil = GetIdFromPseudo("");

$query = "  SELECT
                POS.id AS id_post,
                PRO.id AS id_profil,
                pseudo,
                avatar,
                texte,
                POS.date,
                image
            FROM
                post POS
            INNER JOIN
                profil PRO
                    ON
                        PRO.id = POS.id_profil
            WHERE
                id_profil = $id_profil
            OR
                id_profil IN (  SELECT
                                    id_profil
                                FROM
                                    follow
                                WHERE
                                    id_follower = $id_profil)
            ORDER BY
                date DESC";

$data = mysqli_query($conn, $query);

function toDate($date) {
    $date = new DateTime($date);
    return $date->format('M d, Y - h:i A');
}

if (isset($_GET['modifyId']) && $_GET['modifyId'] != "" && CheckPostsBelongingToUser($_GET['modifyId'])) {

    $modifiedId = $_GET['modifyId'];

    $sql = "SELECT
                *
            FROM
                post
            WHERE
                id = $modifiedId";

    $result = $conn->query($sql);
    $row2 = $result->fetch_assoc();
    $modifiedText = $row2['texte'];

    $sql = "SELECT
                avatar
            FROM
                profil
            WHERE
                id = '$id_profil'";

    $result2 = $conn->query($sql);
    $row3 = $result2->fetch_assoc();
    $avatar = $row3['avatar'];

    ?>

    <div class="tweet__box tweet__add">

        <div class="tweet__left">
            <img src="<?php echo $avatar?>" alt="avatar">
        </div>

        <div class="tweet__body">

            <h2 class="title__modify">Modify your tweet</h2>

            <form action="php/redirect_edit_post.php" method="post" enctype="multipart/form-data">

                <textarea name="modified_post_text" id="" cols="100%" rows="3" required><?php echo $modifiedText;?></textarea>

                <input type="hidden" name="modified_post_id" value="<?php echo $modifiedId;?>">

                <?php
                    if (isset($row2["image"]) && $row2["image"] != ""){
                        $row2["image"] = str_replace("../", "", $row2["image"]);

                        echo "  <div class='tweet__image'>
                                    <div class='relative-image'>
                                        <img src='$row2[image]' alt='Image'>
                                        <div class='cross'>
                                            <a href='php/deleteImageFromPost.php?postId=$modifiedId'>
                                                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'>
                                                    <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                    <path d='M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z'/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>";
                    }
                ?>

                <div class="tweet__icons-wrapper">

                    <div class="tweet__icons-add">
                        <input type="file" id="img" name="image" accept="image/png, image/jpeg">
                    </div>

                    <button class="button__tweet" type="submit" name="btn_modify_post">Modify</button>

                </div>

            </form>
        </div>
    </div>

    <?php

    while($row=mysqli_fetch_assoc($data))
    {
        $id = $row['id_post'];
        $pseudo = $row['pseudo'];
        $avatar = $row['avatar'];
        $post_text = $row['texte'];
        $post_date = $row['date'];

        if ($id != $modifiedId) {
            
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

                    echo "  <div class='tweet__image'>
                                <img src='$row[image]' alt='Image'>
                            </div>";
                }
                
                ?>
                
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

                echo "  <div class='tweet__image'>
                            <img src='$row[image]' alt='Image'>
                        </div>";
            }
            
            ?>
            
            <div class="tweet__icons">
                <a href=""><i class="far fa-comment"></i></a>
                <a href=""><i class="far fa-reply"></i></a>
                <a href=""><i class="far fa-heart"></i></a>
                <a href=""><i class="far fa-upload"></i></a>
                <a href=""><i class="far fa-chart-bar"></i></a>
            </div>
        </div>

        <div class="tweet__del">

            <div class="dropdown">

                <?php

                if($id_profil == $row['id_profil']){

                    echo "  <button class='dropbtn'>
                                <span class='fa fa-ellipsis-h'>
                                </span>
                            </button>";
                }

                ?>

                <div class="dropdown-content">

                    <a href="accueil.php?del=<?php echo $id; ?>">
                        <i class="far fa-trash-alt"></i>
                        <span>
                            <p>Delete</p>
                        </span>
                    </a>
                    <a href="accueil.php?modifyId=<?php echo $id; ?>">
                        <i class="far fa-edit"></i>
                        <span>
                            <p>Modifier</p>
                        </span>
                    </a>
                
                </div>
            </div>
        </div>
    </div>

    <?php

    }
}

?>