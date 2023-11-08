<?php
require_once "config/conection.php";
require_once "models/Chatbot.php";

class ChatBotController{
    public function create($id, $personId, $ingredientesId) {
        // Verificar que los campos requeridos no estén vacíos
        if (empty($id) || empty($personId) || empty($ingredientesId)) {
            return "Error: Se deben proporcionar el ID, ID de la persona y ID de los ingredientes.";
        }
    
        // Verificar si ya existe un registro con el mismo ID
        if ($this->getChatbotById($id)) {
            return "Error: Ya existe un registro con el mismo ID.";
        }
    
        // Verificar si el ID de la persona existe en la tabla "person"
        if (!$this->getPersonById($personId)) {
            return "Error: No se encontró una persona con el ID proporcionado.";
        }
    
        // Verificar si el ID de los ingredientes existe en la tabla "ingredientes"
        if (!$this->getIngredientesById($ingredientesId)) {
            return "Error: No se encontraron ingredientes con el ID proporcionado.";
        }
    
        // Crear un nuevo objeto Chatbot
        $chatbot = new Chatbot($id, $personId, $ingredientesId);
    
        // Insertar el objeto Chatbot en la base de datos
        $success = $this->insertChatbot($chatbot);
    
        // Verificar si la inserción fue exitosa
        if ($success) {
            return "Registro creado exitosamente.";
        } else {
            return "Error al crear el registro.";
        }
    }
    
    // Función para obtener un registro de chatbot por su ID
    public function getChatbotById($id) {
        // Lógica para obtener el registro de chatbot de la base de datos usando el $id proporcionado
        // La siguiente línea es un ejemplo, asegúrate de adaptarla a tu entorno de base de datos
        $query = "SELECT * FROM `chatbot` WHERE `id` = '$id'";
    
        // Ejecutar la consulta y obtener el resultado
        // La siguiente línea es un ejemplo, asegúrate de adaptarla a tu entorno de base de datos
        global $CONECTION; // Agrega esta línea para acceder a la variable de conexión global
        $result = mysqli_query($CONECTION, $query);
    
        // Verificar si se encontró un registro válido
        if (mysqli_num_rows($result) > 0) {
            // Obtener los datos del registro y crear un objeto Chatbot
            $row = mysqli_fetch_assoc($result);
            $chatbot = new Chatbot($row['id'], $row['person_id'], $row['ingredientes_id']);
            return $chatbot;
        } else {
            return null;
        }
    }
    
    // Función para obtener una persona por su ID
    public function getPersonById($id) {
        // Lógica para obtener la persona de la base de datos usando el $id proporcionado
        // La siguiente línea es un ejemplo, asegúrate de adaptarla a tu entorno de base de datos
        $query = "SELECT * FROM `person` WHERE `id` = '$id'";
    
        // Ejecutar la consulta y obtener el resultado
        // La siguiente línea es un ejemplo, asegúrate de adaptarla a tu entorno de base de datos
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
    
    // Función para obtener ingredientes por su ID
    public function getIngredientesById($id) {
        // Lógica para obtener los ingredientes de la base de datos usando el $id proporcionado
        // La siguiente línea es un ejemplo, asegúrate de adaptarla a tu entorno de base de datos
        $query = "SELECT * FROM `ingredientes` WHERE `id` = '$id'";
    
        // Ejecutar la consulta y obtener el resultado
        // La siguiente línea es un ejemplo, asegúrate de adaptarla a tu entorno de base de datos
        global $CONECTION; // Agrega esta línea para acceder a la variable de conexión global
        $result = mysqli_query($CONECTION, $query);
    
        // Verificar si se encontraron ingredientes  
    }

    public function insertChatbot($chatbot){
        //obtener los valores de llaves

        //...
    }
}