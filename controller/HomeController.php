<?php
class HomeController {
    public function index() {
        // Lógica para mostrar la página de inicio
        // Por ejemplo, obtén datos relevantes y pásalos a la vista
        $data = [
            'title' => 'Página de inicio',
            'message' => '¡Bienvenido a nuestra aplicación!'
        ];
        
        // Incluye la vista correspondiente y pasa los datos
        require_once 'view/home/index.php';
    }
}
