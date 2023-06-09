<html>
<head>
    <link rel="stylesheet" href="css/signup.css">
</head>

<body>
    <div class="wrapper">
        <section class="form signup">
            <header>
                <img class="logo" src="images/avatar-removebg-preview.png" alt="GameHive">
                <h1>GameHive</h1>
            </header>

            <div class="report">
                <?php

                include "php/database.php";

                if (isset($_POST["submit"])){

                    ConnectDatabase();

                    if (verify_pseudo_password()==true){

                        login();

                        header("location: accueil.php");

                    } else {
                        
                        echo "Pseudo ou mot de passe incorrect";
                    }
                }

                ?>
            </div>

            <form action="#" method="POST">
                <div class="field input">
                    <label>Pseudo</label>
                    <input type="text" name="pseudo" placeholder="pseudo" required>
                </div>
                <div class="field input">
                    <label>Mot de passe</label>
                    <input type="password" name="mdp1" placeholder="mot de passe" required>
                </div>

                <div class="field button">
                    <input type="submit" name="submit" value="Connecter">
                </div>
            </form>
            <div class="link">Vous n'avez pas de compte ? <a href="signup.php">Inscrivez vous</a></div>
        </section>
    </div>
</body>
</html>