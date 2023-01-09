<?php
function modify_item()
{
    global $pdo;

    $stmnt = $pdo->prepare('SELECT * FROM item');
    $stmnt->execute();
    $result = $stmnt->fetchAll();
    $counter = 0;
    echo '
    <div class="modal fade" id="modifyItemModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-lg " style="min-width:1200px ">
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
    while ($counter < count($result)) {
        echo '
                            <form method="post" action="">
                            <tr>
                                <th scope="row">' . $result[$counter]['item_id'] . '</th>
                                <th scope="row">
                                    <input class="form-control" type="text" name="modifyName" value="' . $result[$counter]['name'] . '">
                                </th>
                                <td>
                                    <input class="form-control" type="text" name="modifyStock" value="' . $result[$counter]['stock'] . '">
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="modifyPrice" value="' . $result[$counter]['price'] . '">
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="modifyCat" value="' . $result[$counter]['cat_id'] . '">
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="modifyBrand" value="' . $result[$counter]['brand_id'] . '">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success" name="modify_item" value="'.$result[$counter]['item_id'].'">Submit</button>
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
    if(isset($_POST['modify_item'])){
        $stmt=$pdo->prepare('UPDATE `item` SET name ="'.$_POST['modifyName'].'", stock ="'.$_POST['modifyStock'].'", price="'.$_POST['modifyPrice'].'", cat_id="'.$_POST['modifyCat'].'", brand_id="'.$_POST['modifyBrand'].'" WHERE item_id='.$_POST['modify_item'].'');
        $stmt->execute();
    }

}

