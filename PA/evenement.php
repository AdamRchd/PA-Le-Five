<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Meta required tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <title>Événements</title>
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
        .custom-image {
            width: 200px; 
            border-radius: 10px; 
            display: block;
            margin: auto;
        }

        .card-title {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .card-body {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
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
                    <a class="nav-link" href="/site/index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="boutique.php">Boutique</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reservation.php">Réservation</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="evenement.php">Événements <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="newsletter.php">Newsletter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profil.php">Mon profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="apropos.php">À propos</a>
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
        <h1>Événements avec des footballeurs français</h1>
        <div class="card-deck mt-4">
            
        <div class="card">
                <h5 class="card-title">Inauguration du Five par Kylian Mbappé</h5>
            <a href="https://www.philonomist.com/sites/default/files/styles/max_325x325/public/2023-03/066_DPPI_40923007_037.jpg?itok=ttX67Bfr">
                <img src="https://www.philonomist.com/sites/default/files/styles/max_325x325/public/2023-03/066_DPPI_40923007_037.jpg?itok=ttX67Bfr" alt="portait de kylian" class="custom-image"> 
            </a>

                <div class="card-body">
                    <p class="card-text">Nous avons eu l'honneur de rencontré Mr Mbappé qui à pu inaugurer l'ouverture de notre Five à Paris 12.</p>
                </div>

                <div class="card-footer">
                    <small class="text-muted">22 février 2023</small>
                </div>
        </div>

            <div class="card">
                    <h5 class="card-title">Accueil de l'équipe de France sur nos terrains</h5>
                <a href="https://cdn-s-www.vosgesmatin.fr/images/0B6C5573-5CCF-4ABB-BC65-9AFDB616CA69/NW_raw/photo-matthias-hangst-afp-1623790598.jpg"> 
                    <img src="https://cdn-s-www.vosgesmatin.fr/images/0B6C5573-5CCF-4ABB-BC65-9AFDB616CA69/NW_raw/photo-matthias-hangst-afp-1623790598.jpg" alt="équipe de fr" class="custom-image">
                </a>

                <div class="card-body">
                    <p class="card-text">Le 22 mars 2023 nous avons accueuillis l'équipe de France qui à jouer sur nos terrains.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">22 mars 2023</small>
                </div>
            </div>
        </div>
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