<?php
$host = '193.70.40.248';
$dbname = 'LeFive';
$user = 'user';
$password = '95C9TvYmkpn98D';
$backupFile = 'backup.sql';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cmd = "/usr/bin/mysqldump -h $host -u $user -p$password $dbname > $backupFile";
    exec($cmd, $output, $return_var);

    if ($return_var !== 0) {
        echo "Erreur lors de l'exécution de mysqldump. Code de retour : $return_var";
        echo "Output : ";
        print_r($output);
    } else {
        if (file_exists($backupFile)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($backupFile).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($backupFile));
            flush(); // Flush system output buffer
            readfile($backupFile);
            exit;
        } else {
            echo "Erreur : Le fichier de sauvegarde n'a pas été créé.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Sauvegarde de la base de données</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        /* Ajouter du CSS personnalisé */
        .back-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="my-4">Sauvegarde de la base de données</h1>
    <form action="" method="post">
        <button type="submit" name="sauvegarder" class="btn btn-primary">Télécharger la base de données</button>
    </form>
    <!-- Bouton de retour en bas à droite -->
    <a href="#" class="btn btn-primary back-button">Retour</a>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
