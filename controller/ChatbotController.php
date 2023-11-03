<?php
class ChatbotController {
    private $chatbotModel;

    public function __construct() {
        // Instanciar el modelo de chatbot
        $this->chatbotModel = new ChatbotModel();
    }

    public function getAllQueries() {
        $queries = $this->chatbotModel->getAllQueries();
        // Lógica adicional si es necesario
        return $queries;
    }

    public function getQueryById($id) {
        $query = $this->chatbotModel->getQueryById($id);
        // Lógica adicional si es necesario
        return $query;
    }

    public function createQuery($query, $reply) {
        $insertId = $this->chatbotModel->createQuery($query, $reply);
        // Lógica adicional si es necesario
        return $insertId;
    }

    public function updateQuery($id, $query, $reply) {
        $rowCount = $this->chatbotModel->updateQuery($id, $query, $reply);
        // Lógica adicional si es necesario
        return $rowCount;
    }

    public function deleteQuery($id) {
        $rowCount = $this->chatbotModel->deleteQuery($id);
        // Lógica adicional si es necesario
        return $rowCount;
    }
}
