<?php 
include "php/database.php";
require_once('php/header.php');
ob_start();
session_start();

if (CheckLogin()==true){
    global $conn;
} else {
    header("location: login.php");
}

?>

<body>

<?php

if(isset($_POST['btn_add_post'])){
    SendPost();
}
?>

<div class="grid-container">

    <?php require_once('php/left-sidebar.php'); ?>
    <div class="main">
        <p class="page__title">Home</p>

        <div class="tweet__box tweet__add">
            <div class="tweet__left">
                <img src="images/avatar.png" alt="">
            </div>

            <div class="tweet__body">
                <form method="post" enctype="multipart/form-data">
                    <textarea name="post_text" id="" cols="100%" rows="3" placeholder="What's happening?"></textarea>
                    <div class="tweet__icons-wrapper">
                        <div class="tweet__icons-add">
                            <input type="file" id="img" name="post_image" accept="image/png, image/jpeg">
                        </div>

                        <button class="button__tweet" type="submit" name="btn_add_post">Tweet</button>
                    </div>


                </form>
            </div>
        </div>
        <?php require_once "php/tweet.php";?>
    </div>
    <?php require_once('php/right-sidebar.php'); ?>
<?php
    if(isset($_GET['del'])){
        $Del_ID=$_GET['del'];
        $sql="DELETE FROM post WHERE post_id='$Del_ID'";
        $post_query=$conn->query($sql);

        if($sql){
        header("Location: accueil.php");
        }
    }
?>

</body>
</html>