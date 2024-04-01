<?php
        require_once('class_pdo.php');
        $pdo = donnees_pdo::createPDO();

        class Actualite{

            public $titre;
            public $corps;
            public $date_publication;
            public $date_revision;
            public $auteur;
            public $tags;
            public $sources;
            public $id;
            public $image_url;
            
            public function __construct(array $values) {

                $this->titre = $values['titre'];
                $this->corps = $values['corps'];
                // $this->date_publication = $values['date_publiaction'];
                $this->date_revision = $values['date_revision'];
                $this->auteur = $values['auteur'];
                $this->tags = $values['tags'];
                $this->sources = $values['sources'];
                $this->id = $values['id'];
                // $this->image_url = $values['image_url'];
                
            }

            public function titre() :string
            {
                return $this->titre;
            }

            public function corps() :string
            {
                return $this->corps;
            }

            // public function date_publication() :string
            // {
            //     return $this->date_publication;
            // }

            public function date_revision() :string
            {
                return $this->date_revision;
            }

            public function auteur() :string
            {
                return $this->auteur;
            }
            public function tags() :string
            {
                return $this->tags;
            }

            public function sources() :string
            {
                return $this->sources;
            }

            public function id() :string
            {
                return $this->id;
            }

            // public function image_url() :string
            // {
            //     return $this->image_url;
            // }

            public static function getAll($pdo){
                $result=[];
                
                $requete = "SELECT * FROM id_actualités ORDER BY date_publication DESC LIMIT 5";
                $temp = $pdo->prepare($requete);
                $temp->execute();

                while($garen = $temp->fetch()){
                    array_push($result, new Actualite($garen));
            }
                return $result;
            }
            
            
        

            public static function getArticle($id,$pdo){
                $actualites=[];
                $sql='SELECT * FROM id_actualités WHERE id='.$id.'';
                $temp=donnees_pdo::Afficher($sql);
                while($resultats = $temp->fetch(PDO::FETCH_ASSOC)){
                    array_push($actualites,new Actualite($resultats));
                }
                return $actualites[0];
            }
        


            public static function ajouterArticle($titre, $corps, $auteur, $date_publication, $date_revision, $tags, $sources, $pdo){
                $sql = "INSERT INTO id_actualités (titre, corps, auteur, date_publication, date_revision, tags, sources) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$titre, $corps, $auteur, $date_publication, $date_revision, $tags, $sources]);
            }
            
            // public static function supprimerArticle($id, $pdo){
            //     $sql = "DELETE FROM id_actualités WHERE id=?";
            //     $stmt = $pdo->prepare($sql);
            //     $stmt->execute([$id]);
            // }
            
            public static function modifierArticle($id, $titre, $corps, $auteur, $date_publication, $date_revision, $tags, $sources, $pdo){
                $sql = "UPDATE id_actualités SET titre=?, corps=?, auteur=?, date_publication=?, date_revision=?, tags=?, sources=? WHERE id=?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$titre, $corps, $auteur, $date_publication, $date_revision, $tags, $sources, $id]);

            }

            public static function supprimerArticle($id, $pdo) {
                try {
                    // Préparation de la requête SQL de suppression
                    $requete = "DELETE FROM id_actualités WHERE id = :id";
                    $statement = $pdo->prepare($requete);
        
                    // Liaison du paramètre ID
                    $statement->bindParam(':id', $id, PDO::PARAM_INT);
        
                    // Exécution de la requête
                    $resultat = $statement->execute();
        
                    if ($resultat) {
                        // Afficher un message de réussite
                        echo "L'article a été supprimé avec succès.";
                        return true; // La suppression a réussi
                    } else {
                        // Afficher un message d'échec
                        echo "La suppression de l'article a échoué.";
                        return false; // La suppression a échoué
                    }
                } catch (PDOException $e) {
                    // Gestion des erreurs
                    echo "Erreur lors de la suppression de l'article : " . $e->getMessage();
                    return false; // La suppression a échoué
                }
            }
        }
        ?>
