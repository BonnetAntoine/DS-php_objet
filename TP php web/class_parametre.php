<?php
require_once('classe.php');
require_once('class_pdo.php');

$pdo = donnees_pdo::createPDO();

if(isset($_POST['ajouter'])) {
    // Récupérer les données du formulaire
    $titre = $_POST['titre'];
    $corps = $_POST['corps_article'];
    $auteur = $_POST['auteur'];
    $date_publication = $_POST['date_publication'];
    $date_revision = $_POST['date_revision'];
    $tags = $_POST['tags'];
    $source = $_POST['source'];

    // Appeler la méthode d'ajout d'article de la classe Actualite
    Actualite::ajouterArticle($titre, $corps, $auteur, $date_publication, $date_revision, $tags, $source, $pdo);
}

if(isset($_POST['supprimer'])) {
    // Récupérer l'ID de l'article à supprimer
    $id = $_POST['id_article'];

    // Appeler la méthode de suppression d'article de la classe Actualite
    Actualite::supprimerArticle($id, $pdo);
}

if(isset($_POST['modifier'])) {
    // Récupérer les données du formulaire
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $corps = $_POST['corps_article'];
    $auteur = $_POST['auteur'];
    $date_publication = $_POST['date_publication'];
    $date_revision = $_POST['date_revision'];
    $tags = $_POST['tags'];
    $sources = $_POST['sources'];

    // Appeler la méthode de modification d'article de la classe Actualite
    Actualite::modifierArticle($id, $titre, $corps, $auteur, $date_publication, $date_revision, $tags, $sources, $pdo);
}
?>
