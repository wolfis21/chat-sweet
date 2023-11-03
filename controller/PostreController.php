<?php
class PostreController {
    private $postreModel;

    public function __construct() {
        // Instanciar el modelo de postres
        $this->postreModel = new PostreModel();
    }

    public function getAllPostres() {
        $postres = $this->postreModel->getAllPostres();
        // Lógica adicional si es necesario
        return $postres;
    }

    public function getPostreById($id) {
        $postre = $this->postreModel->getPostreById($id);
        // Lógica adicional si es necesario
        return $postre;
    }
}