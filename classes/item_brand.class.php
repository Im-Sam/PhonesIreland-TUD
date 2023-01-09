<?php

class item_brand{
    private $brand_id;
    private $brand_name;

    public function set_brand_id($brand_id){$this->brand_id = $brand_id;}
    public function set_brand_name($brand_name){$this->brand_name = $brand_name;}

    public function get_brand_id(){return $this->brand_id;}
    public function get_brand_name(){return $this->brand_name;}
}