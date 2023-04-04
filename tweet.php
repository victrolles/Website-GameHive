<?php

$query = "SELECT * FROM posts ORDER BY post_id DESC";
$data = mysqli_query($con, $query);

while($row=mysqli_fetch_assoc($data))
{
    $post_text = $row['post_text'];
    $post_date = $row['post_date'];

?>

<div class="tweet__box">
    <div class="tweet__left">
        <img src="images/avatar.png" alt="">
    </div>
    <div class="tweet__body">
        <div class="tweet__header">
            <p class="tweet__name">GameHive</p>
            <p class="tweet__username">@GameHive</p>
            <p class="tweet__date"><?php echo $post_date=date ('M d'); ?></p>
        </div>

        <p class="tweet__text"><?php echo $post_text; ?></p>
        
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
            <button class="dropbtn"><span class="fa fa-ellipsis-h"></span></button>
            <div class="dropdown-content">
                <!-- rien compris -->
                <a href="index.php?del=<?php echo $row['post_id']; ?>"><i class="far fa-trash-alt"></i><span>Delete</span></a>
            
            </div>
                
        </div>
    </div>
</div>

<?php
}
?>