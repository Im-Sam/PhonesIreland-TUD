<?php

class item{
    private $item_id;
    private $name;
    private $stock;
    private $price;
    private $cat_id;
    private $brand_id;

    public function set_item_id($item_id){$this->item_id = $item_id;}
    public function set_name($name){$this->name = $name;}
    public function set_stock($stock){$this->stock = $stock;}
    public function set_price($price){$this->price = $price;}
    public function set_cat_id($cat_id){$this->cat_id = $cat_id;}
    public function set_brand_id($brand_id){$this->brand_id = $brand_id;}

    public function get_item_id(){return $this->item_id;}
    public function get_name(){return $this->name;}
    public function get_stock(){return $this->stock;}
    public function get_price(){return $this->price;}
    public function get_cat_id(){return $this->cat_id;}
    public function get_brand_id(){return $this->brand_id;}
}