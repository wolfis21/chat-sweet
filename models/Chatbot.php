<?php

class Chatbot{
        // Propiedades
        private $id;
        private $person_id;
        private $ingredientes_id;
        
        // Constructor
        public function __construct($id, $person_id, $ingredientes_id) {
            $this->id = $id;
            $this->person_id = $person_id;
            $this->ingredientes_id = $ingredientes_id;
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