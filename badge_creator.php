<?php include_once "php/header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form badge_creator">
            <header>Badge Creator</header>
            <form action="#" method="post" enctype="multipart/form-data">
                <br><br>
                <div class="field input">
                    <label>Game</label>
                    <input type="text" name="game" placeholder="Game" required>
                </div>
                <br><br>
                <div class="field input">
                    <label>Image du badge</label>
                    <input type="file" name="image" id="image" placeholder="Image" required>
                </div>
                <br><br>
                <div class="field input">
                    <label>Description</label>
                    <textarea id="description" name="description" rows="5" cols="33"></textarea>
                </div>
                <br><br>
                <div class="field button">
                    <input type="submit" name="submit" value="Valider">
                </div>
                <br><br>
            </form>
            <div class="link">Vous avez déjà un compte ? <a href="login.php">Connectez vous</a></div>
        </section>
    </div>
</body>
</html>

<?php
include "php/database.php";
if (isset($_POST["submit"])){
    ConnectDatabase();
    if (CheckExistingGame()==true){
        echo "Ce jeu existe<br>";
        CreateNewBadge();
    } else {
        echo "Ce jeu n'existe pas<br>";
    }
}
?>