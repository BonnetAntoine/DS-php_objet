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
<?php require_once('header.php'); ?>
    <div>
        <?php
               require_once('classe.php');
               require_once('class_pdo.php');
       
               // Créer une instance de connexion PDO
               $pdo = donnees_pdo::createPDO();
       
               // Récupérer les 5 derniers articles
               $articles = Actualite::getAll($pdo);
       
               // Afficher chaque article
               foreach ($articles as $article) {
                   echo "<div class='paragraphe' style='color: #ffea98;'>";
                   echo "<strong>Titre:</strong> {$article->titre()}<br>";
                   echo "<strong>Corps:</strong> " . substr($article->corps(), 0, 100) . "... <br>";
                   echo "<a href='article1.php?id={$article->id()}'>Lire la suite</a><br>";
                   echo "<strong>Date de Révision:</strong> {$article->date_revision()}<br>";
                   echo "<strong>Auteur:</strong> {$article->auteur()}<br>";
                   echo "<strong>Tags:</strong> {$article->tags()}<br>";
                   echo "<p><strong>Sources:</strong> {$article->sources()}</p>";
                   echo "</div>";
               }
        ?>
    </div>

    <footer>
        <div class="footer-droite">
            <p><a href="contact.php">Contact</a></p> 
        </div>
        
        <div class="footer-gauche">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83998.96777912509!2d2.2646344984437397!3d48.858825492072896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1709133114404!5m2!1sfr!2sfr" width="600" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </footer>
</body>
</html>
