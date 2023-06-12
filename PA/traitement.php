<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config.php';
require './site/PHPMailer-master/src/PHPMailer.php';
require './site/PHPMailer-master/src/SMTP.php';
require './site/PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['code']) && isset($_SESSION['code'])) {
        // Vérification du code
        if ($_POST['code'] == $_SESSION['code'] && isset($_SESSION['data'])) {
            // Le code est correct, enregistrement des informations de l'utilisateur
            $lastname = $_SESSION['data']['lastname'];
            $firstname = $_SESSION['data']['firstname'];
            $email = $_SESSION['data']['email'];
            $password = $_SESSION['data']['password'];
            $gender = $_SESSION['data']['gender'];
            $birthday = $_SESSION['data']['birthday'];

            // Hasher le mot de passe
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Préparer la requête SQL d'insertion
            $sql = "INSERT INTO utilisateur (lastname, firstname, email, pwd, gender, birthday, isActive) VALUES (?, ?, ?, ?, ?, ?, 1)";

            // Exécuter la requête préparée
            $stmt = $pdo->prepare($sql);

            // Vérifier si la date de naissance est définie
            if (!empty($birthday)) {
                $stmt->execute([$lastname, $firstname, $email, $hashed_password, $gender, $birthday]);
            } else {
                // Utiliser une valeur par défaut ou laisser la colonne vide selon vos besoins
                $stmt->execute([$lastname, $firstname, $email, $hashed_password, $gender, null]);
            }

            // Rediriger vers une page de succès ou afficher un message de succès
            header('Location: connexion.php');
            exit;
        } else {
            echo "Le code de vérification ne correspond pas.";
        }
    } else {
        // Envoi du code de vérification
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $gender = $_POST['gender'];
        $birthday = $_POST['birthday'];

        if ($password !== $confirmPassword) {
            echo 'Les mots de passe ne correspondent pas';
            exit;
        }

        $_SESSION['data'] = [
            'lastname' => $lastname,
            'firstname' => $firstname,
            'email' => $email,
            'password' => $password,
            'gender' => $gender,
            'birthday' => $birthday
        ];

        // Générer un code de vérification
        $code = rand(100000, 999999);

        // Envoyer le code par email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'pagrp1.2022@gmail.com';
        $mail->Password = 'vjzininlbvdejbsc';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('pagrp1.2022@gmail.com', 'Votre site');
        $mail->addAddress($email);
        $mail->Subject = 'Code de vérification';
        $mail->Body    = "Votre code de vérification est $code";

        if(!$mail->send()) {
            echo 'Le message n\'a pas pu être envoyé. Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Le code de vérification a été envoyé à votre adresse email.';
            $_SESSION['code'] = $code;
            header('Location: inscription.php#step-3');
            exit;
        }
    }
}
?>
