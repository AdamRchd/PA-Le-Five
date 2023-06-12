<?php

session_start();
require '../../PHPMailer-master/src/PHPMailer.php';
require '../../PHPMailer-master/src/SMTP.php';
require '../../PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once '../../../config.php';

if (!isset($_SESSION['email']) || $_SESSION['statut_admin'] != 1) {
    header('Location: ./connexion_traitement.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = $_POST['subject'];
    $body = $_POST['body'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $subscribers = $pdo->query("SELECT email FROM abonnes_newsletter")->fetchAll(PDO::FETCH_COLUMN);

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'pagrp1.2022@gmail.com';
    $mail->Password = 'vjzininlbvdejbsc';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('pagrp1.2022@gmail.com', 'Mailer');
    $mail->Subject = $subject;
    $mail->Body = $body;

    foreach ($subscribers as $email) {
        $mail->addAddress($email);
    }

    if ($mail->send()) {
        echo 'Newsletter programmée pour le ' . $date . ' à ' . $time;
    } else {
        echo 'Erreur lors de l\'envoi de la newsletter : ' . $mail->ErrorInfo;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Newsletter</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .back-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="my-4">Créer une newsletter</h1>
    <form method="post">
        <div class="form-group">
            <label for="subject">Sujet</label>
            <input type="text" class="form-control" id="subject" name="subject" required>
        </div>
        <div class="form-group">
            <label for="body">Contenu</label>
            <textarea class="form-control" id="body" name="body" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="time">Heure</label>
            <input type="time" class="form-control" id="time" name="time" required>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
    <a href="#" class="btn btn-primary back-button">Retour</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        document.querySelector('.back-button').addEventListener('click', function() {
            history.back();
        });
    </script>
</div>
</body>
</html>
