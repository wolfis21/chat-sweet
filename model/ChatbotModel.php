<?php
class ChatbotModel {
    private $db;

    public function __construct() {
        // Conexión a la base de datos
        //$this->db = new PDO('mysql:host=host_name;dbname=database_name', 'username', 'password');
    }

    public function getAllQueries() {
        // Consulta para obtener todas las consultas del chatbot
        $query = $this->db->prepare("SELECT * FROM chatbot");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getQueryById($id) {
        // Consulta para obtener una consulta del chatbot por su ID
        $query = $this->db->prepare("SELECT * FROM chatbot WHERE id_queries = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function createQuery($query, $reply) {
        // Consulta para crear una nueva consulta del chatbot
        $query = $this->db->prepare("INSERT INTO chatbot (`queries`, `replies`) VALUES (:query, :reply)");
        $query->bindParam(":query", $query);
        $query->bindParam(":reply", $reply);
        $query->execute();
        $insertId = $this->db->lastInsertId();
        return $insertId;
    }

    public function updateQuery($id, $query, $reply) {
        // Consulta para actualizar una consulta del chatbot existente
        $query = $this->db->prepare("UPDATE chatbot SET `queries` = :query, `replies` = :reply WHERE `id_queries` = :id");
        $query->bindParam(":query", $query);
        $query->bindParam(":reply", $reply);
        $query->bindParam(":id", $id);
        $query->execute();
        $rowCount = $query->rowCount();
        return $rowCount;
    }

    public function deleteQuery($id) {
        // Consulta para eliminar una consulta del chatbot por su ID
        $query = $this->db->prepare("DELETE FROM chatbot WHERE `id_queries` = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        $rowCount = $query->rowCount();
        return $rowCount;
    }
}
