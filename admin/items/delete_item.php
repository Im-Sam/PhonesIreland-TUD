<?php
function delete_item(){
    global $pdo;

    $stmnt = $pdo->prepare('SELECT * FROM item');
    $stmnt->execute();
    $result = $stmnt->fetchAll();
    $counter = 0;
    echo '
     <div class="modal fade" id="deleteItemModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true" data-backdrop="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content bg-dark">
                    <div class="modal-header text-center">
                        <h5 class="modal-title text-white mt-1" id="loginModalLabel">Item Database Table</h5>
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
                                        <th class="text-primary" scope="col">Item Id</th>
                                        <th class="text-primary" scope="col">Name </th>
                                        <th class="text-primary" scope="col">Stock</th>
                                        <th class="text-primary" scope="col">Price</th>
                                        <th class="text-primary" scope="col">Category ID</th>
                                        <th class="text-primary" scope="col">Brand ID</th>
                                        <th class="text-primary" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                
                    ';
                    while ($counter < count($result)){
                        echo'
                        <form method="post" action="">
                        <tr>
                        <th scope="row">'.$result[$counter]['item_id'].'</th>
                        <td>'.$result[$counter]['name'].'</th>
                        <td>'.$result[$counter]['stock'].'</td>
                        <td>'.$result[$counter]['price'].'</td>
                        <td>'.$result[$counter]['cat_id'].'</td>
                        <td>'.$result[$counter]['brand_id'].'</td>
                            <td>
                                <button type="submit" class="btn btn-danger" name="remove_item" value="'.$result[$counter]['item_id'].'">Delete</button>
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
    if(isset($_POST['remove_item'])){
        $stmt = $pdo->prepare('DELETE FROM item WHERE item_id="'.$_POST['remove_item'].'"');
        $stmt->execute();
    }
}