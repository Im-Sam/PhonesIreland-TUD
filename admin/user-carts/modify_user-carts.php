<?php
function modify_cart(){
    global $pdo;

    $stmnt = $pdo->prepare('SELECT * FROM user_carts');
    $stmnt->execute();
    $result = $stmnt->fetchAll();
    $counter = 0;
    echo '
     <div class="modal fade" id="modifyUserCart" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true" data-backdrop="false">
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
                            <form class="" method="post" action="">
                                <table class="table table-striped table-bordered rounded table-dark bg-dark text-center">
                                    <thead>
                                        <tr>
                                            <th class="text-primary" scope="col">Cart ID</th>
                                            <th class="text-primary" scope="col">Login</th>
                                            <th class="text-primary" scope="col">item_id</th>
                                            <th class="text-primary" scope="col">amount</th>
                                            <th class="text-primary" scope="col"></th>
                                        </tr>
                                    </thead>
                                <tbody>
                
                    ';
            while ($counter < count($result)) {
                echo'
                <form method="post" action="">
                <tr>
                    <th scope="row">' . $result[$counter]['cart_id'] . '</th>
                    <th scope="row">
                        <input class="form-control" type="text" name="modifyCartLogin" value="' . $result[$counter]['login'] . '">
                    </th>
                    <td>
                        <input class="form-control" type="text" name="modifyCartItemID" value="' . $result[$counter]['item_id'] . '">
                    </td>
                    <td>
                        <input class="form-control" type="text" name="modifyCartAmount" value="' . $result[$counter]['amount'] . '">
                    </td>
                    <td>
                        <button type="submit" class="btn btn-success" name="modifyCart" value="' . $result[$counter]['cart_id'] . '">Submit</button>
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
    if(isset($_POST['modifyCart'])){
        $stmt=$pdo->prepare('UPDATE `user_carts` SET  login="'.$_POST['modifyCartLogin'].'", item_id ="'.$_POST['modifyCartItemID'].'", amount="'.$_POST['modifyCartAmount'].'" WHERE cart_id='.$_POST['modifyCart'].'');
        $stmt->execute();
    }
}