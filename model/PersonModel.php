<?php

class PersonModel {
    private $db;

    public function __construct() {
        // Conexión a la base de datos
        //$this->db = new PDO('mysql:host=host_name;dbname=database_name', 'username', 'password');
    }

    public function getPersonById($id) {
        // Consulta para obtener una persona por su ID
        $query = $this->db->prepare("SELECT * FROM person WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function createPerson($user_id, $name, $last_name, $email) {
        // Consulta para crear una nueva persona
        $query = $this->db->prepare("INSERT INTO person (`id_user_id`, `name`, `last_name`, `email`) VALUES (:user_id, :name, :last_name, :email)");
        $query->bindParam(":user_id", $user_id);
        $query->bindParam(":name", $name);
        $query->bindParam(":last_name", $last_name);
        $query->bindParam(":email", $email);
        $query->execute();
        $insertId = $this->db->lastInsertId();
        return $insertId;
    }

    public function updatePerson($id, $user_id, $name, $last_name, $email) {
        // Consulta para actualizar una persona existente
        $query = $this->db->prepare("UPDATE person SET `id_user_id` = :user_id, `name` = :name, `last_name` = :last_name, `email` = :email WHERE `id` = :id");
        $query->bindParam(":user_id", $user_id);
        $query->bindParam(":name", $name);
        $query->bindParam(":last_name", $last_name);
        $query->bindParam(":email", $email);
        $query->bindParam(":id", $id);
        $query->execute();
        $rowCount = $query->rowCount();
        return $rowCount;
    }

    public function deletePerson($id) {
        // Consulta para eliminar una persona por su ID
        $query = $this->db->prepare("DELETE FROM person WHERE `id` = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        $rowCount = $query->rowCount();
        return $rowCount;
    }
}
