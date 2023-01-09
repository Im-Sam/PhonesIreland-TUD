<?php
function modify_Brand()
{
    global $pdo;

    $stmnt = $pdo->prepare('SELECT * FROM item_brand');
    $stmnt->execute();
    $result = $stmnt->fetchAll();
    $counter = 0;

    echo '
        
        <div class="modal fade" id="modifyBrandModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true" data-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content bg-dark">
                    <div class="modal-header text-center">
                        <h5 class="modal-title text-white mt-1" id="loginModalLabel">Items Database Table</h5>
                        <button type="button" class="close text-white" aria-label="Close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body bg-dark">
                    <div class="container mt-2 ">
                    <table class="table table-striped table-bordered bg-dark table-dark text-center">
                        <thead>
                            <tr>
                                <th class="text-primary" scope="col">Name </th>
                                <th class="text-primary" scope="col">Brand ID</th>
                                <th class="text-primary" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                
                    ';
    while ($counter < count($result)) {
        echo '
                                        <form method="post" action="">
                                        <tr>
                                            <th scope="row">
                                                <input class="form-control" type="text" name="modifyBrandName" value="' . $result[$counter]['name'] . '">
                                            </th>
                                            <td>' . $result[$counter]['brand_id'] . '</td>
                                            <td>
                                                <button type="submit" class="btn btn-success" name="modifyBrand" value="' . $result[$counter]['brand_id'] . '">Modify</button>
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
        </div>
        ';
    if (isset($_POST['modifyBrand'])) {
        $stmt = $pdo->prepare('UPDATE `item_brand` SET  name="' . $_POST['modifyBrandName'] . '" WHERE brand_id = ' . $_POST['modifyBrand']);
        $stmt->execute();
    }
}
