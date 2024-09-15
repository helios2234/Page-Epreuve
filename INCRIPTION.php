<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'inscription</title>
    <link rel="stylesheet" href="CSS/INSCRIPTION.CSS">
</head>
<body>
<?php
require('BD.php');
if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn, $username);
	// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($conn, $email);
	// récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);
	//requéte SQL + mot de passe crypté
    $query = "INSERT into `users` (username, email, password)
              VALUES ('$username', '$email', '".hash('sha256', $password)."')";
	// Exécute la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='win'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='CONNEXION.php'>connecter</a></p>
			 </div>";
    }
}else{
?>
    <div class="slider-thumb"></div>
    <div class="background-animation"></div>
    <div class="container">
        <div class="signup-box">
            <h2>Inscription</h2>
            <form id="signup-form" action="" method="post">
                <div class="input-box">
                    <input type="text" name="username" required>
                    <label for="username">Nom d'utilisateur</label>
                </div>
                <div class="input-box">
                    <input type="email" name="email"pattern="^[a-zA-Z0-9._%+-]+@gmail.com$" required>
                    <label for="email">Email</label>
                </div>
                <div class="input-box">
                    <input type="password" name="password" required>
                    <label for="password">Mot de Passe</label>
                </div>
                <div class="input-group">
                <input type="submit" name="submit" value="s'inscrire" class="signup-btn" />
                </div>
                <p class="signin-link">Déjà un compte ? <a href="CONNEXION.php">Se connecter</a></p>
            </form>
            <div id="welcome-message" class="welcome-message"></div>
        </div>
    </div>
    <?php } ?>
</body>
</html>
