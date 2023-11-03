<?php

class UserModel {
    private $db;

    public function __construct() {
        // Conexión a la base de datos
       // $this->db = new PDO('mysql:host=host_name;dbname=database_name', 'username', 'password');
    }

    public function getAllUsers() {
        // Consulta para obtener todos los usuarios
        $query = $this->db->prepare("SELECT * FROM users");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getUserById($id) {
        // Consulta para obtener un usuario por su ID
        $query = $this->db->prepare("SELECT * FROM users WHERE id_user = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function createUser($name, $password, $role_id) {
        // Consulta para crear un nuevo usuario
        $query = $this->db->prepare("INSERT INTO users (name_user, password, role_id) VALUES (:name, :password, :role_id)");
        $query->bindParam(":name", $name);
        $query->bindParam(":password", $password);
        $query->bindParam(":role_id", $role_id);
        $query->execute();
        $insertId = $this->db->lastInsertId();
        return $insertId;
    }

    public function updateUser($id, $name, $password, $role_id) {
        // Consulta para actualizar un usuario existente
        $query = $this->db->prepare("UPDATE users SET name_user = :name, password = :password, role_id = :role_id WHERE id_user = :id");
        $query->bindParam(":name", $name);
        $query->bindParam(":password", $password);
        $query->bindParam(":role_id", $role_id);
        $query->bindParam(":id", $id);
        $query->execute();
        $rowCount = $query->rowCount();
        return $rowCount;
    }

    public function deleteUser($id) {
        // Consulta para eliminar un usuario por su ID
        $query = $this->db->prepare("DELETE FROM users WHERE id_user = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        $rowCount = $query->rowCount();
        return $rowCount;
    }
}
