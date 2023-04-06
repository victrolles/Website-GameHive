<?php 
include "php/database.php";
if (CheckLogin()==true){
    global $conn;
    $pseudo = $_COOKIE["pseudo"];
    $sql = "SELECT * FROM profil WHERE pseudo = '$pseudo'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $prenom = $row["name"];
    $nom = $row["surname"];
    $pseudo = $row["pseudo"];
    $avatar = $row["avatar"];
    $datedenaissance = $row["datedenaissance"];
    $email = $row["email"];
    $description = $row["description"];
} else {
    header("location: login.php");
}
?>

<?php include "php/header.php"; ?>
<body>
    <div class="wrapper">
        <?php echo "Prénom : ".$prenom."<br><br>"; ?>
        <?php echo "Nom : ".$nom."<br><br>"; ?>
        <?php echo "Pseudo : ".$pseudo."<br><br>"; ?>
        <img src=<?php echo "$avatar"?> alt="avatar">
        <?php echo "<br><br>Date de naissance : ".$datedenaissance."<br><br>"; ?>
        <?php echo "Email : ".$email."<br><br>"; ?>
        <?php echo "Description : ".$description."<br><br>"; ?>
        <form action="#" method="post">
            <input type="submit" name="deconnexion" value="Se déconnecter">
        </form>
    </div>
</body>

<?php
if (isset($_POST["deconnexion"])){
    Logout();
    header("location: login.php");
}