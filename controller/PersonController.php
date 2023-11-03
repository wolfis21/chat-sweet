<?php
class PersonController {
    private $personModel;

    public function __construct() {
        // Instanciar el modelo de persona
        $this->personModel = new PersonModel();
    }

    public function getPersonById($id) {
        $person = $this->personModel->getPersonById($id);
        // Lógica adicional si es necesario
        return $person;
    }

    public function createPerson($user_id, $name, $last_name, $email) {
        $insertId = $this->personModel->createPerson($user_id, $name, $last_name, $email);
        // Lógica adicional si es necesario
        return $insertId;
    }

    public function updatePerson($id, $user_id, $name, $last_name, $email) {
        $rowCount = $this->personModel->updatePerson($id, $user_id, $name, $last_name, $email);
        // Lógica adicional si es necesario
        return $rowCount;
    }

    public function deletePerson($id) {
        $rowCount = $this->personModel->deletePerson($id);
        // Lógica adicional si es necesario
        return $rowCount;
    }
}

