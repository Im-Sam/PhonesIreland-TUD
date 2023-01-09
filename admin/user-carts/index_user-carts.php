<?php
include './admin/user-carts/create_user-carts.php';
include './admin/user-carts/delete_user-carts.php';
include './admin/user-carts/modify_user-carts.php';

function read_cart_table(){
    global $pdo;

    $stmnt = $pdo->prepare('SELECT * FROM user_carts');
    $stmnt->execute();
    $result = $stmnt->fetchAll();   
    $counter =0;
    create_user_carts();
    modify_cart();
    delete_user_carts();
    echo '
    
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-dark">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-white mt-1" id="loginModalLabel">User-Cart Database Table</h5>
                    <button type="button" class="close text-white" aria-label="Close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-dark">
                <div class="container-fluid mt-2 ">
                <table class="table table-striped table-bordered rounded table-dark bg-dark text-center">
                    <thead>
                        <tr>
                            <th class="text-primary" scope="col">Cart ID</th>
                            <th class="text-primary" scope="col">Login</th>
                            <th class="text-primary" scope="col">item_id</th>
                            <th class="text-primary" scope="col">amount</th>
                        </tr>
                    </thead>
                    <tbody>
            
                ';
                while($counter < count($result)){
                    echo'
                    <tr>
                        <th scope="row">'.$result[$counter]['cart_id'].'</th>
                        <td>'.$result[$counter]['login'].'</td>
                        <td>'.$result[$counter]['item_id'].'</td>
                        <td>'.$result[$counter]['amount'].'</td>
                    </tr>          
                    ';
                    $counter++;
                
                }
                echo '
            
                </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    ';
}
?>