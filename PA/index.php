<!doctype html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <title>Le - Five</title>
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
        <h1 class="mb-4">Reserve ton terrain !</h1>
        <a href="https://www.sportvalue.fr/wp-content/uploads/2020/09/le-five-sport-value-interview.jpg">
            <img src="https://www.sportvalue.fr/wp-content/uploads/2020/09/le-five-sport-value-interview.jpg" alt="Description_de_l_image">
        </a>

    </div>

    <div class="container bg-light p-5 mt-5">
    <h2 class="mb-4">Avis de nos utilisateurs</h2>
    <?php
        require_once './config.php';

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        $query = $pdo->prepare("SELECT * FROM avis ORDER BY id DESC");
        $query->execute();

        while ($avis = $query->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <div class="card mb-3">
            <div class="card-body">
                <p class="card-text">"<?= htmlspecialchars($avis['avis']) ?>"</p>
                <div class="text-right">
                    <span class="text-warning">
                        <?php for ($i = 0; $i < $avis['note']; $i++) { ?>
                            &#11088;
                        <?php } ?>
                    </span>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="text-center">
        <a href="contact.php" class="btn btn-info">Contactez-nous</a>
        <a href="avis.php" class="btn btn-primary">Déposer un avis</a>
    </div>
</div>

    <div class="container bg-light p-5 mt-5">
        <h2 class="mb-4">Avis de nos utilisateurs</h2>
        <div class="card mb-3">
            <div class="card-body">
                <p class="card-text">"Excellent site, facile à utiliser et réservations très pratiques!"</p>
                <div class="text-right"><span class="text-warning">&#11088;&#11088;&#11088;&#11088;&#11088;</span></div>
            </div>
        </div>
        
        <div class="card mb-3">
            <div class="card-body">
                <p class="card-text">"Très satisfait de l'interface et du choix des terrains."</p>
                <div class="text-right"><span class="text-warning">&#11088;&#11088;&#11088;&#11088;&#11088;</span></div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <p class="card-text">"Bon site, je recommande!"</p>
                <div class="text-right"><span class="text-warning">&#11088;&#11088;&#11088;&#11088;&#11088;</span></div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <p class="card-text">"La reservation de terrain est rapide."</p>
                <div class="text-right"><span class="text-warning">&#11088;&#11088;&#11088;&#11088;&#11088;</span></div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <p class="card-text">"Terrain bien aérés avec synthétique de qualité."</p>
                <div class="text-right"><span class="text-warning">&#11088;&#11088;&#11088;&#11088;&#11088;</span></div>
            </div>
        </div>
        <div class="text-center">
            <a href="contact.php" class="btn btn-info">Contactez-nous</a>
            <a href="avis.php" class="btn btn-primary">Déposer un avis</a>
        </div>
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
