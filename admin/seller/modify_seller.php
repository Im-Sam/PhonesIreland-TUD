<?php
function modify_seller(){
    global $pdo;

    $stmnt = $pdo->prepare('SELECT * FROM seller');
    $stmnt->execute();
    $result = $stmnt->fetchAll();
    $counter = 0;
    echo '
     <div class="modal fade" id="modifySellerModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true" data-backdrop="false">
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
                            <form class="" method="post" action="">
                                <table class="table table-striped table-bordered rounded table-dark bg-dark text-center">
                                    <thead>
                                        <tr>
                                            <th class="text-primary" scope="col">Seller ID</th>
                                            <th class="text-primary" scope="col">Login</th>
                                            <th class="text-primary" scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                
                    ';
            while ($counter < count($result)) {
                echo'
                <form method="post" action="">
                <tr>
                    <th scope="row">' . $result[$counter]['seller_id'] . '</th>
                    <th scope="row">
                        <input class="form-control" type="text" name="modifySellerLogin" value="'.$result[$counter]['login'].'">
                    </th>
                    <td>
                    <button type="submit" class="btn btn-success" name="modifySeller" value="'.$result[$counter]['seller_id'].'">Modify</button>
                    </td>
                </tr>   
                </form>       
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
    if(isset($_POST['modifySeller'])){
        $stmt = $pdo -> prepare('UPDATE `seller` SET  login="'.$_POST['modifySellerLogin'].'" WHERE seller_id='.$_POST['modifySeller'].'');
        $stmt -> execute();
    }
}