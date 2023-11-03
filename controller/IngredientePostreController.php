<?php
class IngredientePostreController {
    private $ingredientePostreModel;

    public function __construct() {
        // Instanciar el modelo de la tabla pivote
        $this->ingredientePostreModel = new IngredientePostreModel();
    }

    public function getIngredientesByPostreId($postreId) {
        $ingredientes = $this->ingredientePostreModel->getIngredientesByPostreId($postreId);
        // Lógica adicional si es necesario
        return $ingredientes;
    }

    public function getPostresByIngredienteId($ingredienteId) {
        $postres = $this->ingredientePostreModel->getPostresByIngredienteId($ingredienteId);
        // Lógica adicional si es necesario
        return $postres;
    }
}