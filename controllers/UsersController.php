<?php

require_once "models/Person.php";
require_once "models/Users.php";

class UsersControllers{
    private $model_p;
    private $model_u;

    public function __CONSTRUCT(){
        $this->model_P = new Person();
        $this->model_u = new Users();
    }

    public function Index(){
        require_once 'views/register/register.php';
    }
    
    public function save(){
        $users = new Users();
        $users->name = $_REQUEST['user'];
        $users->password = $_REQUEST['password'];

        $person = new Person();
        $person->name = $_REQUEST['name'];
        $person->last_name = $_REQUEST['last_name'];
        $person->email = $_REQUEST['email'];

        $this->models->register($person,$users);
    }
}