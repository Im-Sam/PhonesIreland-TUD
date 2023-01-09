<?php
function delete_seller()
{
    global $pdo;

    $stmnt = $pdo->prepare('SELECT * FROM seller');
    $stmnt->execute();
    $result = $stmnt->fetchAll();
    $counter = 0;
    echo '
     <div class="modal fade" id="deleteSellerModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true" data-backdrop="false">
            <div class="modal-dialog modal-lg">
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
        echo '
        <form method="post" action="">
        <tr>
            <th scope="row">' . $result[$counter]['seller_id'] . '</th>
            <th scope="row">' . $result[$counter]['login'] . '</th>
            <td>
            <button type="submit" class="btn btn-danger" name="removeSeller" value="' . $result[$counter]['seller_id'] . '">Delete</button>
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
    if(isset($_POST['removeSeller'])){
        $stmt = $pdo->prepare('DELETE FROM seller WHERE seller_id="'.$_POST['removeSeller'].'"');
        $stmt->execute();
    }
}
