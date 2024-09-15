<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICTU EXAMS - Tableau des Épreuves</title>
    <link rel="stylesheet" href="CSS/EPREUVES.CSS">
</head>
<body>
    <!-- Header avec le nom du site et les liens -->
    <header>
        <div class="logo">
            <h1>ICTU EXAMS</h1>
        </div>
        <nav>
            <ul>
                <li><a href="INDEX.php">Accueil</a></li>
                <li><a href="INDEX.php">À Propos de Nous</a></li>
                <li><a href="INDEX.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Contenu principal avec tableau des épreuves -->
    <main>
        <h2>Épreuves - <span id="filiere"></span> - Niveau <span id="niveau"></span></h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Nom du fichier</th>
                        <th>Année</th>
                        <th>Nombre de vues</th>
                        <th>Notation</th>
                    </tr>
                </thead>
                <tbody id="examTable">
                <?php
    require('BD.php');  // Connexion à la base de données
    $sql = "SELECT nom_fichier, annee, vues, Notation FROM epreuves";  // Requête SQL
    $result = $conn->query($sql);  // Exécution de la requête
    
    if (!$result) {  // Gestion de l'erreur en cas d'échec de la requête
        die("Erreur dans la requête SQL : " . $conn->error);
    }
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $pdf_link = 'Epreuves/' . htmlspecialchars($row['nom_fichier']);

            echo "<tr>";
            echo "<td><a href='$pdf_link' target='_blank'>" . htmlspecialchars($row['nom_fichier']) . "</a></td>";  // Lien cliquable vers le PDF
            echo "<td>" . htmlspecialchars($row['annee']) . "</td>";
            echo "<td>" . htmlspecialchars($row['vues']) . "</td>";  // Correction de la clé
            echo "<td>" . htmlspecialchars($row['Notation']) . "</td>";  // Correction de la clé
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<tr><td colspan='4'>Aucune donnée disponible</td></tr>";
    }
?>
                    
                </tbody>
            </table>
        </div>
    </main>

    <!-- Animation de fond -->
    <div class="animation-background"></div>

    <script src="C:\Users\habib\OneDrive\Documents\HTML AI\CSS\EPREUVES.JS"></script>
</body>
</html>
