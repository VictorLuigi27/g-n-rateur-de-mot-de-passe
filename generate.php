<?php
session_start();

function generatePassword($length = 12, $includeSpecialChars = true) {
    $lowercase = 'abcdefghijklmnopqrstuvwxyz';
    $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numbers = '0123456789';
    $specialChars = '!@#$%^&*()-_=+[]{}|;:,.<>?';

    $characters = $lowercase . $uppercase . $numbers;
    if ($includeSpecialChars) {
        $characters .= $specialChars;
    }

    $password = '';
    $charactersLength = strlen($characters);
    for ($i = 0; $i < $length; $i++) {
        $randomIndex = random_int(0, $charactersLength - 1);
        $password .= $characters[$randomIndex];
    }

    return $password;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $length = isset($_POST['length']) ? intval($_POST['length']) : 12;
    $includeSpecialChars = isset($_POST['include_special_chars']);
    $password = generatePassword($length, $includeSpecialChars);

    // Stocker le mot de passe en session
    $_SESSION['password'] = $password;

    // Redirection vers la page d'accueil
    header('Location: index.php');
    exit;
}
?>
