<?php

class Users{
        private $pdo

        public $id;
        public $name;
        public $password;
        public $person_id;

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

        public function register(Person $person, Users $users){
            $verification = "SELECT * FROM users WHERE id = $users->id";
            $query = $this->pdo->query($verification);

            if ($query->fetchAll(PDO::FETCH_ASSOC) == true){

            }else{  
                try{
                    $sql = "INSERT INTO person(name,last_name,email) VALUES (?,?,?)";
                    $this->pdo->prepare($sql)->execute(
                        array(
                            $person->name,
                            $person->last_name,
                            $person->email
                        )
                        $person_id = $this->pdo->lastInsertId();
                    );
                    $sql = "INSERT INTO users(name,password,person_id) VALUES (?,?,?)";
                    $this->pdo->prepare($sql)->execute(
                        array(
                            $users->name,
                            $users->password,
                            $person_id
                        )
                    );
                }catch(Exception $e){
                    die($e->getMessage());
                }
            }
        }
}