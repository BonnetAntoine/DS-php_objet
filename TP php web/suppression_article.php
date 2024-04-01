<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="all" type="text/css" href="index.css">
    <title>Supprimer un article</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=EB+Garamond:ital@1&display=swap');
    </style>
</head>
<body>
<header>
    <?php require_once('header.php'); ?>

    <!-- Affichage des articles et boutons de suppression -->
    <?php
    require_once('class_pdo.php');
    require_once('classe.php'); // J'ai supposé que le fichier contenant la classe Actualite s'appelle Actualite.php
    $pdo = donnees_pdo::createPDO(); // Utilisation de la classe ClassePDO pour créer la connexion PDO
    $articles = Actualite::getAll($pdo);
    ?>
    <?php foreach ($articles as $article) : ?>
        <div>
            <h2><?= $article->titre() ?></h2>
            <p><?= $article->corps() ?></p>
            <!-- Formulaire de confirmation de suppression -->
            <form action="suppression_article.php" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">
                <input type="hidden" name="id_article" value="<?= $article->id() ?>">
                <button type="submit" name="supprimer">Supprimer</button>
                <button type="button" onclick="confirmReturn()">Retour</button>
            </form>
        </div>
    <?php endforeach; ?>


    <script>
        function confirmReturn() {
            if (confirm("Êtes-vous sûr de vouloir annuler l'ajout de l'article ?")) {
                window.location.href = "parametre.php";
            }
        }
    </script>
</body>
</html>
