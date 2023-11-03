<?php
class IngredientePostreModel {
    private $db;

    public function __construct() {
        // Conexión a la base de datos
        $this->db = new PDO('mysql:host=host_name;dbname=database_name', 'username', 'password');
    }

    public function getIngredientesByPostreId($postreId) {
        // Consulta para obtener los ingredientes de un postre por su ID
        $query = $this->db->prepare("SELECT ingredientes.* FROM ingredientes_has_postres
            JOIN ingredientes ON ingredientes_has_postres.ingredientes_id = ingredientes.id
            WHERE ingredientes_has_postres.postres_id = :postreId");
        $query->bindParam(":postreId", $postreId);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getPostresByIngredienteId($ingredienteId) {
        // Consulta para obtener los postres de un ingrediente por su ID
        $query = $this->db->prepare("SELECT postres.* FROM ingredientes_has_postres
            JOIN postres ON ingredientes_has_postres.postres_id = postres.id
            WHERE ingredientes_has_postres.ingredientes_id = :ingredienteId");
        $query->bindParam(":ingredienteId", $ingredienteId);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
