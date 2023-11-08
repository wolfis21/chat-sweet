<?php

class Users{
        private $id;
        private $name;
        private $password;
        private $person_id;

        public function __construct($id,$name,$password,$person_id){
            $this->id = $id;
            $this->name = $name;
            $this->password = $name;
            $this->person_id = $person_id;
        }

        public function getId() {
            return $this->id;
        }
        
        public function setId($id) {
            $this->id = $id;
        }

        public function getName() {
            return $this->name;
        }
        
        public function setName($name) {
            $this->name = $name;
        }

        public function getPassword() {
            return $this->password;
        }
        
        public function setPassword($password) {
            $this->password = $password;
        }

        public function getPersonId() {
            return $this->person_id;
        }
        
        public function setPersonId($person_id) {
            $this->person_id = $person_id;
        }
}