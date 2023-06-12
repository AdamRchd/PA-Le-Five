<?php
session_start(); // Ajouter le lancement de la session

require_once '../../config.php';

// Vérifier si l'utilisateur est connecté et est un administrateur
if (!isset($_SESSION['email']) || $_SESSION['statut_admin'] != 1) {
    header('Location: ./connexion_traitement.php');
    exit;
}
?>

<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Ajouter du CSS personnalisé */
        .back-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
        }
    </style>
    <title>Page d'Administration</title>
</head>

<body>
    <div class="container">
        <h1 class="mt-5 mb-5">Page d'Administration</h1>

        <div class="row">
            <div class="col-3">
                <div class="list-group">
                    <a href="./utilisateur/liste_utilisateur.php" class="list-group-item list-group-item-action">Gestion des utilisateurs</a>
                    <a href="#" class="list-group-item list-group-item-action">Gestion des produits</a>
                    <a href="#" class="list-group-item list-group-item-action">Gestion des commandes</a>
                    <a href="#" class="list-group-item list-group-item-action">Statistiques</a>
                    <a href="./utilisateur/statut_user.php" class="list-group-item list-group-item-action">statut_user</a>
                    <a href="./utilisateur/newsletter.php" class="list-group-item list-group-item-action">newsletter</a>
                    <a href="./utilisateur/sauvegarde.php" class="list-group-item list-group-item-action">Sauvegarde</a>
                </div>
            </div>

            <div class="col-9">
                <!-- Ici vous pouvez inclure le contenu de chaque page selon la catégorie sélectionnée -->
                <h2>Bienvenue dans l'interface d'administration</h2>
                <p>Choisissez une catégorie dans le menu de gauche.</p>
            </div>
        </div>
        <a href="../index.php" class="btn btn-primary back-button">Retour</a> <!-- Ajouter le bouton de retour -->
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
