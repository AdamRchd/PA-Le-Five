<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Meta required tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <title>Réservation de terrain</title>
    <style>
        .sticky-footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }
        .nav-cart-icon {
            position: relative;
            padding-left: 15px;
        }

        .nav-cart-icon i {
            font-size: 15px;
            color: white;
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Le Five</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="site/index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="boutique.php">Boutique</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="reservation.php">Réservation <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="evenement.php">Événements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="apropos.php">À propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profil.php">Mon profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="newsletter.php">Newsletter</a>
                </li>
                <li>
                    <form action="index.php" method="post">
                        <button type="submit" class="btn btn-danger">Déconnexion</button>
                    </form>
                </li>
            </ul>
            <ul class="nav-item ml-auto">
                <li class="nav-item">
                    <a class="nav-link nav-cart-icon" href="panier.php">
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        <h1>Réservation de terrain</h1>
        <form>
            <div class="form-group">
                <label for="nombre-joueurs">Nombre de joueurs :</label>
                <input type="number" class="form-control" id="nombre-joueurs" name="nombre-joueurs" required>
            </div>
            <div class="form-group">
                <label for="date-heure">Date et heure :</label>
                <input type="datetime-local" class="form-control" id="date-heure" name="date-heure" required>
            </div>
            <div class="form-group">
                <label for="nom-reservation">Votre nom :</label>
                <input type="text" class="form-control" id="nom-reservation" name="nom-reservation" required>
            </div>
            <div class="form-group">
                <label for="numero-terrain">Numéro du terrain :</label>
                <input type="number" class="form-control" id="numero-terrain" name="numero-terrain" required>
            </div>
            <button type="submit" class="btn btn-primary">Réserver</button>
        </form>
    </div>

    <footer class="footer bg-dark text-white mt-5 sticky-footer">
            <div class="container text-center">
                <span>Tous droits réservés &copy; 2023 - Le - Five</span>
                <a href="https://www.instagram.com" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="https://twitter.com" target="_blank" class="social-icon"><i class="fab fa-twitter"></i></a>
                <a href="conditions_generales.php" class="footer-link">Conditions Générales de Vente</a>
                <a href="mentions_legales.php" class="footer-link">Mentions Légales</a>
        </div>
    </footer>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
