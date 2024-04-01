<?php
require_once('class_pdo.php');
require_once('classe.php');

// Vérifie si l'ID de l'article à supprimer est présent dans la requête POST
if(isset($_POST['id_article'])) {
    try {
        // Création de la connexion PDO
        $pdo = donnees_pdo::createPDO(); 

        // Validation de l'ID de l'article
        $id_article = intval($_POST['id_article']);

        // Suppression de l'article avec l'ID spécifié
        $article = Actualite::supprimerArticle($id_article, $pdo);

        // Vérification si l'article a été supprimé avec succès
        if ($article) {
            // Redirection vers la page de suppression après la suppression
            $redirect_url = "parametre.php";
            header("Location: $redirect_url");
            exit(); // Assurez-vous de terminer le script après la redirection
        } else {
            // Enregistrement du message d'erreur pour affichage ultérieur
            $error_message = "Aucun article n'a été supprimé.";
        }

    } catch (PDOException $e) {
        // Enregistrement du message d'erreur PDO pour affichage ultérieur
        $error_message = "Erreur PDO : " . $e->getMessage();
    } catch (Exception $e) {
        // Enregistrement du message d'erreur pour affichage ultérieur
        $error_message = "Erreur : " . $e->getMessage();
    }

    // Si une erreur est survenue, redirection vers une page d'erreur
    if (isset($error_message)) {
        $error_url = "error.php?message=" . urlencode($error_message);
        header("Location: $error_url");
        exit();
    }
} else {
    // Redirection vers une page d'erreur ou une autre page appropriée si l'ID de l'article n'est pas présent
    $error_url = "error.php?message=" . urlencode("L'ID de l'article n'est pas spécifié.");
    header("Location: $error_url");
    exit();
}
?>
