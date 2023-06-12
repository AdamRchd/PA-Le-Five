<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos de nous</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
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
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Le Five</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="site/index.php">Accueil</a>
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
    </header>

    <main class="container mt-5">
        <h1>À propos de nous</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec feugiat, nulla id accumsan scelerisque, ipsum sapien pellentesque mi, vitae vulputate ipsum metus ut urna. Quisque maximus magna eget elit blandit, eu posuere eros posuere. Etiam ullamcorper libero a efficitur pulvinar. Duis ut eleifend ante. Nullam volutpat convallis sem vel laoreet. Suspendisse dapibus pharetra ligula, et tristique metus finibus sit amet. Vivamus eget sapien sed mi scelerisque luctus. Sed rutrum malesuada efficitur. Pellentesque ultricies, risus vel gravida vestibulum, nulla risus fringilla nunc, id feugiat orci est eu urna. Nunc laoreet purus mauris, vitae iaculis nisi laoreet eu. Sed auctor, est nec efficitur tempus, nunc metus scelerisque sapien, eget gravida metus lacus sit amet sem. Phasellus non felis eget mauris lacinia ultrices. Fusce ut est a urna rhoncus rutrum. Aliquam convallis vestibulum sem eu rutrum.</p>
    </main>

    <footer class="footer bg-dark text-white mt-5 sticky-footer">
        <div class="container text-center">
            <span>Tous droits réservés &copy; 2023 - Le - Five</span>
            <a href="https://www.instagram.com" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
            <a href="https://twitter.com" target="_blank" class="social-icon"><i class="fab fa-twitter"></i></a>
            <a href="conditions_generales.php" class="footer-link">Conditions Générales de Vente</a>
            <a href="mentions_legales.php" class="footer-link">Mentions Légales</a>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
