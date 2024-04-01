<?php
require_once('class_pdo.php');

// Créer une instance PDO pour la connexion à la base de données
$pdo = donnees_pdo::createPDO();

// Vérifier si la connexion à la base de données s'est faite avec succès
if (!$pdo) {
    exit("Erreur de connexion à la base de données");
}

class Contact {
    public $id_contact;
    public $nom;
    public $prenom;
    public $email;
    public $tel;
    public $entreprise;

    // Méthode statique pour récupérer toutes les demandes de contact
    public static function getAll($pdo) {
        try {
            // Préparer la requête SQL pour récupérer toutes les demandes de contact
            $query = "SELECT * FROM contact";
            $statement = $pdo->prepare($query);
            $statement->execute();

            // Récupérer les résultats sous forme d'objets Contact
            $contacts = [];
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $contact = new Contact();
                $contact->id_contact = $row['id_contact'] ?? null;
                $contact->nom = $row['nom'] ?? null;
                $contact->prenom = $row['prenom'] ?? null;
                $contact->email = $row['email'] ?? null;
                $contact->tel = $row['tel'] ?? null;
                $contact->entreprise = $row['entreprise'] ?? null;
                $contacts[] = $contact;
            }

            return $contacts;
        } catch (PDOException $e) {
            exit("Erreur lors de l'exécution de la requête SQL: " . $e->getMessage());
        }
    }
}

// Récupérer toutes les demandes de contact depuis la base de données
$contacts = Contact::getAll($pdo);
?>
