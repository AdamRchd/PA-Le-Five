<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once './config.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    header('Location: connexion.php');
    exit;
}

$userId = $_SESSION['id'];

// Vérifier si l'utilisateur est déjà abonné à la newsletter
$stmt = $pdo->prepare("SELECT * FROM abonnes_newsletter WHERE user_id = ?");
$stmt->execute([$userId]);
$subscriber = $stmt->fetch(PDO::FETCH_ASSOC);
$isSubscribed = ($subscriber !== false);

// Gérer le formulaire d'inscription à la newsletter
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($isSubscribed) {
        // L'utilisateur est déjà abonné, afficher un message d'erreur
        echo "Vous êtes déjà abonné à la newsletter.";
    } else {
        // Inscrire l'utilisateur à la newsletter
        $stmt = $pdo->prepare("INSERT INTO abonnes_newsletter (user_id) VALUES (?)");
        $stmt->execute([$userId]);
        echo "Vous êtes maintenant abonné à la newsletter.";
        $isSubscribed = true;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription à la newsletter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Inscription à la newsletter</h2>
        <?php if ($isSubscribed): ?>
            <p>Vous êtes déjà abonné à la newsletter.</p>
        <?php else: ?>
            <form action="" method="post">
                <button type="submit" class="btn btn-primary">S'inscrire à la newsletter</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
