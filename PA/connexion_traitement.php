<?php
session_start(); // Ajouter le lancement de la session

require_once './config.php';

try {
    // Vérifier si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('La demande doit être de type POST');
    }

    // Récupérer les données du formulaire
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    if (!$email || !$password) {
        throw new Exception('Email et/ou mot de passe manquants');
    }

    // Préparer la requête SQL de sélection
    $sql = "SELECT * FROM utilisateur WHERE email = ?";

    // Exécuter la requête préparée
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);

    // Vérifier si l'utilisateur existe dans la base de données
    if ($stmt->rowCount() === 0) {
        throw new Exception('Identifiants de connexion invalides');
    }

    // L'utilisateur est connecté avec succès
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier si le mot de passe correspond
    if (!password_verify($password, $user['pwd'])) {
        throw new Exception('Identifiants de connexion invalides');
    }

    $_SESSION['email'] = $email;
    $_SESSION['statut_admin'] = $user['statut_admin']; // Stocker le statut admin dans la variable de session
    header('Location: ./site/index.php');
    exit;
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
    echo '<br>Email : ' . $email;
    echo '<br>Mot de passe : ' . $password;
    echo '<br>Nombre d\'utilisateurs trouvés : ' . $stmt->rowCount();
    if (isset($user)) {
        echo '<br>Mot de passe dans la base de données : ' . $user['pwd'];
    }
    
    // Ajoutez ces lignes pour aider au débogage :
    echo "<br/>";
    echo "Trace :<br/>";
    echo $e->getTraceAsString();
}
// Hacher le mot de passe
$passwordHash = password_hash($password, PASSWORD_DEFAULT);
echo "Mot de passe haché : " . $passwordHash;
?>
