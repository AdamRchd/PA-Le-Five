<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Meta required tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <title>Boutique</title>
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
            color: whitesmoke;
        }

        .product-card {
            height: 100%;
        }
    </style>
    <script>
    // Code JavaScript pour rediriger vers le panier
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.btn-block').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                var articleId = this.parentNode.querySelector('input[name="produit"]').value;
                var urlPanier = 'panier.php';

                window.location.href = urlPanier + '?article=' + articleId;
            });
        });
    });
</script>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <a class="navbar-brand" href="index.php">Le Five</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="site/index.php">Accueil</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="boutique.php">Boutique <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reservation.php">Réservation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="evenement.php">Événements</a>
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
        <h1>Nos produits</h1>
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card product-card">
                    <img src="https://www.clickforfoot.com/11235-thickbox_default/ballon-ligue-1-football-replica-t5.jpg" class="card-img-top" alt="Produit 1">
                    <div class="card-body">
                        <h5 class="card-title">Ballon de foot</h5>
                        <p class="card-text">14,99€</p>
                            <input type="hidden" name="produit" value="Produit 1">
                            <button type="submit" class="btn btn-block">Acheter</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card product-card">
                    <img src="https://api.prod.panini.cloud/pub/media/catalog/product/m/a/maillot_qatarpsg-311530j-blanc.jpg" class="card-img-top" alt="Produit 2">
                    <div class="card-body">
                        <h5 class="card-title">Maillot du PSG</h5>
                        <p class="card-text">149,99€</p>
                        <form action="boutique.php" method="post">
                            <input type="hidden" name="produit" value="Produit 2">
                            <button type="submit" class="btn btn-block">Acheter</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card product-card">
                    <img src="https://m.media-amazon.com/images/I/71tgv8O3IWL._AC_UF1000,1000_QL80_.jpg" class="card-img-top" alt="Produit 3">
                    <div class="card-body">
                        <h5 class="card-title">Crampon</h5>
                        <p class="card-text">59,99€</p>
                        <form action="boutique.php" method="post">
                            <input type="hidden" name="produit" value="Produit 3">
                            <button type="submit" class="btn btn-block">Acheter</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card product-card">
                    <img src="https://magourde.fr/img/p/7/3/5/2/gourde_psg_rouge_isotherme_260_ml_vl0.jpg" class="card-img-top" alt="Produit 4">
                    <div class="card-body">
                        <h5 class="card-title">Gourde PSG</h5>
                        <p class="card-text">12,99€</p>
                        <form action="boutique.php" method="post">
                            <input type="hidden" name="produit" value="Produit 4">
                            <button type="submit" class="btn btn-block">Acheter</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card product-card">
                    <img src="https://media.auchan.fr/54efbe4b-b98e-4a2d-bef3-5110193ec4f3_1200x1200/B2CD/" class="card-img-top" alt="Produit 5">
                    <div class="card-body">
                        <h5 class="card-title">Peignoir PSG</h5>
                        <p class="card-text">64,90€</p>
                        <form action="boutique.php" method="post">
                            <input type="hidden" name="produit" value="Produit 5">
                            <button type="submit" class="btn btn-block">Acheter</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card product-card">
                    <img src="https://assets.laboutiqueofficielle.com/w_1100,q_auto,f_auto/media/products/2018/03/29/psg_139058_571220-61-3_20180903T145216_01.jpg" class="card-img-top" alt="Produit 6">
                    <div class="card-body">
                        <h5 class="card-title">Sandale PSG</h5>
                        <p class="card-text">29,99€</p>
                        <form action="boutique.php" method="post">
                            <input type="hidden" name="produit" value="Produit 6">
                            <button type="submit" class="btn btn-block">Acheter</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card product-card">
                    <img src="https://cdn.shopify.com/s/files/1/0650/3815/6026/products/footkorner-ensemble-psg-bebe-2022-2023-bleu-blanc-rouge-dj7897-411_2.jpg?v=1670102321" class="card-img-top" alt="Produit 7">
                    <div class="card-body">
                        <h5 class="card-title">Kit ensemble PSG </h5>
                        <p class="card-text">79,99€</p>
                        <form action="boutique.php" method="post">
                            <input type="hidden" name="produit" value="Produit 7">
                            <button type="submit" class="btn btn-block">Acheter</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card product-card">
                    <img src="https://www.cdiscount.com/pdt2/8/0/6/1/350x350/1367806/rw/nike-casquette-de-football-psg-cap-17-mixte-bl.jpg" class="card-img-top" alt="Produit 8">
                    <div class="card-body">
                        <h5 class="card-title">Casquette PSG</h5>
                        <p class="card-text">19,99€</p>
                        <form action="boutique.php" method="post">
                            <input type="hidden" name="produit" value="Produit 8">
                            <button type="submit" class="btn btn-block">Acheter</button>
                        </form>
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
</body>
</html>