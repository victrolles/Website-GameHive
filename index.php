<?php require_once('header.php'); ?>

<body>

<?php

if(isset($_POST['btn_add_post'])){
    $Post_Text=$_POST['post_text'];
    
    if($Post_Text!="")
    {
        $sql="INSERT INTO posts (post_text,post_date) VALUES ('$Post_Text',now())";
        $result=mysqli_query($con,$sql);
    }
    
}
?>

<div class="grid-container">

    <?php require_once('left-sidebar.php'); ?>
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
                            <i class="far fa-image"></i>
                            <i class="fa fa-chart-bar"></i>
                            <i class="far fa-smile"></i>
                            <i class="far fa-callendar-alt"></i>
                        </div>

                        <button class="button__tweet" type="submit" name="btn_add_post">Tweet</button>
                    </div>


                </form>
            </div>
        </div>
        <?php require_once "tweet.php";?>
    </div>

<?php require_once('right-sidebar.php'); ?>
<?php
    if(isset($_GET['del'])){
        $Del_ID=$_GET['del'];
        $sql="DELETE FROM posts WHERE post_id='$Del_ID'";
        $post_query=mysqli_query($con,$sql);

        if($sql){
        header("Location: index.php");
        }
    }
?>

</body>
</html>