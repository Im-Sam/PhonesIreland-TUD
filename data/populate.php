<?php
function populate_home()
{
    echo '
        <div class="jumbotron">
            <h1 class="display-4 text-center">PhonesIreland</h1>
            <p class="lead text-center">Welcome to PhonesIreland, our goal is to make you enjoy the process of buying a new phone!</p>
            <hr class="my-4">
            <p class="text-center">See some of our products below, or click store to see our full range!</p>
        </div>
    ';
    echo '<div class="d-flex-inline d-md-flex flex-wrap justify-content-center container mt-5">';
    $item = find_items();
    $brands = brands();
    $category = category();

    $result = 4;
    $products = 0;
    while ($products < $result) {
        $random = rand(0,12);
        $item_brand = $brands[$item[$random]['brand_id'] - 1]['name'];
        $item_category = $category[$item[$random]['cat_id'] - 1]['name'];
        echo '
        <div class="card m-3">
            <div class="about-product text-center m-2"><img class="p-4" src="./public/imgs/' . $item[$random]["name"] . '.jpg" width="350">
            </div>
            <div class="stats m-2 mt-auto align-bottom">
                <div class="border-bottom text-center">
                    <h5>' . $item_brand . " " . $item[$random]["name"] . '</h4>
                </div>
                <div class="d-flex justify-content-between p-price"><span class="font-weight-bold">Stock: </span><span>' . $item[$random]["stock"] . '</span></div>
                <div class="d-flex justify-content-between p-price"><span class="font-weight-bold">Price: </span><span>$' . $item[$random]["price"] . '</span></div>
                <div class="d-flex justify-content-between p-price"><span class="font-weight-bold">Category: </span><span>' . $item_category . '</span></div>
                <div class="d-flex justify-content-center p-price mt-3">
                <form method="post" action="">
                    <button type="submit" class="btn btn-success px-4" name="add_cart" value="'.$item[$random]['item_id'].'">Add to Cart</button>
                </form>
            </div>
            </div class="mx-auto">
                <div class="d-flex justify-content-between total font-weight-bold mx-auto"></div>
            </div>
        ';
        $products++;
    }
    echo '</div>';
}

function populate_allitems()
{
    $result = number_of_items();
    $brands = brands();


    echo '
    <div class="d-flex justify-content-center container bg-dark text-white pt-3 p-2 mt-3 w-75 rounded">    
        <div class="itmtitle h4" >Total: ' . ($result) . ' products</div>
    </div>

    <div class="d-flex-inline text-white container mt-3 rounded" action="" method="post">  
        <form class="form-inline p-12 justify-content-center" method="post" action="" name="selectedBrand">
            <select class="form-control col-md-4 mr-md-2" name="selectedbrand">
                <option value="all">All</option>
    ';
    $brandCount = count($brands);
    for ($i = 0; $i < $brandCount; $i++) {
        echo '
                <option value="' . $i . '">' . $brands[$i]['name'] . '</option>
    ';
    }
    echo '
            </select>
            <input name="submit" type="submit" class="form-control col-md-2"> 
        </form>
    </div>
    ';
    echo '<div class="d-flex flex-wrap justify-content-center container mt-5">';

    if (isset($_POST['selectedbrand']) && $_POST['selectedbrand'] != 'all') {
        items_by_brand();
    } else {
        all_items();
    }
}

function all_items()
{
    $item = find_items();
    $result = number_of_items();
    $brands = brands();
    $category = category();

    $counter = 0;
    while ($counter < $result) {
        $item_brand = $brands[$item[$counter]['brand_id'] - 1]['name'];
        $item_category = $category[$item[$counter]['cat_id'] - 1]['name'];
        echo '
        <div class="card m-3">
            <div class="about-product text-center m-2"><img class="p-4" src="./public/imgs/' . $item[$counter]["name"] . '.jpg" width="280">
            </div>
            <div class="stats m-2 mt-auto align-bottom">
                <div class="border-bottom text-center">
                    <h5>' . $item_brand . " " . $item[$counter]["name"] . '</h4>
                </div>
                <div class="d-flex justify-content-between p-price"><span class="font-weight-bold">Stock: </span><span>' . $item[$counter]["stock"] . '</span></div>
                <div class="d-flex justify-content-between p-price"><span class="font-weight-bold">Price: </span><span>$' . $item[$counter]["price"] . '</span></div>
                <div class="d-flex justify-content-between p-price border-bottom"><span class="font-weight-bold">Category: </span><span>' . $item_category . '</span></div>
                <div class="d-flex justify-content-center p-price mt-3">
                    <form method="post" action="">
                        <button type="submit" class="btn btn-success px-4" name="add_cart" value="'.$item[$counter]['item_id'].'">Add to Cart</button>
                    </form>
                </div>
            </div class="mx-auto">
                <div class="d-flex justify-content-between total font-weight-bold mx-auto"></div>
            </div>
        ';
        $counter++;
    }
    echo '</div>';
}

function items_by_brand()
{
    $selectedbrand = $_POST['selectedbrand'] + 1;
    $items_by_brand = find_items_by_brand($selectedbrand);
    $brands = brands();
    $category = category();

    $counter = 0;
    while ($counter < count($items_by_brand)) {
        $item_brand = $brands[$items_by_brand[$counter]['brand_id'] - 1]['name'];
        $item_category = $category[$items_by_brand[$counter]['cat_id'] - 1]['name'];
        echo '
        <div class="card m-3">
            <div class="about-product text-center m-2"><img class="p-4" src="./public/imgs/' . $items_by_brand[$counter]["name"] . '.jpg" width="280">
            </div>
            <div class="stats m-2 mt-auto align-bottom">
                <div class="border-bottom text-center">
                    <h5>' . $item_brand . " " . $items_by_brand[$counter]["name"] . '</h4>
                </div>
                <div class="d-flex justify-content-between p-price"><span class="font-weight-bold">Stock: </span><span>' . $items_by_brand[$counter]["stock"] . '</span></div>
                <div class="d-flex justify-content-between p-price"><span class="font-weight-bold">Price: </span><span>$' . $items_by_brand[$counter]["price"] . '</span></div>
                <div class="d-flex justify-content-between p-price"><span class="font-weight-bold">Category: </span><span>' . $item_category . '</span></div>
                <div class="d-flex justify-content-center p-price mt-3">
                <form method="post" action="">
                    <button type="submit" class="btn btn-success px-4" name="add_cart" value="'.$items_by_brand[$counter]['item_id'].'">Add to Cart</button>
                </form>
            </div>
            </div class="mx-auto">
                <div class="d-flex justify-content-between total font-weight-bold mx-auto"></div>
            </div>
        ';
        $counter++;
    }
    echo '</div>';
}

function populate_admin(){
    include('./admin/index.php');
}

function populate_itemadded(){
    global $pdo;

    $item = find_items();
    $brands = brands();
    $category = category();

    $selected_item = $_POST['add_cart'];
    $item_brand = $brands[$item[$selected_item-1]['brand_id'] - 1]['name'];
    $item_category = $category[$item[$selected_item-1]['cat_id'] - 1]['name'];

    $stmnt = $pdo->prepare('SELECT * FROM item WHERE item_id ="'.$selected_item.'"');
    $stmnt -> execute();
    $stmnt_result = $stmnt->fetchAll();

    if(isset($_SESSION['logged_in_user'])){
        if($stmnt_result[0]['stock'] > 0){
            add_to_cart($_POST['add_cart']);
        }
        else{
            echo "<script type='text/javascript'>alert('There are no ".$item_brand . " " . $stmnt_result[0]['name']." in stock!')</script>";
        }
    
        echo '
        <div class="d-flex flex-wrap justify-content-center container mt-5">
            <div class="card m-3">
                <div class="about-product text-center m-2"><img class="p-4" src="./public/imgs/'.$stmnt_result[0]['name'].'.jpg" width="360">
                </div>
                <div class="stats m-2 mt-auto align-bottom">
                    <div class="border-bottom text-center">
                        <h5>' . $item_brand . " " . $stmnt_result[0]['name'] . ' Added to Cart</h4>
                    </div>
                    <div class="d-flex justify-content-between p-price"><span class="font-weight-bold">Stock: </span><span>' . $stmnt_result[0]["stock"] . '</span></div>
                <div class="d-flex justify-content-between p-price"><span class="font-weight-bold">Price: </span><span>$' . $stmnt_result[0]["price"] . '</span></div>
                <div class="d-flex justify-content-between p-price"><span class="font-weight-bold">Category: </span><span>' . $item_category . '</span></div>
                <div class="d-flex justify-content-center p-price mt-3">
                    <form method="post" action="">
                        <button type="submit" class="btn btn-success px-4" name="add_cart" value="'.$stmnt_result[0]['item_id'].'">Add Another</button>
                    </form>
                </div>
            </div class="mx-auto">
                <div class="d-flex justify-content-between total font-weight-bold mx-auto"></div>
            </div>
        </div>
        ';
    }
    else{
        echo "<script type='text/javascript'>alert('Please login/create an account to add to cart.')</script>";
        populate_home();
    }
}

function populate_cart(){
    
}

function populate_create(){
    include ('./admin/items/add_item.php');

    add_item();
}

function populate_handler()
{   
    if(isset($_POST['remove_cart'])){
        remove_cart($_POST['remove_cart']);
    }
    else if(isset($_POST['go_create_account']) || isset($_POST['create_account'])){
        include ('./includes/create_user.php');
    }
    else if(isset($_POST['add_cart'])){
        populate_itemadded();
    }
    else if(isset($_GET['navlink']) && $_GET['navlink'] != 'Home'){
        if(($_GET['navlink'])=='Store'){
            populate_allitems();
        }
        else if(($_GET['navlink'])=='Cart'){
            show_cart();
        }
        else if(($_GET['navlink'])=='Create Product'){
            if(check_seller()){
                populate_create();
            }
            else{
                populate_home();
            }
        }
        else if(($_GET['navlink'])=='Admin'){
            if(check_admin()){
                populate_admin();
            }
            else {
                populate_home();
            }
        }
    }
    else {
        populate_home();
    }
}
