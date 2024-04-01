<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activ'Actu</title>
    <link rel="stylesheet" media="all" type="text/css" href="index.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=EB+Garamond:ital@1&display=swap');

        /* Style pour réduire la taille du menu déroulant */
        bouton {
            width: 5%;
            padding: 0%;
        }
    </style>
</head>
<body>
    <header>
        <div class="banderolle">
            <!-- Ajout du menu déroulant des 5 derniers titres d'articles -->
            <p class="bouton">
                <select onchange="if (this.value) window.location.href=this.value;">
                    <option value="">Derniers Articles</option>
                    <?php
                    // Inclure les fichiers PHP nécessaires
                    require_once('classe.php');
                    require_once('class_pdo.php');

                    // Créer une instance de connexion PDO
                    $pdo = donnees_pdo::createPDO();

                    // Récupérer les 5 derniers articles
                    $articles = Actualite::getAll($pdo);

                    // Afficher chaque titre d'article comme une option du menu déroulant
                    foreach ($articles as $article) {
                        echo "<option value='article1.php?id={$article->id()}'>{$article->titre()}</option>";
                    }
                    ?>
                </select>
            </p>
            <!-- Fin du menu déroulant -->

            <!-- Liens de navigation existants -->
            <p class="bouton"><a href="contact">Contact</a></p>
            <p class="bouton">Les actualités</p>
            <p class="bouton"><a href="index.php">Accueil</a></p>
            <p class="bouton"><a href="Menu">Menu</a></p>
            <p class="bouton"><a href="parametre">Parametre</a></p>
        </div>
    </header>
    <div class="logo">
        <div class="logo1">
            <h1>Activ'Actu</h1>
        </div>
        <div class="logo2">
            <img src="image/logo.png" alt="logo">
        </div>
    </div>