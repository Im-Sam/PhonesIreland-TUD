<?php

class user_carts{
    private $login;
    private $item_id;
    private $amount;

    public function set_login($login) {$this->login = $login;}

    public function set_item_id($item_id) {$this->item_id = $item_id;}

    public function set_amount($amount) {$this->amount = $amount;}

    public function get_login() {return $this->login;}

    public function get_item_id() {return $this->item_id;}

    public function get_amount() {return $this->amount;}
}