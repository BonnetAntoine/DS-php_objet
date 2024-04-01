<?php
require_once('classe.php');
require_once('class_pdo.php');
require_once('class_parametre.php');
$pdo = donnees_pdo::createPDO();
$actualite = Actualite::getAll($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = test_input($_POST["nom"]);
    $prenom = test_input($_POST["prenom"]);
    $email = test_input($_POST["email"]);
    $tel = test_input($_POST["N°tel"]); // Utiliser la même clé que dans le formulaire
    $entreprise = test_input($_POST["entreprise"]);

    // Insérer les données dans la base de données
    $stmt = $pdo->prepare("INSERT INTO contact (nom, prenom, email, tel, entreprise) VALUES (:nom, :prenom, :email, :tel, :entreprise)");
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':tel', $tel); // Utiliser la même clé que dans le formulaire
    $stmt->bindParam(':entreprise', $entreprise);

    // Exécuter la requête
    $stmt->execute();

    // Afficher un message de succès
    echo "<h2>Formulaire soumis avec succès !</h2>";
    echo "<p>Merci, vos informations ont été enregistrées.</p>";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Contact</title>
    
    <link rel="stylesheet" media="all" type="text/css" href="index.css">
    <style>
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>
</head>
<body>
<?php require_once('header.php'); ?>

    <div class="formulaire">
        <h2>Formulaire de Contact</h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>
            <br><br>
            
            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" required>
            <br><br>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br><br>

            <label for="tel">N°tel:</label>
            <input type="tel" id="N°tel" name="N°tel" required>
            <br><br>

            <label for="entreprise">Entreprise:</label>
            <input type="text" id="entreprise" name="entreprise" required>
            <br><br>
            
            <input type="submit" name="submit" value="Envoyer">
        </form>
    </div>
</body>
</html>
