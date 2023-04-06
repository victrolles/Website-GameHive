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
 
  $sql = "INSERT INTO profil (name, surname, pseudo, avatar, datedenaissance, email, description, password) VALUES ('$newPrenom', '$newNom', '$newPseudo', '$img_upload_path', '$newDdn', '$newEmail', '$newDescription', '$encrypt_Mdp')";

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
    echo "Pseudo : $pseudo <br>";
    echo "Mot de passe : $mdp <br>";
    echo "Mot de passe encrypté : $encrypt_password <br>";
    $sql = "SELECT * FROM profil WHERE pseudo = '$pseudo' AND password = '$encrypt_password'";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) > 0) {
      echo "Pseudo et mot de passe correct";
      return true;
    } else {
      echo "Pseudo ou mot de passe incorrect <br>";
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
    $sql = "SELECT * FROM profil WHERE pseudo = '$pseudo' AND password = '$encrypt_password'";
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


function GetIdFromPseudo() {
  global $conn;

  $pseudo = $_COOKIE["pseudo"];
  $sql = "SELECT * FROM profil WHERE pseudo = '$pseudo'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $id_profil = $row["id"];
  return $id_profil;
}

function CreateNewBadge(){
  global $conn;

  $newGame = mysqli_real_escape_string($conn, $_POST["game"]);
  $newDescription = mysqli_real_escape_string($conn, $_POST["description"]);

  echo "Game : $newGame <br>";
  echo "Description : $newDescription <br>";
  if (isset($_FILES['image'])){
    print_r($_FILES['image']);
  } else {
    echo "No image uploaded<br>";
  }

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
  }

  //retrieve the id of the game
  $sql = "SELECT id FROM game WHERE nom = '$newGame'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $id_game = $row["id"];


  $sql = "INSERT INTO badge (id_game, image, description) VALUES ('$id_game', '$img_upload_path', '$newDescription')";
  if ($conn->query($sql) === TRUE) {
    echo "New badge created successfully<br>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

function CheckExistingGame(){
  global $conn;
  $newGame = mysqli_real_escape_string($conn, $_POST["game"]);
  $sql = "SELECT * FROM game WHERE nom = '$newGame'";
  $result = $conn->query($sql);
  if (mysqli_num_rows($result) > 0) {
    return true;
  } else {
    return false;
  }
}

function SendPost(){
  global $conn;
  $id_profil = GetIdFromPseudo();
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
  $sql="INSERT INTO post (id_profil, texte, image, date) VALUES ($id_profil,'$post_text', '$img_upload_path', now())";
  $conn->query($sql);
}

?>