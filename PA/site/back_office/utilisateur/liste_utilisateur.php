<?php
session_start(); // Ajouter le lancement de la session

require_once '../../../config.php';

// Vérifier si l'utilisateur est connecté et est un administrateur
if (!isset($_SESSION['email']) || $_SESSION['statut_admin'] != 1) {
    header('Location: ./connexion_traitement.php');
    exit;
}

$users = $pdo->query('SELECT * FROM utilisateur')->fetchAll(PDO::FETCH_ASSOC);

function printBanButtons($user) {
    global $pdo;

    // Vérifier si l'utilisateur est actuellement banni temporairement
    $stmt = $pdo->prepare("SELECT * FROM bannissement WHERE utilisateur_id=? AND date_fin > CURDATE()");
    $stmt->execute([$user['id']]);
    $ban = $stmt->fetch();

    if ($user['isActive'] && !$ban) {
        echo "<button type='submit' name='ban_lifetime' value='{$user['id']}' class='btn btn-danger'>Bannir à vie</button>";
        echo "<button type='button' onclick='showTempBanForm({$user['id']})' class='btn btn-warning'>Bannir temporairement</button>";
        if (!$user['statut_admin']) {
            echo "<button type='submit' name='make_admin' value='{$user['id']}' class='btn btn-primary'>Faire passer en admin</button>";
        }
    } elseif ($ban) {
        echo "Banni jusqu'au {$ban['date_fin']}";
        echo "<button type='submit' name='unban_temp' value='{$user['id']}' class='btn btn-success'>Débannir</button>";
    } else {
        echo "<button type='submit' name='unban' value='{$user['id']}' class='btn btn-success'>Débannir</button>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ban_lifetime'])) {
        $stmt = $pdo->prepare("UPDATE utilisateur SET isActive=0 WHERE id=?");
        $stmt->execute([$_POST['ban_lifetime']]);
    } elseif (isset($_POST['ban_temp'])) {
        $date_fin = $_POST['ban_temp_date'];
        $stmt = $pdo->prepare("INSERT INTO bannissement (utilisateur_id, date_debut, date_fin) VALUES (?, CURDATE(), ?)");
        $stmt->execute([$_POST['ban_temp'], $date_fin]);
    } elseif (isset($_POST['unban'])) {
        $stmt = $pdo->prepare("UPDATE utilisateur SET isActive=1 WHERE id=?");
        $stmt->execute([$_POST['unban']]);
    } elseif (isset($_POST['unban_temp'])) {
        $stmt = $pdo->prepare("DELETE FROM bannissement WHERE utilisateur_id=? AND date_fin > CURDATE()");
        $stmt->execute([$_POST['unban_temp']]);
    } elseif (isset($_POST['make_admin'])) {
        $stmt = $pdo->prepare("UPDATE utilisateur SET statut_admin=1 WHERE id=?");
        $stmt->execute([$_POST['make_admin']]);
    }
    header('Location: liste_utilisateur.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script>
    function showTempBanForm(id) {
        const date = prompt("Entrez la date de fin du bannissement (format YYYY-MM-DD) :");
        if (date) {
            document.getElementById('ban_temp').value = id;
            document.getElementById('ban_temp_date').value = date;
            document.getElementById('ban_form').submit();
        }
    }
    </script>
</head>
<body>
<div class="container">
    <h1 class="my-4">Liste des utilisateurs</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['lastname']; ?></td>
                <td><?php echo $user['firstname']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td>
                    <form method="post">
                        <?php printBanButtons($user); ?>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <form id="ban_form" method="post">
        <input type="hidden" id="ban_temp" name="ban_temp" value="">
        <input type="hidden" id="ban_temp_date" name="ban_temp_date" value="">
    </form>
</div>
</body>
</html>
