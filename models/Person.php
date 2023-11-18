<?php

class Person{
        // Propiedades
        private $pdo;

        public $id;
        public $name;
        public $last_name;
        public $email;
        
        // Constructor
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
}