<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Inscription</h2>
        <form action="traitement.php" method="post" id="inscriptionForm">
            <!-- Étape 1 -->
            <div class="step step-1">
                <div class="form-group">
                    <label for="lastname">Nom</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="firstname">Prénom</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="birthday">Date de naissance</label>
                    <input type="date" name="birthday" id="birthday" class="form-control" required>
                </div>
                <button type="button" class="btn btn-primary next-btn">Suivant</button>
            </div>
            <!-- Étape 2 -->
            <div class="step step-2" style="display: none;">
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirmer le mot de passe</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" required>
                </div>
                <button type="button" class="btn btn-primary prev-btn">Précédent</button>
                <button type="button" class="btn btn-primary next-btn">Suivant</button>
            </div>
            <!-- Étape 3 -->
            <div class="step step-3" style="display: none;">
                <div class="form-group">
                    <label for="code">Code de vérification</label>
                    <input type="text" name="code" id="code" class="form-control" required>
                </div>
                <button type="button" class="btn btn-primary" id="send-code">Envoyer le code</button>
                <button type="button" class="btn btn-primary prev-btn">Précédent</button>
                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var currentStep = 1;
            var totalSteps = 3;

            $('.next-btn').on('click', function() {
                if (currentStep < totalSteps) {
                    currentStep++;
                    showStep(currentStep);
                }
            });

            $('.prev-btn').on('click', function() {
                if (currentStep > 1) {
                    currentStep--;
                    showStep(currentStep);
                }
            });

            $('#send-code').on('click', function() {
                $.ajax({
                    url: 'traitement.php',
                    method: 'POST',
                    data: {
                        sendCode: true,
                        lastname: $('#lastname').val(),
                        firstname: $('#firstname').val(),
                        email: $('#email').val(),
                        password: $('#password').val(),
                        confirmPassword: $('#confirmPassword').val(),
                        birthday: $('#birthday').val()
                    },
                    success: function(response) {
                        alert(response);
                    }
                });
            });

            function showStep(step) {
                $('.step').hide();
                $('.step-' + step).show();
            }
        });
    </script>
</body>
</html>
