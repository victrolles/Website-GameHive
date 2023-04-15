<?php

session_start();
include "database.php";
ConnectDatabase();

global $conn;

if (isset($_SESSION["id_friend"])){

    $id_friend = $_SESSION["id_friend"];
    $id_profil = GetIdFromPseudo("");

    if (isset($_POST["message"]) && !empty($_POST["message"])){

        if (isset($_FILES["picture"]['name']) && !empty($_FILES["picture"]['name'])){

            $img_name = $_FILES['picture']['name'];
            $tmp_name = $_FILES['picture']['tmp_name'];

            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_to_lc = strtolower($img_ex);
            $extensions = ["jpeg", "png", "jpg"];

            if(in_array($img_ex_to_lc, $extensions)){

                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_to_lc;
                $img_upload_path = '../images/messages/'.$new_img_name;

                move_uploaded_file($tmp_name, $img_upload_path);
            }
        } else {

            $img_upload_path = NULL;
        }
        $message = mysqli_real_escape_string($conn, $_POST["message"]);

        $sql = "INSERT INTO
                    message (id_sender, id_receiver, text, image, vu)
                VALUES
                    ('$id_profil', '$id_friend', '$message', '$img_upload_path', 0)";
        
        $conn->query($sql);
    }
}