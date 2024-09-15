<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
    <link rel="stylesheet" href="CSS/CONNEXION.CSS">
</head>
<body>
<?php
require('BD.php');
session_start();

if (isset($_POST['email'])){
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($conn, $email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE email='$email' and password='".hash('sha256', $password)."'";
	$result = mysqli_query($conn,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
	if($rows==1){
	    $_SESSION['email'] = $email;
	    header("Location: ACCUEIL.php");
	}else{
		$message = "L'email ou le mot de passe est incorrect.";
	}
}
?>
    
        <div class="background-animation"></div>
    
    
    <div class="container">
        <div class="login-box">
            <h2>Connexion</h2>
                <form action="" method="post" name="connexion">
                <div class="input-box">
                    <input type="email" name="email" required>
                    <label for="email">Email</label>
                </div>
                <div class="input-box">
                    <input type="password" name="password" required>
                    <label for="password">Mot de Passe</label>
                </div>
                <div class="options">
                    <label>
                        <input type="checkbox"> Se souvenir de moi
                    </label>
                    <a href="RESET_PASSWORD.php" class="forgot-password">Mot de passe oublié ?</a>
                </div>
                <div class="button-group">
                    <input type="submit" value="Se connecter" name="submit" class="btn login-btn">
                    <p class="btn signup-btn"> <a href="INCRIPTION.php">S'inscrire</a></p>
                </div>
                <?php if (! empty($message)) { ?>
                    <p class="errorMessage"><?php echo $message; ?></p>
                <?php } ?>
                </form>
    
        </div>
    </div>
</body>
</html>
