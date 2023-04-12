<?php
$id_profil = GetIdFromPseudo($pseudo);
$sql = "SELECT image FROM badge WHERE id = 40";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$default_image = $row["image"];

$sql = "SELECT BAD.id, BAD.image, BAD.description, BAD.id_game FROM unlocked_badge UNL INNER JOIN badge BAD ON UNL.id_badge = BAD.id WHERE UNL.id_profil = '$id_profil' AND UNL.selected = 1";
$result = $conn->query($sql);

for ($i = 0; $i < 3; $i++) {
    echo "<div class='dropdown badges'>";
    if ($row = $result->fetch_assoc()) {
        $image = $row["image"];
        $id_badge = $row["id"];

        echo "<img class='dropbtn ico' src='$image' alt='badge'>";
    } else {
        echo "<img class='dropbtn ico' src='$default_image' alt='badge'>";
        $id_badge = 40;
    }

    if ($pseudo == $_COOKIE["pseudo"]){
        echo "<div class='dropdown-content'>";
        $sql2 = "SELECT BAD.id, BAD.image, BAD.description, BAD.id_game FROM unlocked_badge UNL INNER JOIN badge BAD ON UNL.id_badge = BAD.id WHERE UNL.id_profil = '$id_profil' AND UNL.selected = 0";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            echo "Change to :";
            echo "<a href='php/change_badge.php?sup=$id_badge&add=40'><img class='ico' src='$default_image' alt='badge'></a>";
            while ($row2 = $result2->fetch_assoc()) {
                $image2 = $row2["image"];
                $id_badge2 = $row2["id"];

                
                echo "<a href='php/change_badge.php?sup=$id_badge&add=$id_badge2'><img class='ico' src='$image2' alt='badge'></a>";
            }
        }
        echo "</div>";
    }

    echo "</div>";

}