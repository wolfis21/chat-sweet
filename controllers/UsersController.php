<?php

require_once "config/conection.php";
require_once "models/Users.php";

class UsersControllers{
    public function create($id, $name, $password, $person_id) {
        // Verificar que los campos requeridos no estén vacíos
        if (empty($id) || empty($name) || empty($password) || empty($person_id)) {
            return "Error: Se deben proporcionar todos los campos necesarios.";
        }
    
        // Verificar si ya existe un usuario con el mismo ID
        if ($this->getUserById($id)) {
            return "Error: Ya existe un usuario con el mismo ID.";
        }
    
        // Verificar si el ID de la persona existe en la tabla "person"
        if (!$this->getPersonById($person_id)) {
            return "Error: No se encontró una persona con el ID proporcionado.";
        }
    
        // Crear un nuevo objeto User
        $user = new Users($id, $name, $password, $person_id);
    
        // Insertar el objeto User en la base de datos
        $success = $this->insertUser($user);
    
        // Verificar si la inserción fue exitosa
        if ($success) {
            return "Registro creado exitosamente.";
        } else {
            return "Error al crear el registro.";
        }
    }
    
    // Función para obtener un usuario por su ID
    public function getUserById($id) {
        // Lógica para obtener el usuario de la base de datos usando el $id proporcionado
        $query = "SELECT * FROM `users` WHERE `id` = '$id'";
    
        // Ejecutar la consulta y obtener el resultado
        global $CONECTION; // Agrega esta línea para acceder a la variable de conexión global
        $result = mysqli_query($CONECTION, $query);
    
        // Verificar si se encontró un registro válido
        if (mysqli_num_rows($result) > 0) {
            // Obtener los datos del registro y crear un objeto User
            $row = mysqli_fetch_assoc($result);
            $user = new Users($row['id'], $row['name'], $row['password'], $row['person_id']);
            return $user;
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
    
    // Función para insertar un objeto User en la base de datos
    public function insertUser($user) {
        // Obtener los valores de los campos del objeto User
        $id = $user->getId();
        $name = $user->getName();
        $password = $user->getPassword();
        $person_id = $user->getPersonId();
    
        // Ejecutar la consulta de inserción en la base de datos
        $query = "INSERT INTO `users` (`id`, `name`, `password`, `person_id`) VALUES ('$id', '$name', '$password', '$person_id')";
    
        // Ejecutar la consulta y retornar el resultado
        global $CONECTION; // Agrega esta línea para acceder a la variable de conexión global
        $result = mysqli_query($CONECTION, $query);
    
        return $result;
    }
    
}