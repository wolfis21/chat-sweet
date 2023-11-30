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

/*             $query = "SELECT receta, preparacion
                    FROM postres p
                    JOIN ingredientes_has_postres ihp ON p.id = ihp.postres_id
                    JOIN ingredientes i ON ihp.ingredientes_id = i.id
                    WHERE i.name IN ('" . implode("','", $ingredientes) . "')
                    GROUP BY p.id
                    HAVING COUNT(DISTINCT i.name) = " . count($ingredientes);
 */
            /* global $CONECTION;  */
/*             $result = mysqli_query($pdo, $query);

            // Formatear la respuesta
            $response = json_encode($result); */

            // Devolver la respuesta a la vista

            $result = $this->model_i->buscarte($ingredientes);
            $response = json_encode($result);
            echo $response;
        }
    }
}