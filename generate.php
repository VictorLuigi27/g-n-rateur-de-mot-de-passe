<?php
// Pour démarrer la session
session_start();

// Le but est de généreer un mot de passe aléatoire basé sur des critères

// Dans les paramètre de la fonction on indique une longueur par défaut de 12 caractères
// et on inclut les caractères spéciaux 
function generatePassword($length = 12, $includeSpecialChars = true) {
    // Le mot de passe pourra contenir des lettres minuscules, 
    // majuscules, des chiffres et aussi des caractères spéciaux

    $lowercase = 'abcdefghijklmnopqrstuvwxyz';
    $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numbers = '0123456789';
    $specialChars = '!@#$%^&*()-_=+[]{}|;:,.<>?';

    $characters = $lowercase . $uppercase . $numbers;
    if ($includeSpecialChars) {
        $characters .= $specialChars;
    }

    // On initalise la chaîne de caractères qui contiendra le mot de passe
    $password = '';
    $charactersLength = strlen($characters);

    // La boucle génère autant de fois la longueur du mor de passe que l'on souhaite
    // A chaque fois on tire un caractère aléatoire dans la chaîne de caractères
    for ($i = 0; $i < $length; $i++) {
        $randomIndex = random_int(0, $charactersLength - 1);
        $password .= $characters[$randomIndex];
    }

    // Puis on retourne le mot de passe !
    return $password;
}

// Si la requête est de type POST. Cela indiquera que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // On récupère la longueur du mot de passe et si on doit inclure les caractères spéciaux
    $length = isset($_POST['length']) ? intval($_POST['length']) : 12;
    $includeSpecialChars = isset($_POST['include_special_chars']);

    // Le mot de passe sera basé sur les paramètres du formulaire
    $password = generatePassword($length, $includeSpecialChars);

    // Ceci va permettre de stocker le mot de passe dans la session
    // Ou alors de pouvoir l'afficher sur la page d'accueil

    $_SESSION['password'] = $password;

    // Redirige vers la page index.php pour le rendu
    header('Location: index.php');

    // Termine le script
    exit;
}
?>
