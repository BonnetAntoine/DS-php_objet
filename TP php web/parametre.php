<?php
require_once('classe.php');
require_once('class_pdo.php');
require_once('class_parametre.php');
$pdo = donnees_pdo::createPDO();
$actualite = Actualite::getAll($pdo);

// Déclaration d'une variable de redirection par défaut
$redirect_url = "index.php";

// Traitement de l'action du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['ajouter'])) {
        // Traitement pour l'ajout
        // (Vous devez implémenter le code approprié pour ajouter l'article)

    } elseif (isset($_POST['supprimer'])) {
        // Traitement pour la suppression
        // (Vous devez implémenter le code approprié pour supprimer l'article)

        // Redirection vers la page d'accueil après la suppression
        header("Location: index.php");
        exit(); // Assurez-vous de terminer le script après la redirection

    } elseif (isset($_POST['modifier'])) {
        // Traitement pour la modification
        // Récupération des données du formulaire
        $id_article = $_POST['id'];
        $titre = $_POST['titre'];
        $corps_article = $_POST['corps_article'];
        $auteur = $_POST['auteur'];
        $date_publication = $_POST['date_publication'];
        $date_revision = $_POST['date_revision'];
        $tags = $_POST['tags'];
        $sources = $_POST['sources'];
        
        // Mettre à jour l'article dans la base de données
        Actualite::modifierArticle($id_article, $titre, $corps_article, $auteur, $date_publication, $date_revision, $tags, $sources, $pdo);

        // Redirection vers la page d'accueil après la modification
        header("Location: index.php");
        exit(); // Assurez-vous de terminer le script après la redirection
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="all" type="text/css" href="index.css">
    <title>MENU</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=EB+Garamond:ital@1&display=swap');
    </style>
</head>
<body>
<?php require_once('header.php'); ?>
    <a href="ajout_article.php"><button>Ajouter un article</button></a>
    <a href="suppression_article.php"><button>Supprimer un article</button></a>
    <a href="gestion_contact.php"><button>Gestion de contact</button></a>
    <form method="get">
        <select name="id_article" onchange="this.form.submit()">
            <?php
                    echo '<option value="">Sélectionner votre article</option>';
                    foreach($actualite as $article){
                        echo '<option  value="'.$article->id.'">'.$article->titre.'</option>';
                    }
            ?>
        </select>
    </form>
    <?php
    if (isset($_GET['id_article'])){
        $actualite = Actualite::getArticle($_GET['id_article'],$pdo);
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="hidden" name="id" value="<?= $actualite->id ?>">
            <label>Titre : </label>
            <input name="titre" type="text" size="164%" value="<?= $actualite->titre ?>">
            <label>Corps de l'article : </label>
            <input name="corps_article" type="text" size="153%" value="<?= $actualite->corps ?>">
            <label>Auteur : </label>
            <input name="auteur" type="text" size="164%" value="<?= $actualite->auteur ?>">
            <label>Date de publication : </label>
            <input name="date_publication" type="text" size="153%" value="<?= $actualite->date_publication ?>">
            <label>Date de révision : </label>
            <input name="date_revision" type="text" size="155%" value="<?= $actualite->date_revision ?>">
            <label>Tags : </label>
            <input name="tags" type="text" size="160%" value="<?= $actualite->tags ?>">
            <label>Sources : </label>
            <input name="sources" type="text" size="155%" value="<?= $actualite->sources ?>">
            
            <!-- Bouton Modifier -->
            <button name="modifier" type="submit" onclick="return showMessage()">Modifier</button>
        </form>
    <?php } ?>
</body>
</html>
