<?php
include './admin/seller/add_seller.php';
include './admin/seller/delete_seller.php';
include './admin/seller/modify_seller.php';

function read_seller_table(){
    global $pdo;

    $stmnt = $pdo->prepare('SELECT * FROM seller');
    $stmnt->execute();
    $result = $stmnt->fetchAll();   
    $counter =0;
    add_seller_modal();
    modify_seller();
    delete_seller();
   
   
    echo '
    
    <div class="modal fade" id="sellerModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-white mt-1" id="loginModalLabel">Seller Database Table</h5>
                    <button type="button" class="close text-white" aria-label="Close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-dark">
                <div class="container-fluid mt-2 ">
                <table class="table table-striped table-bordered rounded table-dark bg-dark text-center">
                <thead>
                    <tr>
                        <th class="text-primary" scope="col">Seller ID</th>
                        <th class="text-primary" scope="col">Login</th>
                    </tr>
                </thead>
                <tbody>
            
                ';
                while($counter < count($result)){
                    echo'
                    <tr>
                        <th scope="row">'.$result[$counter]['seller_id'].'</th>
                        <th scope="row">'.$result[$counter]['login'].'</th>
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