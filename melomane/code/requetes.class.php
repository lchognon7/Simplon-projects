<?php

class Requete{

    // méthode pour lire les données d'une table de la BDD

    public function read($table){
        try{
            $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
            $requete = "SELECT * FROM `$table`";
            $prepare = $connexion->prepare($requete);
            $prepare->execute(array());
            return $resultat = $prepare->fetchAll();
        } catch (PDOException $e) {
            exit("🚫" . $e->getMessage());

        }
    }

    // méthode pour supprimer une entrée de la BDD
    public function delete($table, $colonne_id, $postValue){
        try{
            $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
            $requete = "DELETE FROM `$table`
                        WHERE ((`$colonne_id` = :id));";
            $prepare = $connexion->prepare($requete);
            $prepare->execute(array(
            "id" => $postValue,
            )); 
            $resultat = $prepare->rowCount();
            print_r([$requete, $resultat]);
    
        } catch (PDOException $e) {
            exit("🚫" . $e->getMessage());
    
        }
    }

    // méthode pour mettre à jour une entrée de la BDD

    public function update($table, $colonneBDD, $id, $posted_name, $posted_id){
        try{

            $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
            $requete = "UPDATE `$table`
                SET `$colonneBDD` = :new_name
                WHERE `$id` = :id";
            $prepare = $connexion->prepare($requete);
            $prepare->execute(array(
            ":new_name"   => $posted_name,
            ":id" => $posted_id
            ));
            $resultat = $prepare->rowCount();
            print_r([$requete, $resultat]);

        } catch (PDOException $e) {
            exit("🚫" . $e->getMessage());

        }
    }

    // méthode pour insérer des données dans la BDD

    public function insert($table, $colonneBDD, $postedValue){

        try{

            $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
            $requete = "INSERT INTO `$table` (`$colonneBDD`)
                        VALUES (:new_name);";
            $prepare = $connexion->prepare($requete);
            $prepare->execute(array(
            ":new_name" => $postedValue
            ));
            $resultat = $prepare->rowCount();
            print_r([$requete, $resultat]); 

        } catch (PDOException $e) {
            exit("🚫" . $e->getMessage());

        }
    }
}

?>