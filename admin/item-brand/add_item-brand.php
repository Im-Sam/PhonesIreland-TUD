<?php 

function add_item_Brand()
{
    echo '
    <div class="page-header">
        <h1 class="display-10 text-center mt-3">Add Item Brand</h1>
    </div>    
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <form method="POST" action=".">
                <input type="text" class="form-control" placeholder="Item Name" name="name"><br>
                <input type="text" class="form-control" placeholder="Brand Id" name="brand_id"><br>
                <button type="submit" class="btn btn-primary" name="add_item" value="submit">Add Item Brand</button><br>
            </form>
        </div>
    </div>
    </div>
    ';
}

function add_item_brand_modal()
{
    global $pdo;

    echo '
    <div class="modal fade" id="createBrandModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-white mt-1" id="loginModalLabel">Add Item Brand to Database</h5>
                    <button type="button" class="close text-white" aria-label="Close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body bg-dark"> 
                <div class="container">
                <div class="row justify-content-center">
                    <div class="col-10">
                        <form method="post" action="">
                            <input type="text" class="form-control" placeholder="Item ID" name="item_name"><br>
                            <input type="text" class="form-control" placeholder="Item Name" name="item_stock"><br>
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
    if (isset($_POST['add_item-brand'])) {
        if ($_POST['item_name'] != null && $_POST['brand_id'] != null && $_POST['name'] != null) {
            $stmnt = $pdo->prepare('INSERT INTO `item_brand` (`brand_id`, `name`) 
            VALUES ("' . $_POST['name'] . '", "' . $_POST['brand_id'] . '")');
            $stmnt->execute();
            echo '
            <div class="container">
                <div class="text-center alert alert-success alert-dismissible fade show mx-auto" role="alert">
                    <strong class="float-left">Brand Item added to item DB.</strong>   Click the X to close this alert
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>';
            unset($_POST['add_item-brand']);
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
            unset($_POST['add_item-brand']);
        }
    }
}