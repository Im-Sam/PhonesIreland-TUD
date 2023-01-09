<?php
function checkout_cart(){
    global $pdo;
    echo '
    <div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-white mt-1" id="loginModalLabel">Place Order</h5>
                    <button type="button" class="close text-white" aria-label="Close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body bg-dark"> 
                <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form method="post" action="">
                            <div class="form-row">
                            <input type="text" class="form-control" placeholder="Address" name="order_address"><br>
                            </div><br>
                            <div class="form-row">
                            <div class="form-group col-md-8">
                                <select class="form-control" name="order_payment_method">
                                    <option value="Paypal">Paypal</option>
                                    <option value="Revolut">Revolut</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                            <button type="submit" class="btn btn-primary" name="place_order" value="Submit Order">Submit Order</button>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    ';
    checkout_cart_logic();
}

function checkout_cart_logic(){
    global $pdo;

    $stmnt = $pdo->prepare('SELECT * FROM user_carts WHERE `login` = "'.$_SESSION['logged_in_user'].'"');
    $stmnt->execute();
    $result = $stmnt->fetchAll();
    $counter = 0; 
    if(isset($_POST['place_order'])){
        if(isset($_POST['order_address'])){
            
            while($counter<count($result)){
                $checkout_stmt = $pdo->prepare('INSERT INTO `orders` (`login`, `item_id`, `address`, `payment_method`) 
                VALUES ("'.$_SESSION['logged_in_user'].'", "' . $result[$counter]['item_id'] . '", "' . $_POST['order_address'] . '", "' . $_POST['order_payment_method'] . '")');
                $checkout_stmt->execute();
                $counter++;
                
            }

            $query = 'DELETE FROM user_carts WHERE login="'.$_SESSION['logged_in_user'].'"';
            $stmnt = $pdo->prepare($query);
            $stmnt->execute();
        }
        else{
            echo "<script type='text/javascript'>alert('You must input an address')</script>";
        }
    }
}
?>