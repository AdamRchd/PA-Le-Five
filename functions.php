<?php
function sendNewsletter($subject, $body) {
    // Connexion à la base de données
    $conn = new mysqli("localhost", "utilisateur", "motdepasse", "ma_base_de_donnees");

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    // Récupération des utilisateurs actifs
    $sql = "SELECT name, email FROM users WHERE isActive=1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Configuration de l'envoi de l'e-mail
        $headers = "From: monadresse@domaine.com\r\n";
        $headers .= "Reply-To: monadresse@domaine.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";

        // Boucle à travers la liste des destinataires
        while ($row = $result->fetch_assoc()) {
            $to = $row['email'];
            $name = $row['name'];

            // Personnalisation du corps du message
            $message = str_replace("{{NAME}}", $name, $body);

            // Envoi de l'e-mail
            if (mail($to, $subject, $message, $headers)) {
                echo "L'e-mail a été envoyé avec succès à $to";
            } else {
                echo "Une erreur s'est produite lors de l'envoi de l'e-mail à $to";
            }
        }
    } else {
        echo "Il n'y a pas d'utilisateurs actifs pour envoyer la newsletter.";
    }

    // Fermeture de la connexion à la base de données
    $conn->close();
}


?>