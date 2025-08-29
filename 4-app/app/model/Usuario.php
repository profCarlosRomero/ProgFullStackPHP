<?php

require_once '../app/model/Database.php';

class Usuario {
    private $pdo;
    
    public function getAllUsers() {
        $this->pdo = Database::getInstancia()->getConexion();

        $sentencia = "SELECT * FROM usuario";

        $resultado = $this->pdo->query($sentencia)->fetchAll(PDO::FETCH_ASSOC);

        return $resultado;
    }

    public function delete($ci): bool {
        // try {
            $this->pdo = Database::getInstancia()->getConexion();
        
            $sentencia = "DELETE FROM usuario WHERE ci = ?";
            
            return $this->pdo->prepare($sentencia)->execute([$ci]);
        // } catch (PDOException $e) {
        //     throw new PDOException($e->getMessage(), $e->getCode());
        // }
    }

    public function create ($ci, $nombre, $apellido, $username, $pass) {
        $this->pdo = Database::getInstancia()->getConexion();
        
        // $sentencia = "INSERT INTO usuario (ci, nombre, apellido, user_name, pass, puntaje) VALUES (?, ?, ?, ?, ?, 0)";
        $sentencia = "INSERT INTO usuario (ci, nombre, apellido, user_name, pass, puntaje) VALUES (:ci, :nombre, :apellido, :user_name, :pass, 0)";
        
        // return $this->pdo->prepare($sentencia)->execute([$ci, $nombre, $apellido, $username, $pass]);
        $st = $this->pdo->prepare($sentencia);
        $st->bindParam(':ci', $ci);
        $st->bindParam(':nombre', $nombre);
        $st->bindParam(':apellido', $apellido);
        $st->bindParam(':user_name', $username);
        $st->bindParam(':pass', $pass);
        
        // return $this->pdo->prepare($sentencia)->execute([$ci, $nombre, $apellido, $username, $pass]);
        return $st->execute();
    }

    public function update ($ci, $nombre, $apellido) {
        $this->pdo = Database::getInstancia()->getConexion();
        
        $sentencia = "UPDATE usuario SET nombre = ?, apellido = ? WHERE ci = ?";
        
        return $this->pdo->prepare($sentencia)->execute([$nombre, $apellido, $ci]);        
    }

    public function getUserByCI ($ci) {   
        
        $this->pdo = Database::getInstancia()->getConexion();

        $sentencia = "SELECT * FROM usuario WHERE ci = ?";
        $stmt = $this->pdo->prepare($sentencia);
        $stmt->execute([$ci]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}