<?php

class Chatbot{
        // Propiedades
        private $id;
        private $person_id;
        private $ingredientes_id;
        
        // Constructor
        private $pdo;
        public function __CONSTRUCT(){
            try
            {
                $this->pdo = Database::StartUp();     
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
	    }

        public function buscarte($ingredientes){
            try{
                $sql = "SELECT receta, preparacion
                FROM postres p
                JOIN ingredientes_has_postres ihp ON p.id = ihp.postres_id
                JOIN ingredientes i ON ihp.ingredientes_id = i.id
                WHERE i.name IN ('" . implode("','", $ingredientes) . "')
                GROUP BY p.id
                HAVING COUNT(DISTINCT i.name) = " . count($ingredientes);

                $result = $this->pdo->query($sql);
                return $result->fetchAll(PDO::FETCH_OBJ);
            }catch(Exeption $e){
                die($e);
            }
        }
        
        // Getters y Setters
        public function getId() {
            return $this->id;
        }
        
        public function setId($id) {
            $this->id = $id;
        }
        
        public function getPersonId() {
            return $this->person_id;
        }
        
        public function setPersonId($person_id) {
            $this->person_id = $person_id;
        }
        
        public function getLastName() {
            return $this->ingredientes_id;
        }
        
        public function setLastName($ingredientes_id) {
            $this->ingredientes_id = $ingredientes_id;
        }
        
}