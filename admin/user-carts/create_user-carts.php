<?php
function create_user_carts()
{
    global $pdo;

    echo '

    <div class="modal fade" id="createUserCartModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
        aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-dark">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-white mt-1" id="loginModalLabel">Items Database Table</h5>
                    <button type="button" class="close text-white" aria-label="Close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-dark">
                    <div class="container-fluid mt-2 ">
                        <div class="d-flex text-white justify-content-center">
                            <form method="post" action="" class="mx-md-5 col-md-12">
                                <div class="form-group">
                                    <label for="inputCartLogin">login</label>
                                    <input type="text" class="form-control" name="cartLogin" id="inputCartLogin"
                                        placeholder="Login">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputCartItemID">Item ID</label>
                                        <input type="text" class="form-control" name="cartItemID" id="inputCartItemID"
                                            placeholder="Item ID">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCartAmount">Amount</label>
                                        <input type="text" class="form-control" name="cartAmount" id="inputCartAmount"
                                            placeholder="Amount">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary w-25" name="create_cart">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ';

    if (isset($_POST['create_cart'])) {
        if($_POST['cartLogin']!=null && $_POST['cartItemID']!=null && $_POST['cartAmount']!=null){
            $stmnt = $pdo->prepare('INSERT INTO `user_carts` (`login`, `item_id`, `amount`) 
            VALUES ("' . $_POST['cartLogin'] . '", "' . $_POST['cartItemID'] . '", "' . $_POST['cartAmount'] . '")');
            $stmnt->execute();
            echo '
            <div class="container">
                <div class="text-center alert alert-success alert-dismissible fade show mx-auto" role="alert">
                    <strong class="float-left">User Cart added to user cart.</strong>   Click the X to close this alert
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>';
            unset($_POST['create_cart']);
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
            unset($_POST['create_cart']);
        }
    }
}
