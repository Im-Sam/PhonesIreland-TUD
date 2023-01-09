<?php

//splits cart data handlers into separate file.
include ('./accounts/account_cart/add_cart.php');


function find_items()
{
    global $pdo;

    //fetch items database
    $items_stmnt = $pdo->prepare('SELECT * FROM item');
    $items_stmnt->execute();
    $item = $items_stmnt->fetchAll();

    return $item;
}

function number_of_items()
{
    global $pdo;

    //fetch number of items in items database
    $nbItems_stmnt = $pdo->prepare('SELECT COUNT(*) FROM item');
    $nbItems_stmnt->execute();
    $result = $nbItems_stmnt->fetchColumn();

    return $result;
}

function brands()
{
    global $pdo;    
    
    //append brand from brand_id
    $brand_stmnt = $pdo->prepare('SELECT * FROM item_brand');
    $brand_stmnt->execute();
    $brands = $brand_stmnt->fetchAll();

    return $brands;
}

function category()
{
    global $pdo;
    
    //append category from category_id
    $cat_stmnt = $pdo->prepare('SELECT * FROM category');
    $cat_stmnt->execute();
    $category = $cat_stmnt->fetchAll();

    return $category;
}

function find_items_by_brand($selectedbrand){
    global $pdo;

    //fetch items database
    $items_by_brand_stmnt = $pdo->prepare('SELECT * FROM item WHERE brand_id = '.$selectedbrand);
    $items_by_brand_stmnt->execute();
    $items_by_brand = $items_by_brand_stmnt->fetchAll();

    return $items_by_brand;
}


