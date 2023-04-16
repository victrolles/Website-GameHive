<?php

$sql = "SELECT 
            SUBSTRING(tag, 2) AS hashtag, 
            COUNT(*) AS count 
        FROM (  SELECT 
                    SUBSTRING_INDEX(SUBSTRING_INDEX(texte, ' ', numbers.n), ' ', -1) AS tag 
                FROM 
                    post 
                CROSS JOIN
                    (SELECT 1 n UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5) numbers 
                WHERE
                    CHAR_LENGTH(texte) - CHAR_LENGTH(REPLACE(texte, ' ', '')) + 1 >= numbers.n) tags 
        WHERE
            tag REGEXP '^#[a-zA-Z0-9_]+$' 
        GROUP BY
            hashtag 
        ORDER BY
            count DESC 
        LIMIT 3;";

$data = mysqli_query($conn, $sql);

?>

<div class="right__sidebar">
    <div class="search-container">
        <a href="#" class="search-btn" onclick="submitForm();">
            <i class="fa fa-search"></i>
        </a>
        <form id="search-form" method="GET" action="search.php">
            <input type="text" name="search_texte" placeholder="Search GameHive" class="search-input">
        </form>
    </div>


    <div class="trends__container">
        <div class="trends__box">
            <div class="trends__header">
                <p>Top 3 Trends</p>
                <i class="fa fa-cog"></i>
            </div>
            <div class="trends__body">

                <?php

                while($row=mysqli_fetch_assoc($data))
                {
                    $hashtag = $row['hashtag'];
                    $count = $row['count'];

                    ?>

                    <div class="trend texte">
                        <span>Trending</span>
                        <?php echo "<a href='search.php?search_texte=$hashtag'><p>$hashtag</p></a>";?>
                    </div>

                <?php
                }
                ?>
            </div>
            <div class="trends__footer">
                <p> </p>
            </div>
        </div>
    </div>

    <?php

    $id_profil_self = GetIdFromPseudo("");

    $sql = "SELECT
                PRO.id,
                PRO.avatar, 
                PRO.pseudo
            FROM
                friend FRI
            INNER JOIN
                profil PRO
                    ON
                        FRI.id_profil1 = PRO.id
            WHERE
                id_profil2 = $id_profil_self
            AND
                FRI.accepter = 0";
    
    $result = $conn->query($sql);

    ?>

    <div class="trends__container">
        <div class="trends__box">
            <div class="trends__header">
                <p>Demande d'amis</p>
                <i class="fa fa-cog"></i>
            </div>

            <div class="trends__body">

                <?php
                
                while($row=mysqli_fetch_assoc($result))
                {
                    $id = $row['id'];
                    $pseudo = $row['pseudo'];
                    $avatar = $row['avatar'];

                    echo "  <div class='friends__lists__item'>

                                <div class='avatar'>
                                    <a href='profil.php?pseudo=$pseudo'>
                                        <img class='ico' src='$avatar' alt='Avatar'>
                                    </a>
                                </div>

                                <div class='pseudo'>
                                    <a href='profil.php?pseudo=$pseudo'>
                                        <p>$pseudo</p>
                                    </a>
                                </div>

                                <div class='decision'>
                                    <a href='php/accepter.php?id=$id'>
                                        <i class='fa fa-check'></i>
                                    </a>
                                </div>

                                <div class='decision'>
                                    <a href='php/refuser.php?id=$id'>
                                        <i class='fa fa-times'></i>
                                    </a>
                                </div>

                            </div>";
                }

                ?>

            </div>

            <div class="trends__footer">
                <p> </p>
            </div>

        </div>
    </div>
</div>

<script>
    function submitForm() {
        var searchText = document.getElementsByName("search_texte")[0].value.trim();
        if (searchText !== "") {
            document.getElementById("search-form").submit();
        }
    }
</script>