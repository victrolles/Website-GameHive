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

// function Send(){
//   global $conn;
//   echo "Send function<br>";

//     echo "Send button pressed<br>";
//     if (isset($_SESSION["id_friend"])){
//         echo"Session id_friend set<br>";
//         $id_friend = $_SESSION["id_friend"];
//         $id_profil = GetIdFromPseudo();
//         if (isset($_POST["message"]) && !empty($_POST["message"])){


//           if (isset($_FILES["picture"])) {
//             echo "Image trouvée<br>";
//           } else {
//             echo "Image non trouvée<br>";
//           }
//           if (isset($_FILES["picture"]['name']) && !empty($_FILES["picture"]['name'])){
//             $img_name = $_FILES['picture']['name'];
//             $tmp_name = $_FILES['picture']['tmp_name'];
//             $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
//             $img_ex_to_lc = strtolower($img_ex);
//             $extensions = ["jpeg", "png", "jpg"];
//             if(in_array($img_ex_to_lc, $extensions)){
//               $new_img_name = uniqid("IMG-", true).'.'.$img_ex_to_lc;
//               $img_upload_path = 'images/messages/'.$new_img_name;
//               move_uploaded_file($tmp_name, $img_upload_path);
//             }
//           } else {
//             $img_upload_path = NULL;
//           }





//           $message = mysqli_real_escape_string($conn, $_POST["message"]);
//           $sql = "INSERT INTO message (id_sender, id_receiver, text, image) VALUES ('$id_profil', '$id_friend', '$message', '$img_upload_path')";
//           $conn->query($sql);
//           echo "Message sent<br>";
//           echo "Message : $message<br>";
//         } else {
//             echo "No text message";
//         }
//     }
//   }


function GetIdFromPseudo() {
  global $conn;

  $pseudo = $_COOKIE["pseudo"];
  $sql = "SELECT * FROM profil WHERE pseudo = '$pseudo'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $id_profil = $row["id"];
  return $id_profil;
}

// function DisplayAllFriends() {
//   global $conn;

//   $pseudo = $_COOKIE["pseudo"];

//   if (isset($_POST["search"])) {
//     if (isset($_POST["profil_receiver"])) {
//         $profil_receiver = mysqli_real_escape_string($conn, $_POST["profil_receiver"]);
//         $sql = "SELECT PRO.id, PRO.pseudo, PRO.avatar FROM profil PRO inner join friend FRD WHERE id_profil1 = (SELECT id FROM profil WHERE pseudo = '$pseudo') AND id_profil2 = PRO.id AND PRO.pseudo like '%$profil_receiver%' OR id_profil2 = (SELECT id FROM profil WHERE pseudo = '$pseudo') AND id_profil1 = PRO.id AND PRO.pseudo like '%$profil_receiver%'";
//     }
//   } else {
//     $sql = "SELECT PRO.id, PRO.pseudo, PRO.avatar FROM profil PRO inner join friend FRD WHERE id_profil1 = (SELECT id FROM profil WHERE pseudo = '$pseudo') AND id_profil2 = PRO.id OR id_profil2 = (SELECT id FROM profil WHERE pseudo = '$pseudo') AND id_profil1 = PRO.id";
//   }
//   $result = $conn->query($sql);
//   if ($result->num_rows > 0) {
//       while($row = $result->fetch_assoc()) {
//           $id = $row["id"];
//           $pseudo = $row["pseudo"];
//           $avatar = $row["avatar"];
//           echo "<div class='friends__lists__item'>";
//           echo "<div class='avatar'><a href='chatbox.php' onclick='connectToFriend($id);'><img src='$avatar' alt='Avatar'></a></div>";
//           echo "<div class='pseudo'><a href='chatbox.php' onclick='connectToFriend($id);'>$pseudo</a></div>";
//           echo "</div>";
//       }
//   } else {
//       echo "No friends.";
//   }
// }

// function DisplayAllMessages(){
//   global $conn;

//   $id_profil = GetIdFromPseudo();
//   // Get the ID of the conversation partner
//   $id_profil_receiver = $_SESSION["id_friend"];

//   // Retrieve all messages between the logged-in user and the conversation partner
//   // display all messages
//   $sql = "SELECT * FROM(SELECT * FROM message WHERE (id_sender = $id_profil AND id_receiver = $_SESSION[id_friend]) OR (id_sender = $_SESSION[id_friend] AND id_receiver = $id_profil) ORDER BY time DESC LIMIT 10) sub ORDER BY time ASC";
//   $result = $conn->query($sql);

//   // Display the messages
//   if ($result->num_rows > 0) {
//       while($row = $result->fetch_assoc()) {
//           $sender_id = $row["id_sender"];
//           $message = $row["text"];
//           $sender_sql = "SELECT pseudo FROM profil WHERE id = '$sender_id'";
//           $sender_result = $conn->query($sender_sql);
//           $sender_row = $sender_result->fetch_assoc();
//           $sender = $sender_row["pseudo"];

//           if ($sender_id == $id_profil) {
//               echo "<div class='message message-right'>";
//               echo "<div class='message-text'><p>$message</p></div>";
//               if ($row["image"] != NULL) {
//                   echo "<div class='message-image'><img src='$row[image]' alt='Image'></div>";
//               }
//               // echo "<div class='message-time'>$row[time]</div>";
//               echo "</div>";
//           } else {
//               echo "<div class='message message-left'>";
//               echo "<div class='message-text'><p>$message</p></div>";
//               if ($row["image"] != NULL) {
//                   echo "<div class='message-image'><img src='$row[image]' alt='Image'></div>";
//               }
//               // echo "<div class='message-time'>$row[time]</div>";
//               echo "</div>";
//           }
          
//       }
//   } else {
//       echo "No messages.";
//   }
// }

?>