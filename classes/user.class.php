<?php

class user
{
    private $login;
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $last_logged;

    public function __construct($login, $firstname, $lastname, $email){
        $this->login = $login;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
    }

    //sets user object variables
    public function set_login($login) {$this->login = $login;}

    public function set_firstname($firstname) {$this->firstname = $firstname;}

    public function set_lastname($lastname) {$this->lastname = $lastname;}

    public function set_email($email) {$this->email = $email;}

    public function set_password($password) {$this->password = $password;}

    public function set_last_logged($last_logged) {$this->last_logged = $last_logged;}

    //gets user object variables
    public function get_login() {return $this->login;}

    public function get_firstname() {return $this->firstname;}

    public function get_lastname() {return $this->lastname;}

    public function get_email() {return $this->email;}
    
    public function get_password() {return $this->password;}
    
    public function get_last_logged() {return $this->last_logged;}
}
