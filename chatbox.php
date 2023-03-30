<?php
session_start();
?>
<script src='javascript/functions.js'></script>

<?php 
include_once "php/database.php";
if (CheckLogin()==true){
    global $conn;
    $pseudo = $_COOKIE["pseudo"];
    $sql = "SELECT * FROM profil WHERE pseudo = '$pseudo'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $avatar = $row["avatar"];
    $id_profil = $row["id"];
} else {
    header("location: login.php");
}
?>
<html lang="fr">
    <?php include "head.php";?>
    
    <body>
        <div class="wrapper d-flex">
    
            <div class="autre ">
                <?php echo "Pseudo : ".$pseudo."<br><br>"; ?>
                <div class="avatar"><img src=<?php echo "$avatar"?> alt="avatar"></div>
                <form action="#" method="post">
                    <input type="submit" name="deconnexion" value="Se déconnecter">
                </form>
                <?php
                if (isset($_POST["deconnexion"])){
                    Logout();
                    header("location: login.php");
                }
                ?>
            </div>

            <div class="friends">
                <h2 class="title">Contacts</h2>
                <div class="friends__search">
                <form action="#" method="post">
                    <input type="text" id="search-box" oninput="searchFriends()" name="profil_receiver" placeholder="profil_receiver">
                </form>
                </div>
                <div class="friends__lists" id="friends-container"></div>
            </div>
            
            <div class="conversations">
                <div class="conversations__header">
                    <div class="friends__lists__item">
                        <div class="avatar">
                            <?php if(isset($_SESSION["avatar_friend"])) {$avatar_friend = $_SESSION["avatar_friend"]; echo "<img src='$avatar_friend' alt='avatar'>";} ?>
                        </div>
                        <div class="name">
                            <?php if(isset($_SESSION["pseudo_friend"])) {echo $_SESSION["pseudo_friend"];} ?>
                    </div>
                </div>
                <div class="content">
                    <div id="message-list"></div>
                    <div class="message-send">
                        <!-- <form onsubmit="return sendMessage(event); sendMessage(event);" enctype="multipart/form-data"> -->
                        <form id="message-form" enctype="multipart/form-data">
                            <input type="file" name="picture" accept="image/png, image/jpeg"><br>
                            <input type="text" id="msg" name="message" placeholder="message">
                            <button type="submit">Send</button>
                        </form>
                    </div>
                    <div id="message-error"></div>
                </div>
            </div>
        </div>
    </body>
</html>

<!-- <script>
    function displayMessage() {
      console.log("displaying message");
      const form = document.getElementById('message-form');
      form.addEventListener('submit', function(event) {
      // Prevent the default form submission behavior
      event.preventDefault();

      // Get the form data using the FormData constructor
      const formData = new FormData(form);

      // Send an AJAX request to display_message.php
      const xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            // Update the chat messages container with the response
            const messagesContainer = document.getElementById('message-list');
            messagesContainer.innerHTML = xhr.responseText;
          } else {
            console.error('Error:', xhr.status, xhr.statusText);
          }
        }
      };
      xhr.open('POST', './php/display_messages.php');
      xhr.send(formData);
      });
    }
    const form = document.getElementById('message-form');
    form.addEventListener('submit', displayMessage);
    window.onload = function() {
        displayMessage();
    }
</script> -->