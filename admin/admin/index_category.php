<?php

function show_item_table(){
    echo '
    <br>
    <div class="text-center">
    <h2> Administrator Dashboard <h2>
    </div>
    ';

    global $pdo;

    $stmnt = $pdo->prepare('SELECT * FROM item');
    $stmnt->execute();
    $result = $stmnt->fetchAll();   
    $counter =0;

    echo '
    <div class="container-fluid mt-2 ">
    <table class="table table-striped table-bordered rounded table-dark text-center">
        <thead>
            <tr>
                <th class="text-primary" scope="col">Item Id</th>
                <th class="text-primary" scope="col">Name </th>
                <th class="text-primary" scope="col">Name </th>
            </tr>
        </thead>
        <tbody>

    ';
    while($counter < count($result)){
        echo'
        <tr>
            <th scope="row">'.$result[$counter]['item_id'].'</th>
            <td>'.$result[$counter]['name'].'</td>
            <td>'.$result[$counter]['stock'].'</td>
            <td>'.$result[$counter]['price'].'</td>
            <td>'.$result[$counter]['cat_id'].'</td>
            <td>'.$result[$counter]['brand_id'].'</td>
        </tr>          
        ';
        $counter++;
    
    }
    echo '

    </table>
    </div>
    ';
}

function add_item(){
    global $pdo;

    echo'
    <div class="page-header">
        <h1 class="display-10 text-center mt-3">Add an Item</h1>
    </div>    
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <form method="POST" action=".">
                <input type="text" class="form-control" placeholder="Item Name" name="item_name"><br>
                <input type="text" class="form-control" placeholder="Item Stock" name="item_stock"><br>
                <input type="text" class="form-control" placeholder="Price" name="item_price"><br>
                <input type="text" class="form-control" placeholder="Cat Id" name="item_cat_id"><br>
                <input type="text" class="form-control" placeholder="Brand Id" name="item_brand_id"><br>
                <button type="submit" class="btn btn-primary" name="add_item" value="submit">Add Item</button><br>
            </form>
        </div>
    </div>
    ';
    if(isset($_POST['add_item'])){
        $stmnt = $pdo->prepare('INSERT INTO `item` (`name`, `stock`, `price`, `cat_id`, `brand_id`) 
                                VALUES ("'.$_POST['item_name'].'", "'.$_POST['item_stock'].'", "'.$_POST['item_price'].'", "'.$_POST['item_cat_id'].'", "'.$_POST['item_brand_id'].'")');
        $stmnt->execute();
        unset($_POST['add_item']);
    }
}
