<?php
require_once('class_pdo.php');
require_once('classe_contact.php'); // Inclure la classe Contact

// Créer une instance PDO pour la connexion à la base de données
$pdo = donnees_pdo::createPDO();

// Vérifier si la connexion à la base de données s'est faite avec succès

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="all" type="text/css" href="index.css">
    <title>Gestion des contacts</title>
    <!-- Ajoutez vos styles CSS ici -->
    <style>
        /* Ajoutez vos styles personnalisés ici */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<?php require_once('header.php'); ?>
    
    <h1>Gestion des contacts</h1>

    <!-- Affichage des demandes de contact dans un tableau -->
    <table>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Entreprise</th>
        </tr>
        <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?= $contact->nom ?></td>
                <td><?= $contact->prenom ?></td>
                <td><?= $contact->email ?></td>
                <td><?= $contact->tel ?></td>
                <td><?= $contact->entreprise ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <footer>
        <!-- Ajoutez votre pied de page ici -->
    </footer>
</body>
</html>
