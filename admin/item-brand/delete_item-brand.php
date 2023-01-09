<?php
function delete_item_brand(){
    global $pdo;

    $stmnt = $pdo->prepare('SELECT * FROM item_brand');
    $stmnt->execute();
    $result = $stmnt->fetchAll();
    $counter = 0;
    echo '
     <div class="modal fade" id="deleteBrandModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true" data-backdrop="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content bg-dark">
                    <div class="modal-header text-center">
                        <h5 class="modal-title text-white mt-1" id="loginModalLabel">Brand Database Table</h5>
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
                            <<th class="text-primary" scope="col">Name </th>
                            <th class="text-primary" scope="col">Brand ID</th>
                            <th class="text-primary" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                
                    ';
                    while ($counter < count($result)){
                        echo'
                        <tr>
                            <th scope="row">'.$result[$counter]['name'].'</th>
                            <th scope="row">
                            <input class="form-control" type="text" name="modifyName" value="'.$result[$counter]['name'].'">
                        </th>
                        <td>
                            <input class="form-control" type="text" name="modifyBrandID" value="'.$result[$counter]['brand_id'].'">
                        </td>
                            <td>
                                <form method="post" action="">
                                    <button type="submit" class="btn btn-danger" name="remove_brand" value="'.$result[$counter]['name'].'">Delete</button>
                                </form>
                            </td>
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