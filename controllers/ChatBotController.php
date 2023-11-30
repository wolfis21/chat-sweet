<?php
/* require_once "config/conection.php"; */
require_once "models/Chatbot.php";

class ChatBotController{

    private $model_i;

    public function __CONSTRUCT(){
        $this->model_i = new Chatbot();
    }

    public function searchData(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener la frase del cuerpo de la solicitud POST
            $input = $_POST['text'];

            $inicio_parentesis = strpos($input, '(');
            $fin_parentesis = strpos($input, ')');
            $ingredientes_frase = substr($input, $inicio_parentesis + 1, $fin_parentesis - $inicio_parentesis - 1);
            $ingredientes = explode(',', $ingredientes_frase);

            // Devolver la respuesta a la vista

            /* var_dump($ingredientes); */

            $result = $this->model_i->buscarte($ingredientes);

            /* var_dump($result); */

            $response = json_encode($result);
            echo $response;
        }
    }
}