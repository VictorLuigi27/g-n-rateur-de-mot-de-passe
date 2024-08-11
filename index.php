<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Générateur de Mot de Passe</title>
    <link rel="stylesheet" href="index.css">
    <link rel="icon" href="password.svg" type="image/svg+xml">
</head>
<body>
    <div class="container">
        <h1>Générateur de Mot de Passe</h1>
        <form action="generate.php" method="post">
            <div class="form-group">
                <label for="length">Longueur du mot de passe :</label>
                <input type="number" id="length" name="length" min="4" max="50" value="12" required>
            </div>
            <div class="form-group">
                <label for="include_special_chars">
                    <input type="checkbox" id="include_special_chars" name="include_special_chars">
                    Inclure des caractères spéciaux
                </label>
            </div>
            <button type="submit">Générer</button>
        </form>

        <?php
        session_start();
        if (isset($_SESSION['password'])) {
            echo '<div class="result">
                <h2>Mot de Passe Généré :</h2>
                <p>' . htmlspecialchars($_SESSION['password']) . '</p>
            </div>';
            // Effacer le mot de passe de la session après l'affichage
            unset($_SESSION['password']);
        }
        ?>
    </div>
</body>
</html>
