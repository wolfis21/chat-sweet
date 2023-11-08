<?php

class ChatbotNoReplies{
        private $id;
        private $queries_no_replies;
        private $fecha;
        private $person_id;

        public function __construct($id,$queries_no_replies,$fecha,$person_id){
            $this->id = $id;
            $this->$queries_no_replies = $queries_no_replies;
            $this->fecha = $fecha;
            $this->person_id = $person_id;
        }

        public function getId() {
            return $this->id;
        }
        
        public function setId($id) {
            $this->id = $id;
        }

        public function getQueries_no_replies() {
            return $this->queries_no_replies;
        }
        
        public function setQueries_no_replies($queries_no_replies) {
            $this->$queries_no_replies = $queries_no_replies;
        }

        public function getFecha() {
            return $this->fecha;
        }
        
        public function setFecha($fecha) {
            $this->fecha = $fecha;
        }

        public function getPersonId() {
            return $this->person_id;
        }
        
        public function setPersonId($person_id) {
            $this->person_id = $person_id;
        }
}