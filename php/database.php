<?php

function ConnectDatabase(){

    // Create connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gamehive";

    global $conn;
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
}



function CheckExistingEmail(){
  global $conn;
  $emailAlreadyUsed = false;
  $newEmail = mysqli_real_escape_string($conn, $_POST["email"]);

  if(isset($newEmail)){

    $sql = "SELECT email FROM profil WHERE email = '$newEmail'";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0) {

      $emailAlreadyUsed = true;
      echo "Email déjà utilisé";
    }
  }
  return $emailAlreadyUsed;
}



function CheckExistingPseudo(){

  global $conn;

  $pseudoAlreadyUsed = false;
  $newPseudo = mysqli_real_escape_string($conn, $_POST["pseudo"]);

  if(isset($newPseudo)){

    $sql = "SELECT pseudo FROM profil WHERE pseudo = '$newPseudo'";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0) {

      $pseudoAlreadyUsed = true;
      echo "Pseudo déjà utilisé";
    }
  }
  return $pseudoAlreadyUsed;
}



function CheckPassword(){

  global $conn;

  $passwordsMatch = false;
  $newMdp1 = mysqli_real_escape_string($conn, $_POST["mdp1"]);
  $newMdp2 = mysqli_real_escape_string($conn, $_POST["mdp2"]);

  if ($newMdp1 == $newMdp2){

    $passwordsMatch = true;

  } else {

    echo "Les mots de passe ne correspondent pas";
  }
  return $passwordsMatch;
}



function CreateNewAccount(){

  global $conn;

  $newPrenom = mysqli_real_escape_string($conn, $_POST["prenom"]);
  $newNom = mysqli_real_escape_string($conn, $_POST["nom"]);
  $newPseudo = mysqli_real_escape_string($conn, $_POST["pseudo"]);
  $newDdn = mysqli_real_escape_string($conn, $_POST["ddn"]);
  $newEmail = mysqli_real_escape_string($conn, $_POST["email"]);
  $newMdp = mysqli_real_escape_string($conn, $_POST["mdp1"]);
  $newDescription = mysqli_real_escape_string($conn, $_POST["description"]);

  if (isset($_FILES["image"])) {

    echo "Image trouvée<br>";

  } else {

    echo "Image non trouvée<br>";
  }

  if (isset($_FILES["image"]['name']) && !empty($_FILES["image"]['name'])){

    $img_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_to_lc = strtolower($img_ex);
    $extensions = ["jpeg", "png", "jpg"];

    if(in_array($img_ex_to_lc, $extensions)){

      $new_img_name = uniqid("IMG-", true).'.'.$img_ex_to_lc;
      $img_upload_path = 'images/avatars/'.$new_img_name;

      move_uploaded_file($tmp_name, $img_upload_path);
    }
  } else {

    $img_upload_path = "images/avatars/default_avatar.jpg";
  }

  $encrypt_Mdp = md5($newMdp);

  if (empty($newDescription)){

    $newDescription = "No Description";
  }
 
  $sql = "INSERT INTO
            profil (name, surname, pseudo, avatar, datedenaissance, email, description, password)
          VALUES
            ('$newPrenom', '$newNom', '$newPseudo', '$img_upload_path', '$newDdn', '$newEmail', '$newDescription', '$encrypt_Mdp')";

  if ($conn->query($sql) === TRUE) {

    echo "New record created successfully";

  } else {

    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}



function Verify_pseudo_password(){

  global $conn;

  if (isset($_POST["pseudo"]) && isset($_POST["mdp1"])){

    $pseudo = mysqli_real_escape_string($conn, $_POST["pseudo"]);
    $mdp = mysqli_real_escape_string($conn, $_POST["mdp1"]);
    $encrypt_password = md5($mdp);

    $sql = "SELECT
              *
            FROM
              profil
            WHERE
              pseudo = '$pseudo'
            AND
              password = '$encrypt_password'";

    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0) {

      echo "Pseudo et mot de passe correct";
      return true;

    } else {

      return false;
    }
  }
}



function Login(){

  global $conn;

  $pseudo = mysqli_real_escape_string($conn, $_POST["pseudo"]);
  $mdp = mysqli_real_escape_string($conn, $_POST["mdp1"]);
  $encrypt_password = md5($mdp);

  CreateLoginCookie($pseudo, $encrypt_password);
}



function Logout(){

  DestroyLoginCookie();
}



function CreateLoginCookie($pseudo, $encrypt_password){

  setcookie("pseudo", $pseudo, time() + 24*3600 );
  setcookie("encrypt_password", $encrypt_password, time() + 24*3600);
}



//Méthode pour détruire les cookies de Login
//--------------------------------------------------------------------------------
function DestroyLoginCookie(){

  setcookie("pseudo", NULL, -1 );
  setcookie("encrypt_password", NULL, -1);
}



function CheckLogin(){

  if (isset($_COOKIE["pseudo"]) && isset($_COOKIE["encrypt_password"])){

    $pseudo = $_COOKIE["pseudo"];
    $encrypt_password = $_COOKIE["encrypt_password"];

    ConnectDatabase();

    global $conn;

    $sql = "SELECT
              *
            FROM
              profil
            WHERE
              pseudo = '$pseudo'
            AND
              password = '$encrypt_password'";

    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0) {

      return true;

    } else {

      return false;
    }
  } else {

    return false;
  }
}



function ConnectToReciever($id_profil_receiver) {

  $_SESSION['id_profil_receiver'] = $id_profil_receiver;

  if (isset($_SESSION['id_profil_receiver'])){

    echo "Connected to reciever";

  } else {

    echo "Not connected to reciever";
  }
}



function GetIdFromPseudo($pseudo) {

  global $conn;

  if (!isset($pseudo) || empty($pseudo)){

    $pseudo = $_COOKIE["pseudo"];
  }
  
  $sql = "SELECT
            *
          FROM
            profil
          WHERE
            pseudo = '$pseudo'";

  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $id_profil = $row["id"];

  return $id_profil;
}



function CreateNewBadge(){

  global $conn;

  $newGame = mysqli_real_escape_string($conn, $_POST["game"]);
  $newDescription = mysqli_real_escape_string($conn, $_POST["description"]);

  if (isset($_FILES["image"]['name']) && !empty($_FILES["image"]['name'])){

    $img_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_to_lc = strtolower($img_ex);
    $extensions = ["jpeg", "png", "jpg"];

    if(in_array($img_ex_to_lc, $extensions)){

      $new_img_name = uniqid("IMG-", true).'.'.$img_ex_to_lc;
      $img_upload_path = 'images/badges/'.$new_img_name;

      move_uploaded_file($tmp_name, $img_upload_path);
    }
  } else {

    $img_upload_path = NULL;
  }

  //retrieve the id of the game
  $sql = "SELECT id FROM game WHERE nom = '$newGame'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $id_game = $row["id"];

  $sql = "INSERT INTO
            badge (id_game, image, description)
          VALUES
            ('$id_game', '$img_upload_path', '$newDescription')";

  if ($conn->query($sql) === TRUE) {

    echo "New badge created successfully<br>";

  } else {

    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}




function CheckExistingGame(){

  global $conn;

  $newGame = mysqli_real_escape_string($conn, $_POST["game"]);

  $sql = "SELECT
            *
          FROM
            game
          WHERE
            nom = '$newGame'";

  $result = $conn->query($sql);

  if (mysqli_num_rows($result) > 0) {

    return true;

  } else {

    return false;
  }
}




function SendPost(){

  global $conn;

  $id_profil = GetIdFromPseudo("");
  $post_text = mysqli_real_escape_string($conn, $_POST["post_text"]);

  if (isset($_FILES["post_image"]['name']) && !empty($_FILES["post_image"]['name'])){

    $img_name = $_FILES['post_image']['name'];
    $tmp_name = $_FILES['post_image']['tmp_name'];

    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_to_lc = strtolower($img_ex);
    $extensions = ["jpeg", "png", "jpg"];

    if(in_array($img_ex_to_lc, $extensions)){

      $new_img_name = uniqid("IMG-", true).'.'.$img_ex_to_lc;
      $img_upload_path = 'images/posts/'.$new_img_name;

      move_uploaded_file($tmp_name, $img_upload_path);
    }
  } else {

    $img_upload_path = NULL;
  }

  $sql="INSERT INTO
          post (id_profil, texte, image, date)
        VALUES
          ($id_profil,'$post_text', '$img_upload_path', now())";

  $conn->query($sql);
}



//function to return the number of friends of a profil (id_profil)
function GetNumberOfFriends($id_profil){

  global $conn;

  $sql = "SELECT
            *
          FROM
            friend
          WHERE
            id_profil1 = $id_profil
          OR
            id_profil2 = $id_profil";

  $result = $conn->query($sql);
  $number_of_friends = mysqli_num_rows($result);

  return $number_of_friends;
}



//function to return the number of badges unlocked of a profil (id_profil)
function GetNumberOfBadges($id_profil){

  global $conn;

  $sql = "SELECT
            *
          FROM
            unlocked_badge
          WHERE
            id_profil = $id_profil";

  $result = $conn->query($sql);
  $number_of_badges = mysqli_num_rows($result);

  return $number_of_badges;
}



//function to return the number of posts of a profil (id_profil)
function GetNumberOfPosts($id_profil){

  global $conn;

  $sql = "SELECT
            *
          FROM
            post
          WHERE
            id_profil = $id_profil";

  $result = $conn->query($sql);
  $number_of_posts = mysqli_num_rows($result);

  return $number_of_posts;
}



//function to return the number of followers of a profil (id_profil)
function GetNumberOfFollowers($id_profil){

  global $conn;

  $sql = "SELECT
            *
          FROM
            follow
          WHERE
            id_followed = $id_profil";

  $result = $conn->query($sql);
  $number_of_followers = mysqli_num_rows($result);

  return $number_of_followers;
}



//function to return the number of followings of a profil (id_profil)
function GetNumberOfFollowings($id_profil){

  global $conn;

  $sql = "SELECT
            *
          FROM
            follow
          WHERE
            id_follower = $id_profil";

  $result = $conn->query($sql);
  $number_of_followings = mysqli_num_rows($result);

  return $number_of_followings;
}



//function to check if a profil (id_follower) is following another profil (id_followed)
function CheckIfFollowing($id_follower, $id_followed){

  global $conn;

  $sql = "SELECT
            *
          FROM
            follow
          WHERE
            id_follower = $id_follower
          AND
            id_followed = $id_followed";

  $result = $conn->query($sql);

  if (mysqli_num_rows($result) > 0) {

    return true;

  } else {

    return false;
  }
}



//function to check if a profil is friend with another profil
function CheckIfFriend($id_profil1, $id_profil2){

  global $conn;

  $sql = "SELECT
            *
          FROM
            friend
          WHERE
            (id_profil1 = $id_profil1 AND id_profil2 = $id_profil2)
          OR
            (id_profil1 = $id_profil2 AND id_profil2 = $id_profil1)";
  
  $result = $conn->query($sql);

  if (mysqli_num_rows($result) > 0) {

    return true;

  } else {

    return false;
  }
}



function CheckIfAccepted($id_profil1, $id_profil2){

  global $conn;
  
  $sql = "SELECT
            accepter
          FROM
            friend
          WHERE
            (id_profil1 = $id_profil1 AND id_profil2 = $id_profil2)
          OR
            (id_profil1 = $id_profil2 AND id_profil2 = $id_profil1)";
  
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

  if (mysqli_num_rows($result) > 0){

    if ($row["accepter"] == 1){

      return true;

    } else {

      return false;
    }
  } else {

    return false;
  }
}



function CheckIfProfil1SentRequest($id_profil1, $id_profil2){

  global $conn;

  $sql = "SELECT
            *
          FROM
            friend
          WHERE
            id_profil1 = $id_profil1
          AND
            id_profil2 = $id_profil2";

  $result = $conn->query($sql);

  if (mysqli_num_rows($result) > 0) {

    return true;

  } else {

    return false;
  }
}



function ModifyEachData($data){

  global $conn;

  $pseudo = $_COOKIE["pseudo"];

  if (isset($_POST[$data]) && $_POST[$data] != ""){

    $value = mysqli_real_escape_string($conn, $_POST[$data]);

    $sql = "UPDATE
              profil
            SET
              $data = '$value'
            WHERE
              pseudo = '$pseudo'";

    if ($conn->query($sql)){

      echo "$data modified successfully<br>";

    } else {

      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else {

    echo "$data not modified<br>";
  }
}



function ModifyImage(){

  if (isset($_FILES["image"]['name']) && !empty($_FILES["image"]['name'])){

    global $conn;

    $pseudo = $_COOKIE["pseudo"];

    // delete old image
    $sql = "SELECT
              avatar
            FROM
              profil
            WHERE
              pseudo = '$pseudo'";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $old_img = $row["avatar"];

    if (file_exists($old_img) && $old_img != "images/avatars/default.png"){
      unlink($old_img);
    }

    // upload new image
    $img_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_to_lc = strtolower($img_ex);
    $extensions = ["jpeg", "png", "jpg"];

    if(in_array($img_ex_to_lc, $extensions)){

        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_to_lc;
        $img_upload_path = '../images/avatars/'.$new_img_name;

        move_uploaded_file($tmp_name, $img_upload_path);

    } else {

      echo "Image problem<br>";
    }

    // update database
    $img_upload_path = str_replace("../", "", $img_upload_path);

    $sql = "UPDATE
              profil
            SET
              avatar = '$img_upload_path'
            WHERE
              pseudo = '$pseudo'";

    if ($conn->query($sql)){

      echo "Image modified successfully<br>";

    } else {

      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else {

    echo "Image not modified<br>";
  }
}



function CheckPostsBelongingToUser($id_post){

  global $conn;

  $id_profil = GetIdFromPseudo("");

  $sql = "SELECT
            *
          FROM
            post
          WHERE
            id_profil = $id_profil
          AND
            id = $id_post";

  $result = $conn->query($sql);

  if (mysqli_num_rows($result) > 0) {

    return true;

  } else {

    return false;
  }
}

?>