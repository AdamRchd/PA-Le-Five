<?php
require_once '../../../config.php';
session_start();

// Redirige vers la page de connexion si l'utilisateur n'est pas authentifié
if(!isset($_SESSION['email'])) {
    header("Location:../connexion.php");
    exit();
}

// Redirige vers une page d'erreur ou d'accueil si l'utilisateur n'est pas un admin
if(!isset($_SESSION['statut_admin']) || $_SESSION['statut_admin'] != 1) {
    header("Location:../erreur.php"); // Remplacez par la page d'erreur ou la page d'accueil appropriée
    exit();
}

// Vérifier si l'identifiant de l'utilisateur à supprimer est spécifié dans l'URL
if(isset($_GET['delete_user_id'])) {
    $userId = $_GET['delete_user_id'];

    // Supprimer l'utilisateur de la table "utilisateur"
    $deleteUserQuery = $pdo->prepare("DELETE FROM utilisateur WHERE id = :id");
    $deleteUserQuery->execute(['id' => $userId]);

    // Supprimer les enregistrements de bannissement associés à cet utilisateur
    $deleteBansQuery = $pdo->prepare("DELETE FROM bannissement WHERE utilisateur_id = :id");
    $deleteBansQuery->execute(['id' => $userId]);

    // Rediriger vers la page actuelle pour actualiser la liste des utilisateurs
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

$users_lifetime_banned = $pdo->query("SELECT * FROM utilisateur WHERE isActive=0")->fetchAll(PDO::FETCH_ASSOC);
$users_temp_banned = $pdo->query("SELECT utilisateur.*, bannissement.date_fin FROM utilisateur INNER JOIN bannissement ON utilisateur.id=bannissement.utilisateur_id WHERE bannissement.date_fin > CURDATE()")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs bannis</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        /* Ajouter du CSS personnalisé */
        .back-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="my-4">Liste des utilisateurs bannis</h1>
    <h2>Bannis à vie</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users_lifetime_banned as $user): ?>
            <tr>
                <td><?php echo $user['lastname']; ?></td>
                <td><?php echo $user['firstname']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td>
                    <a href="?delete_user_id=<?php echo $user['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2>Bannis temporairement</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Banni jusqu'à</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users_temp_banned as $user): ?>
            <tr>
                <td><?php echo $user['lastname']; ?></td>
                <td><?php echo $user['firstname']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['date_fin']; ?></td>
                <td>
                    <a href="?delete_user_id=<?php echo $user['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- Bouton de retour en bas à droite -->
    <a href="#" class="btn btn-primary back-button">Retour</a>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        document.querySelector('.back-button').addEventListener('click', function() {
            history.back();
        });
    </script>
</div>
</body>
</html>
