<?php

function add_item()
{
    echo '
    <div class="page-header">
        <h1 class="display-10 text-center mt-3">Add an Item</h1>
    </div>    
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
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
    </div>
    ';
}

function add_item_modal()
{
    global $pdo;

    echo '
    <div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-white mt-1" id="loginModalLabel">Add Item to Database</h5>
                    <button type="button" class="close text-white" aria-label="Close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body bg-dark"> 
                <div class="container">
                <div class="row justify-content-center">
                    <div class="col-10">
                        <form method="post" action="">
                            <input type="text" class="form-control" placeholder="Item Name" name="item_name"><br>
                            <input type="text" class="form-control" placeholder="Item Stock" name="item_stock"><br>
                            <input type="text" class="form-control" placeholder="Price" name="item_price"><br>
                            <input type="text" class="form-control" placeholder="Cat Id" name="item_cat_id"><br>
                            <input type="text" class="form-control" placeholder="Brand Id" name="item_brand_id"><br>
                            <button type="submit" class="btn btn-primary" name="add_item" value="submit">Add Item</button><br>
                        </form>
                    </div>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    ';
    
    if (isset($_POST['add_item'])) {
        if ($_POST['item_name'] != null && $_POST['item_stock'] != null && $_POST['item_price'] != null && $_POST['item_cat_id'] != null && $_POST['item_brand_id'] != null) {
            $stmnt = $pdo->prepare('INSERT INTO `item` (`name`, `stock`, `price`, `cat_id`, `brand_id`) 
            VALUES ("' . $_POST['item_name'] . '", "' . $_POST['item_stock'] . '", "' . $_POST['item_price'] . '", "' . $_POST['item_cat_id'] . '", "' . $_POST['item_brand_id'] . '")');
            $stmnt->execute();
            echo '
            <div class="container">
                <div class="text-center alert alert-success alert-dismissible fade show mx-auto" role="alert">
                    <strong class="float-left">Item added to item DB.</strong>   Click the X to close this alert
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>';
        }
        else{
            echo '
            <div class="container">
                <div class="text-center alert alert-danger alert-dismissible fade show mx-auto" role="alert">
                    <strong class="float-left">Make sure all fields are filled out.</strong>   Click the X to close this alert
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>';
            unset($_SESSION['add_item']);
        }
        unset($_SESSION['add_item']);
    }
}
