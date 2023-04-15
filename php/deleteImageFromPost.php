<?php
include_once "database.php";

ConnectDatabase();

$modifiedId = $_GET['postId'];

$sql = "SELECT
            image
        FROM
            post
        WHERE
            id = '$modifiedId'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$image = $row['image'];
$image = "../" . $image;


$sql = "UPDATE
            post
        SET
            image = ''
        WHERE
            id = '$modifiedId'";

if ($conn -> query($sql)) {

    if (file_exists($image)) {
        
        unlink($image);
    }
}

header("location: ../accueil.php?modifyId=$modifiedId");

?>
