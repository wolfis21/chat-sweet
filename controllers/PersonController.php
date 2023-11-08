<?php
require_once "config/conection.php";
require_once "models/Person.php";

class PersonController {
    // Método para crear un nuevo registro
    public function create($id, $name, $last_name, $email) {
        // Verificar que los parámetros
        if (empty($id) || empty($name) || empty($last_name) || empty($email)) {
            return "Error: Se deben proporcionar todos los campos necesarios.";
        }
    
        $person = new Person($id, $name, $last_name, $email);
    
        // Insertar el objeto Person en la base de datos
        $success = $this->insertPerson($person);
    
        // Verificar si la inserción fue exitosa
        if ($success) {
            return "Registro creado exitosamente.";
        } else {
            return "Error al crear el registro.";
        }
    }
            // Función para insertar un objeto Person en la base de datos
        public function insertPerson($person) {
            // Obtener los valores de los campos del objeto Person
            $id = $person->getId();
            $name = $person->getName();
            $last_name = $person->getLastName();
            $email = $person->getEmail();

            // Ejecutar la consulta de inserción en la base de datos
            $query = "INSERT INTO `person`(`id`, `name`, `last_name`, `email`) VALUES ('$id','$name','$last_name','$email')";

            // Ejecutar la consulta y retornar el resultado
            global $CONECTION;
            $result = mysqli_query($CONECTION, $query);

            return $result;
        }

    // Método para obtener un registro existente
    public function show($id) {

    }

    // Método para actualizar un registro existente
    public function update($id, $name, $last_name, $email) {

    }

    // Método para eliminar un registro existente
    public function delete($id) {

    }
}