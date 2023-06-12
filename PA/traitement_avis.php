<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once './config.php';

// Récupération des données du formulaire
$nom = $_POST['nom'];
$avis = $_POST['avis'];
$note = $_POST['note'];

$now = new DateTime();
$oneHourAgo = $now->sub(new DateInterval('PT1H'));

$query = $pdo->prepare("SELECT COUNT(*) FROM avis WHERE nom = :nom AND date_avis >= :oneHourAgo");
$query->execute([
    'nom' => $nom,
    'oneHourAgo' => $oneHourAgo->format('Y-m-d H:i:s')
]);

$count = $query->fetchColumn();

if ($count >= 5) {
    echo "Vous avez atteint la limite de 5 commentaires par heure.";
} else {
    // Préparation de la requête SQL
    $query = $pdo->prepare("INSERT INTO avis (nom, avis, note, date_avis) VALUES (:nom, :avis, :note, :date_avis)");

    // Exécution de la requête SQL
    $result = $query->execute([
        'nom' => $nom,
        'avis' => $avis,
        'note' => $note,
        'date_avis' => $now->format('Y-m-d H:i:s')
    ]);

    // Redirection vers la page d'accueil si l'avis a bien été enregistré
    if($result){
        header('Location: index.php');
    } else {
        echo "Il y a eu une erreur lors de l'enregistrement de votre avis.";
    }
}
