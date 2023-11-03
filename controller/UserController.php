<?php
class UserController {
    private $userModel;

    public function __construct() {
        // Instanciar el modelo de usuario
        $this->userModel = new UserModel();
    }

    public function getAllUsers() {
        $users = $this->userModel->getAllUsers();
        // Lógica adicional si es necesario
        return $users;
    }

    public function getUserById($id) {
        $user = $this->userModel->getUserById($id);
        // Lógica adicional si es necesario
        return $user;
    }

    public function createUser($name, $password, $role_id) {
        $insertId = $this->userModel->createUser($name, $password, $role_id);
        // Lógica adicional si es necesario
        return $insertId;
    }

    public function updateUser($id, $name, $password, $role_id) {
        $rowCount = $this->userModel->updateUser($id, $name, $password, $role_id);
        // Lógica adicional si es necesario
        return $rowCount;
    }

    public function deleteUser($id) {
        $rowCount = $this->userModel->deleteUser($id);
        // Lógica adicional si es necesario
        return $rowCount;
    }
}
