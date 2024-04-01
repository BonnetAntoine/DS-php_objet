<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="all" type="text/css" href="index.css">
    <title>Ajouter un article</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=EB+Garamond:ital@1&display=swap');
    </style>
</head>
<body>
<?php require_once('header.php'); ?>

<!-- Formulaire pour ajouter un article -->
<form id="ajoutArticleForm" action="parametre.php" method="post" onsubmit="return showMessage()">
    <label for="titre">Titre :</label>
    <input type="text" id="titre" name="titre" required><br><br>
    
    <label for="corps_article">Corps de l'article :</label><br>
    <textarea id="corps_article" name="corps_article" rows="4" cols="50" required></textarea><br><br>

    <label for="auteur">Auteur :</label>
    <input type="text" id="auteur" name="auteur" required><br><br>

    <label for="date_publication">Date de publication :</label>
    <input type="text" id="date_publication" name="date_publication" required><br><br>

    <label for="date_revision">Date de révision :</label>
    <input type="text" id="date_revision" name="date_revision" required><br><br>

    <label for="tags">Tags :</label>
    <input type="text" id="tags" name="tags"><br><br>

    <label for="source">Source :</label>
    <input type="text" id="source" name="source"><br><br>

    <!-- Bouton Retour -->
    <button type="button" onclick="confirmReturn()">Retour</button>    

    <!-- Bouton Ajouter -->
    <button name="ajouter" type="submit">Ajouter</button>
</form>

<!-- Script JavaScript pour afficher le message de confirmation -->
<script>
    function showMessage() {
        alert("L'article a été ajouté avec succès.");
        return true; // Autoriser la soumission du formulaire
    }

    function confirmReturn() {
        if (confirm("Êtes-vous sûr de vouloir annuler l'ajout de l'article ?")) {
            window.location.href = "parametre.php";
        }
    }
</script>

</body>
</html>
