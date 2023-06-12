<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <title>Avis - Le Five</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Le Five</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link btn btn-primary mr-2" href="connexion.php">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-success" href="inscription.php">Inscription</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container bg-light p-5">
        <h1 class="mb-4">Déposer un avis</h1>
        <form action="traitement_avis.php" method="POST">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="avis">Avis</label>
                <textarea class="form-control" id="avis" name="avis" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="note">Note</label>
                <select class="form-control" id="note" name="note" required>
                    <option value="1">1 étoile</option>
                    <option value="2">2 étoiles</option>
                    <option value="3">3 étoiles</option>
                    <option value="4">4 étoiles</option>
                    <option value="5">5 étoiles</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>

    <footer class="footer bg-dark text-white mt-5">
        <div class="container text-center">
            <span>Tous droits réservés &copy; 2023 - Le - Five</span>
            <a href="https://www.instagram.com" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
            <a href="https://twitter.com" target="_blank" class="social-icon"><i class="fab fa-twitter"></i></a>
            <a href="conditions_generales.php" class="footer-link">Conditions Générales de Vente</a>
            <a href="mentions_legales.php" class="footer-link">Mentions Légales</a>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
