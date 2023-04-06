<?php include_once "php/header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>GAMEHIVE</header>
            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="field input">
                    <label>Prénom</label>
                    <input type="text" name="prenom" placeholder="prenom" required>
                </div>
                <div class="field input">
                    <label>Nom</label>
                    <input type="text" name="nom" placeholder="nom" required>
                </div>
                <div class="field input">
                    <label>Pseudo</label>
                    <input type="text" name="pseudo" placeholder="pseudo" required>
                </div>
                <div class="field input">
                    <label>Date de naissance</label>
                    <input type="date" name="ddn" required>
                </div>
                <div class="field input">
                    <label>Adresse email</label>
                    <input type="text" name="email" placeholder="adresse email" required>
                </div>
                <div class="field input">
                    <label>Mot de passe</label>
                    <input type="password" name="mdp1" placeholder="mot de passe" required>
                </div>
                <div class="field input">
                    <label>Confirmer votre mot de passe</label>
                    <input type="password" name="mdp2" placeholder="mot de passe" required>
                </div>
                <div class="field image">
                    <label>Choisir une image (facultatif)</label>
                    <input type="file" name="image" accept="image/png, image/jpeg">
                </div>
                <div class="field input">
                    <label>Description (facultatif)</label>
                    <input type="text" name="description" placeholder="description">
                </div>
                <div class="field button">
                    <input type="submit" name="submit" value="Valider">
                </div>
            </form>
            <div class="link">Vous avez déjà un compte ? <a href="login.php">Connectez vous</a></div>
        </section>
    </div>
</body>
</html>

<?php
include_once "php/database.php";
if (isset($_POST["submit"])){
    ConnectDatabase();
    if (CheckExistingEmail()==false && CheckExistingPseudo()==false && CheckPassword()==true){
        CreateNewAccount();
        header("location: login.php");
    }
}
?>