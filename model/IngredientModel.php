<?php
class IngredienteModel {
    private $db;

    public function __construct() {
        // Conexión a la base de datos
        $this->db = new PDO('mysql:host=host_name;dbname=database_name', 'username', 'password');
    }

    public function getAllIngredientes() {
        // Consulta para obtener todos los ingredientes
        $query = $this->db->prepare("SELECT * FROM ingredientes");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getIngredienteById($id) {
        // Consulta para obtener un ingrediente por su ID
        $query = $this->db->prepare("SELECT * FROM ingredientes WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    } //se hace algo parecido para buscar por name
}
