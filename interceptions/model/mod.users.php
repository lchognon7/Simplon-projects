<?php

  class UsersClass {

    // autoload
    function __construct($pdo) {
      $this->pdo = $pdo;
    }

    // create (new user)
    public function create($userEmail, $userPassword, $userEnabled) {
      try {
        $req = "INSERT INTO `users` (`user_email`, `user_password`, `user_enabled`)
                VALUES (:user_email, :user_password, :user_enabled);";
        $prep = $this->pdo->prepare($req);
        $prep->execute([
          ":user_email"    => $userEmail,
          ":user_password" => $userPassword,
          ":user_enabled"  => $userEnabled
        ]);
        return $prep->rowCount(); // return affected rows
      } catch (PDOException $e) {
        $this->pdo = NULL; // bye db
        exit("OOPS - DB error : " . $e->getMessage());
      }
    }

    // read (all users)
    public function readall() {
      try {
        $req = "SELECT * FROM `users`";
        $prep = $this->pdo->prepare($req);
        $prep->execute();
        return $prep->fetchAll();
      } catch (PDOException $e) {
        $this->pdo = NULL; // bye db
        exit("OOPS - DB error : " . $e->getMessage());
      }
    }

    // read (one user)
    public function read($userId) {
      try {
        $req = "SELECT * FROM `users`
                WHERE `user_id` = :user_id";
        $prep = $this->pdo->prepare($req);
        $prep->execute([
          ":user_id" => $userId
        ]);
        return $prep->fetch();
      } catch (PDOException $e) {
        $this->pdo = NULL; // bye db
        exit("OOPS - DB error : " . $e->getMessage());
      }
    }

    // update (one user)
    public function update($userId, $userEmail, $userPassword, $userEnabled) {
      try {
        $req = "UPDATE `users` SET
                `user_email` = :user_email,
                `user_password` = :user_password,
                `user_enabled` = :user_enabled
                WHERE `user_id` = :user_id;";
        $prep = $this->pdo->prepare($req);
        $prep->execute([
          ":user_email"    => $userEmail,
          ":user_password" => $userPassword,
          ":user_enabled"  => $userEnabled,
          ":user_id"       => $userId,
        ]);
        return $prep->rowCount(); // return affected rows
      } catch (PDOException $e) {
        $this->pdo = NULL; // bye db
        exit("OOPS - DB error : " . $e->getMessage());
      }
    }

    // remove user from to the DB
    public function delete($userId) {
      try {
        $req = "DELETE FROM `users`
                WHERE `user_id` = :user_id;";
        $prep = $this->pdo->prepare($req);
        $prep->execute([
          ":user_id"=> $userId,
        ]);
        return $prep->rowCount(); // return affected rows
      } catch (PDOException $e) {
        $this->pdo = NULL; // bye db
        exit("OOPS - DB error : " . $e->getMessage());
      }
      
    }

  }