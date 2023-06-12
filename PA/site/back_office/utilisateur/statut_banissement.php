<?php
session_start(); // Ajouter le lancement de la session

require_once '../../../config.php';

// Vérifier si l'utilisateur est connecté et est un administrateur
if (!isset($_SESSION['email']) || $_SESSION['statut_admin'] != 1) {
    header('Location: ./connexion_traitement.php');
    exit;
}
?>