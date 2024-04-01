<?php
    class donnees_pdo{

        public static function createPDO(){
                
            $host = '127.0.0.1';
            $db = 'actualités';
            $user = 'root';
            $pass = '';
            $port = 3306;
            $charset = 'utf8mb4';
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
            $pdo = new PDO($dsn, $user, $pass);
            return $pdo;
        }

        public static function Afficher($sql){
            $pdo=donnees_pdo::createPDO();
            $temp = $pdo->prepare($sql);
            $temp->execute();
            return $temp;

        }

        public static function Ajouter($sql){
            $pdo = donnees_pdo::createPDO();
            $temp=exec($sql);
            return $temp;
        }
    }



?>