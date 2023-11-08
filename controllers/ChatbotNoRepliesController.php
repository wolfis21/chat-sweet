<?php
require_once "config/conection.php";
require_once "models/ChatbotNoReplies.php";

class ChatbotNoRepliesController{
    public function create($id, $queriesNoReplies, $fecha, $personId) {
        // Verificar que los campos requeridos no estén vacíos
        if (empty($id) || empty($personId)) {
            return "Error: Se deben proporcionar el ID y el ID de la persona.";
        }
    
        // Verificar si ya existe un registro con el mismo ID
        if ($this->getChatbotNoRepliesById($id)) {
            return "Error: Ya existe un registro con el mismo ID.";
        }
    
        // Verificar si el ID de la persona existe en la tabla "person"
        if (!$this->getPersonById($personId)) {
            return "Error: No se encontró una persona con el ID proporcionado.";
        }
    
        // Crear un nuevo objeto ChatbotNoReplies
        $chatbotNoReplies = new ChatbotNoReplies($id, $queriesNoReplies, $fecha, $personId);
    
        // Insertar el objeto ChatbotNoReplies en la base de datos
        $success = $this->insertChatbotNoReplies($chatbotNoReplies);
    
        // Verificar si la inserción fue exitosa
        if ($success) {
            return "Registro creado exitosamente.";
        } else {
            return "Error al crear el registro.";
        }
    }
    
    // Función para obtener un registro de chatbot_no_replies por su ID
    public function getChatbotNoRepliesById($id) {
        // Lógica para obtener el registro de chatbot_no_replies de la base de datos usando el $id proporcionado
        $query = "SELECT * FROM `chatbot_no_replies` WHERE `id` = '$id'";
    
        // Ejecutar la consulta y obtener el resultado
        global $CONECTION; // Agrega esta línea para acceder a la variable de conexión global
        $result = mysqli_query($CONECTION, $query);
    
        // Verificar si se encontró un registro válido
        if (mysqli_num_rows($result) > 0) {
            // Obtener los datos del registro y crear un objeto ChatbotNoReplies
            $row = mysqli_fetch_assoc($result);
            $chatbotNoReplies = new ChatbotNoReplies($row['id'], $row['queries_no_replies'], $row['fecha'], $row['person_id']);
            return $chatbotNoReplies;
        } else {
            return null;
        }
    }
    
    // Función para obtener una persona por su ID
    public function getPersonById($id) {
        // Lógica para obtener la persona de la base de datos usando el $id proporcionado
        $query = "SELECT * FROM `person` WHERE `id` = '$id'";
    
        // Ejecutar la consulta y obtener el resultado
        global $CONECTION; // Agrega esta línea para acceder a la variable de conexión global
        $result = mysqli_query($CONECTION, $query);
    
        // Verificar si se encontró un registro válido
        if (mysqli_num_rows($result) > 0) {
            // Obtener los datos del registro y crear un objeto Person
            $row = mysqli_fetch_assoc($result);
            $person = new Person($row['id'], $row['name'], $row['last_name'], $row['email']);
            return $person;
        } else {
            return null;
        }
    }

    public function insertChatbotNoReplies($chatbotNoReplies){
            // Obtener los valores de los campos del objeto ChatbotNoReplies
        $id = $chatbotNoReplies->getId();
        $queriesNoReplies = $chatbotNoReplies->getQueriesNoReplies();
        $fecha = $chatbotNoReplies->getFecha();
        $person_id = $chatbotNoReplies->getPersonId();
    
        $query = "INSERT INTO `chatbot_no_replies` (`id`, `queriesNoReplies`, `fecha`, `person_id`) VALUES ('$id', '$queriesNoReplies', '$fecha', '$person_id')";
        
            // Ejecutar la consulta y retornar el resultado
        global $CONECTION; // Agrega esta línea para acceder a la variable de conexión global
         $result = mysqli_query($CONECTION, $query);
            
        return $result;
    }
}
