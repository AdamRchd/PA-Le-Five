<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mon profil</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                <li class="nav-item ml-auto">
                ﻿<div class="form-group">
                        <input class="form-control" type="text" id="search-user" value="" placeholder="Rechercher un ou plusieurs utilisateurs"/>
                    </div>
                    <div style="margin-top: 20px;">
                    <div id="search-results"></div>
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

    <div class="container mt-4">
        <div class="row">
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
        </div>
    </div>
    <div id="resultsContainer"></div>

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

        $(document).ready(function () {
            var hairIndex = 0;
            var faceIndex = 0;
            var accessoryIndex = 0;
            var clothingIndex = 0;

            // Récupère les images dans la base de données
            var hairs = ["hair1.png", "hair2.png", "hair3.png"];
            var faces = ["face1.png", "face2.png", "face3.png"];
            var accessories = ["accessory1.png", "accessory2.png", "accessory3.png"];
            var clothing = ["clothing1.png", "clothing2.png", "clothing3.png"];

            // Afficher les images de base
            $("#hairImage").attr("src", hairs[hairIndex]);
            $("#faceImage").attr("src", faces[faceIndex]);
            $("#accessoryImage").attr("src", accessories[accessoryIndex]);
            $("#clothingImage").attr("src", clothing[clothingIndex]);

            // Clic pour les images suivantes ou précédentes (cheveux, visage, accessoire, vêtement)
            $("#prevHairButton").click(function () {
                hairIndex = (hairIndex - 1 + hairs.length) % hairs.length;
                $("#hairImage").attr("src", hairs[hairIndex]);
            });

            $("#nextHairButton").click(function () {
                hairIndex = (hairIndex + 1) % hairs.length;
                $("#hairImage").attr("src", hairs[hairIndex]);
            });

            $("#prevFaceButton").click(function () {
                faceIndex = (faceIndex - 1 + faces.length) % faces.length;
                $("#faceImage").attr("src", faces[faceIndex]);
            });

            $("#nextFaceButton").click(function () {
                faceIndex = (faceIndex + 1) % faces.length;
                $("#faceImage").attr("src", faces[faceIndex]);
            });

            $("#prevAccessoryButton").click(function () {
                accessoryIndex = (accessoryIndex - 1 + accessories.length) % accessories.length;
                $("#accessoryImage").attr("src", accessories[accessoryIndex]);
            });

            $("#nextAccessoryButton").click(function () {
                accessoryIndex = (accessoryIndex + 1) % accessories.length;
                $("#accessoryImage").attr("src", accessories[accessoryIndex]);
            });

            $("#prevClothingButton").click(function () {
                clothingIndex = (clothingIndex - 1 + clothing.length) % clothing.length;
                $("#clothingImage").attr("src", clothing[clothingIndex]);
            });

            $("#nextClothingButton").click(function () {
                clothingIndex = (clothingIndex + 1) % clothing.length;
                $("#clothingImage").attr("src", clothing[clothingIndex]);
            });

            // Il génère l'image de fin
            $("#generateButton").click(function () {
                var hairSrc = $("#hairImage").attr("src");
                var faceSrc = $("#faceImage").attr("src");
                var accessorySrc = $("#accessoryImage").attr("src");
                var clothingSrc = $("#clothingImage").attr("src");

                var backgroundImage = $("#backgroundImage").attr("src");
                var canvas = document.createElement("canvas");
                var context = canvas.getContext("2d");
                var imageObj = new Image();

                imageObj.onload = function () {
                    context.drawImage(imageObj, 0, 0);
                    context.drawImage($("#faceImage")[0], 0, 0);
                    context.drawImage($("#hairImage")[0], 0, 0);
                    context.drawImage($("#accessoryImage")[0], 0, 0);
                    context.drawImage($("#clothingImage")[0], 0, 0);

                    var dataURL = canvas.toDataURL();
                    $("#avatarContainer img").attr("src", dataURL);
                };

                imageObj.src = backgroundImage;
            });
        });
        
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <script>

  $(document).ready(function(){

    $('#search-user').keyup(function(){

      $('#result-search').html('');

 

      var utilisateur = $(this).val();

 

      if(utilisateur != ""){

        $.ajax({

          type: 'GET',

          url: 'fonctions/recherche_utilisateur.php',

          data: 'user=' + encodeURIComponent(utilisateur),

          success: function(data){

            if(data != ""){

              $('#result-search').append(data);

            }else{

              document.getElementById('result-search').innerHTML = "<div style='font-size: 20px; text-align: center; margin-top: 10px'>Aucun utilisateur</div>"

            }

          }

        });

      }

    });

  });

</script>

</body>

</html>
