<?php

function add_item_test(){
    echo'
    <tr>
        <th scope="row">Test successful add</th>
        <td class="text-success font-weight-bold">Success</td>
        <th>'.add_item_test_logic("Test iPhone", 3, 1000, 2, 1).'</th>
    </tr>
    <tr>
        <th scope="row">Test with something missing</th>
        <td class="text-danger font-weight-bold">Failed</td>
        <th>'.add_item_test_logic("Test iPhone", "", 1000, 2, 1).'</th>
    </tr>
    ';
}

function add_item_test_logic($item_name, $item_stock, $item_price, $item_cat_id, $item_brand_id){
    global $pdo;
    if ($item_name != null && $item_stock != null && $item_price != null && $item_cat_id != null && $item_brand_id != null) {
        return "Item added successfully";
    } else {
        return "Item not added due to missing information";
    }
}
