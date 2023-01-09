<?php

function add_seller()
{
    echo '
    <div class="page-header">
        <h1 class="display-10 text-center mt-3">Add a Seller</h1>
    </div>    
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <form method="POST" action=".">
                <input type="text" class="form-control" placeholder="Username" name="username"><br>
                <button type="submit" class="btn btn-primary" name="add_user" value="submit">Add Item</button><br>
            </form>
        </div>
    </div>
    </div>
    ';
}

function add_seller_modal()
{
    global $pdo;

    echo '
    <div class="modal fade" id="createSellerModal" tabindex="-1" role="dialog" aria-labelledby="createSellerModal" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-white mt-1" id="loginModalLabel">Add Seller to Database</h5>
                    <button type="button" class="close text-white" aria-label="Close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body bg-dark"> 
                <div class="container">
                <div class="row justify-content-center">
                    <div class="col-10">
                        <form method="post" action="">
                        <input type="text" class="form-control" placeholder="Username" name="username"><br>
                        <button type="submit" class="btn btn-primary" name="add_seller" value="submit">Add Seller</button><br>
                        </form>
                    </div>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    ';
    if (isset($_POST['add_seller'])) {
        if ($_POST['username'] != null) {
            $stmnt = $pdo->prepare('INSERT INTO `seller` (`login`) 
            VALUES ("' . $_POST['username'] . '")');
            $stmnt->execute();
            echo '
            <div class="container">
                <div class="text-center alert alert-success alert-dismissible fade show mx-auto" role="alert">
                    <strong class="float-left">Seller added to Seller DB.</strong>   Click the X to close this alert
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>';
            unset($_POST['add_seller']);
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
            unset($_POST['add_seller']);
        }
    }
}
