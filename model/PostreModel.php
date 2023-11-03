<?php
class PostreModel {
    private $db;

    public function __construct() {
        // Conexión a la base de datos
        $this->db = new PDO('mysql:host=host_name;dbname=database_name', 'username', 'password');
    }

    public function getAllPostres() {
        // Consulta para obtener todos los postres
        $query = $this->db->prepare("SELECT * FROM postres");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getPostreById($id) {
        // Consulta para obtener un postre por su ID
        $query = $this->db->prepare("SELECT * FROM postres WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}