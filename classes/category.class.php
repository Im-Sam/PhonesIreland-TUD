<?php

class category{
    private $category_id;
    private $category_name;

    public function set_category_id($category_id){$this->category_id = $category_id;}
    public function set_category_name($category_name){$this->category_name = $category_name;}

    public function get_category_id(){return $this->category_id;}
    public function get_category_name(){return $this->category_name;}
}