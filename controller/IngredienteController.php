<?php
class IngredienteController {
    private $ingredienteModel;

    public function __construct() {
        // Instanciar el modelo de ingredientes
        $this->ingredienteModel = new IngredienteModel();
    }

    public function getAllIngredientes() {
        $ingredientes = $this->ingredienteModel->getAllIngredientes();
        // Lógica adicional si es necesario
        return $ingredientes;
    }

    public function getIngredienteById($id) {
        $ingrediente = $this->ingredienteModel->getIngredienteById($id);
        // Lógica adicional si es necesario
        return $ingrediente;
    }
}