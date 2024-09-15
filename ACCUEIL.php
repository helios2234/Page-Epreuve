<?php
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["email"])){
		header("Location: CONNEXION.php");
		exit(); 
	}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICTU EXAMS</title>
    <link rel="stylesheet" href="CSS/ACCUEIL.CSS">
</head>
<body>
<div class="sucess">
		<h1>Bienvenue <?php echo $_SESSION['email']; ?>!</h1>
		<p>C'est votre tableau de bord.</p>
		</div>
    <!-- Header avec le nom du site et les liens -->
    <header>
        <div class="logo">
            <h1>ICTU EXAMS</h1>
        </div>
        <nav>
            <ul>
                <li><a href="INDEX.php" onclick="scrollToFooter('about')">À Propos de Nous</a></li>
                <li><a href="#sidebar" onclick="toggleSidebar()">Filières</a></li>
                <li><a href="DECONNEXION.php" onclick="toggleSidebar()">Se déconnecter</a></li>
            </ul>
        </nav>
    </header>

    <!-- Animation et citation centrale -->
    <main>
        <div class="background-image"><a href="student.jpg"></a></div>
        <div class="animation-background"></div>
        <div class="quote">
            <p>“L'éducation est l'arme la plus puissante que vous pouvez utiliser pour changer le monde.” - Nelson Mandela</p>
        </div>
    </main>

    <!-- Barre latérale pour les filières -->
    <div id="sidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="toggleSidebar()">&times;</a>
        <div class="filiere-list">
        <ul>
            <li><a href="#" onclick="showLevels('Génie Logiciel')">Génie Logiciel</a></li>
            <li><a href="#" onclick="showLevels('Systèmes Réseaux')">Systèmes Réseaux</a></li>
            <li><a href="#" onclick="showLevels('Cybersécurité')">Cybersécurité</a></li>
            <li><a href="#" onclick="showLevels('Intelligence Artificielle')">Intelligence Artificielle</a></li>
        </ul>

        </div>
    </div>

    <!-- Barre latérale pour les niveaux -->
    <div id="levelSidebar" class="level-sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeLevelSidebar()">&times;</a>
        <div id="levels" class="level-list">
            <!-- Niveaux apparaîtront ici dynamiquement -->
        </div>
    </div>
    

    
</body>
<footer class="footer">
    <div class="footer-content">
        <div id="Contact" class="contact-info">
            <p>Nous contacter: <br>+237 670101010; 695151010; 621101010 <br>Yaoundé, Cameroun</p>
        </div>
        <div class="social-links">
            <ul>
                <li><a href="#" class="social-link">Facebook</a></li>
                <li><a href="#" class="social-link">Instagram</a></li>
            </ul>
        </div>
    </div>
    <script src="JAVAS.JS"></script>
</footer>
</html>










