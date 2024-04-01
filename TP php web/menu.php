<?php
require_once('classe.php');
require_once('class_pdo.php');
$pdo = donnees_pdo::createPDO();
$articles = Actualite::getAll($pdo);

// Récupérer les éléments de la barre de navigation correspondant au champ "Actualités"
// Exécuter la requête SQL
$result = Actualite::getAll($pdo);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="all" type="text/css" href="index.css">
    <title>Gestion de la barre de navigation - Actualités</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

<?php require_once('header.php'); ?>

<h2>Gestion de la barre de navigation - Actualités</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>Auteur</th>
    </tr>
    <?php
    // Afficher les éléments dans un tableau
    if ($result) {
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row->id() . "</td>";
            echo "<td>" . $row->titre() . "</td>";
            echo "<td>" . $row->auteur() . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Aucun élément trouvé</td></tr>";
    }
    ?>

</table>


</body>
</html>
