<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!doctype html>
<html lang="fr">

<head>
    <!-- Meta required tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="./css/index.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <title>Le - Five Accueil</title>
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="../../index.php">Le Five</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../reservation.php">Réservation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../boutique.php">Boutique</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../evenement.php">Événements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../apropos.php">À propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../newsletter.php">newsletter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../profil.php">Mon profil</a>
                </li>
                
                
                <?php
                require_once '../config.php';
            // Vérifier si l'utilisateur est admin
            session_start();
            if (isset($_SESSION['statut_admin']) && $_SESSION['statut_admin'] == 1) {
                echo '<li class="nav-item"><a class="nav-link" href="./back_office">Admin</a></li>';
            }
            ?>
            <li>
                    <form action="../../index.php" method="post">
                        <button type="submit" class="btn btn-danger">Déconnexion</button>
                    </form>
                </li>
            </ul>
            <ul class="nav-item ml-auto">
                <li class="nav-item">
                    <a class="nav-link nav-cart-icon" href="../../panier.php">
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <!-- Carousel content -->
    </div>

    <!-- Main Content -->
    <div class="container mt-5">
        <h1>Bienvenue sur le site du Football Club!</h1>
        <p>Nous sommes ravis de vous voir ici. Explorez le site pour découvrir toutes nos activités.</p>
        <a href="https://www.sportvalue.fr/wp-content/uploads/2020/09/le-five-sport-value-interview.jpg">
            <img src="https://www.sportvalue.fr/wp-content/uploads/2020/09/le-five-sport-value-interview.jpg" alt="Description_de_l_image">
        </a>
    </div>

    <!-- Footer -->
    <footer class="footer bg-dark text-white mt-5 sticky-footer">
        <div class="container text-center">
            <span>Tous droits réservés &copy; 2023 - Le - Five</span>
            <a href="https://www.instagram.com" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
            <a href="https://twitter.com" target="_blank" class="social-icon"><i class="fab fa-twitter"></i></a>
            <a href="../conditions_generales.php" class="footer-link">Conditions Générales de Vente</a>
            <a href="../mentions_legales.php" class="footer-link">Mentions Légales</a>
        </div>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
