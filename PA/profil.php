<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mon profil</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
    <style>
        .sticky-footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }
        #avatarContainer {
            position: relative;
            width: 300px;
            height: 300px;
        }

        img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        #scrollButtons {
            margin-top: 20px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Le Five</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/site/index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="boutique.php">boutique</a>
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
                    <a class="nav-link" href="apropos.php">À propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="panier.php">Panier</a>
                </li>
                <li>
                    <form action="index.php" method="post">
                        <button type="submit" class="btn btn-danger">Déconnexion</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form id="searchForm" class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" id="searchQuery" placeholder="Rechercher..." aria-label="Rechercher">
                        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Rechercher</button>
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

    <!-- Content -->
    <div class="container mt-4">
        <h1 class="mb-4">Profil</h1>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Informations personnelles</h5>
                        <p class="card-text"><strong>Nom :</strong> <span id="nom">John Doe</span></p>
                        <p class="card-text"><strong>Email :</strong> <span id="email">johndoe@example.com</span></p>
                        <p class="card-text"><strong>Téléphone :</strong> <span id="telephone">1234567890</span></p>
                        <button class="btn btn-primary" onclick="imprimerPDF()">Imprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-body">
    <div id="avatarContainer">
        <img id="backgroundImage" src="background.png">
        <img id="hairImage" src="">
        <img id="faceImage" src="">
        <img id="accessoryImage" src="">
        <img id="clothingImage" src="">
    </div>
    

    <div id="scrollButtons">
        <button id="prevHairButton">&#8249;</button>
        <button id="nextHairButton">&#8250;</button>
        <button id="prevFaceButton">&#8249;</button>
        <button id="nextFaceButton">&#8250;</button>
        <button id="prevAccessoryButton">&#8249;</button>
        <button id="nextAccessoryButton">&#8250;</button>
        <button id="prevClothingButton">&#8249;</button>
        <button id="nextClothingButton">&#8250;</button>
    </div>

    <button id="generateButton">Générer</button>

                    </div> 
                </div>
            </div>


    

    <!-- Footer -->
    <footer class="footer bg-dark text-white mt-5 sticky-footer">
        <div class="container text-center">
            <span>Tous droits réservés &copy; 2023 - Le - Five</span>
            <a href="https://www.instagram.com" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
            <a href="https://twitter.com" target="_blank" class="social-icon"><i class="fab fa-twitter"></i></a>
            <a href="conditions_generales.php" class="footer-link">Conditions Générales de Vente</a>
            <a href="mentions_legales.php" class="footer-link">Mentions Légales</a>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>

    <script>
        function imprimerPDF() {
            // Créer une instance de jsPDF
            var doc = new jsPDF();

            // Récupérer le contenu de la carte
            var nom = document.getElementById("nom").innerText;
            var email = document.getElementById("email").innerText;
            var telephone = document.getElementById("telephone").innerText;

            // Ajouter le contenu à la page PDF
            doc.text("Nom : " + nom, 10, 10);
            doc.text("Email : " + email, 10, 20);
            doc.text("Téléphone : " + telephone, 10, 30);

            // Enregistrer le PDF
            doc.save("profil.pdf");
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#searchForm').submit(function(event) {
                event.preventDefault();
                var query = $('#searchQuery').val();

                $.ajax({
                    url: 'search.php',
                    method: 'GET',
                    data: { query: query },
                    success: function(response) {
                        // Mettez à jour les résultats ou effectuez d'autres actions
                    },
                    error: function() {
                        alert('Une erreur s\'est produite lors de la recherche.');
                    }
                });
            });
        });
    </script>
</body>

</html>
