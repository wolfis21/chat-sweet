<?php

require_once "models/Person.php";
require_once "models/Users.php";

class UsersController{
    private $model_p;
    private $model_u;

    public function __CONSTRUCT(){
        $this->model_p = new Person();
        $this->model_u = new Users();
    }

    public function Index(){
        require_once 'views/home/index.php';
    }

    public function show_Login(){
        require_once "views/login/login.php";
    }

    public function show_Register(){
        require_once "views/register/register.php";
    }
    
    public function login(){
        $users = new Users();
        $users->name = $_REQUEST['user'];
        $users->password = $_REQUEST['password'];
        
    }

    public function save(){
        $users = new Users();
        $users->name = $_REQUEST['user'];
        $users->password = $_REQUEST['password'];

        $person = new Person();
        $person->name = $_REQUEST['name'];
        $person->last_name = $_REQUEST['last_name'];
        $person->email = $_REQUEST['email'];

        $this->model_u->register($person,$users);
        require_once 'views/login/login.php';
    }
}