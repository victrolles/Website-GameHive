<?php
include_once "database.php";

ConnectDatabase();

$modified_post_id = $_POST['modified_post_id'];
$modified_post_text = $_POST['modified_post_text'];

if (isset($_FILES["image"]['name']) && !empty($_FILES["image"]['name'])){

    //delete old image
    $sql = "SELECT image FROM post WHERE id = '$modified_post_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $image = $row['image'];
    $image = "../" . $image;
    if (file_exists($image)) {
        unlink($image);
    }

    $img_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_to_lc = strtolower($img_ex);
    $extensions = ["jpeg", "png", "jpg"];
    if(in_array($img_ex_to_lc, $extensions)){
        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_to_lc;
        $img_upload_path = '../images/posts/'.$new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);
        $img_upload_path = str_replace("../", "", $img_upload_path);
    }
} else {
    $img_upload_path = NULL;
    echo "No image uploaded";
}

$sql = "UPDATE post SET texte = '$modified_post_text', image = '$img_upload_path', date = now() WHERE id = '$modified_post_id'";
if ($conn -> query($sql)) {
    echo "Post modified";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header("location: ../accueil.php");
?>