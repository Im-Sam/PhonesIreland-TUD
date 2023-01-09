<?php
include './admin/users/add_user.php';
include './admin/users/delete_user.php';
include './admin/users/modify_user.php';

function read_user_table(){
    global $pdo;

    $stmnt = $pdo->prepare('SELECT * FROM user');
    $stmnt->execute();
    $result = $stmnt->fetchAll();   
    $counter =0;
    add_user();
    modify_user();
    delete_user();
    echo '
    
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-lg" style="min-width:1200px">
            <div class="modal-content bg-dark">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-white mt-1" id="loginModalLabel">User Database Table</h5>
                    <button type="button" class="close text-white" aria-label="Close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-dark">
                <div class="container-fluid mt-2 ">
                <table class="table table-striped table-bordered rounded table-dark bg-dark text-center">
                    <thead>
                        <tr>
                            <th class="text-primary" scope="col">User ID</th>
                            <th class="text-primary" scope="col">Login</th>
                            <th class="text-primary" scope="col">First Name </th>
                            <th class="text-primary" scope="col">Last Name </th>
                            <th class="text-primary" scope="col">Email</th>
                            <th class="text-primary" scope="col">Password Hash</th>
                            <th class="text-primary" scope="col">Last Seen</th>
                        </tr>
                    </thead>
                    <tbody>
            
                ';
                while($counter < count($result)){
                    echo'
                    <tr>
                        <th scope="row">'.$result[$counter]['user_id'].'</th>
                        <td>'.$result[$counter]['login'].'</td>
                        <td>'.$result[$counter]['firstname'].'</td>
                        <td>'.$result[$counter]['lastname'].'</td>
                        <td>'.$result[$counter]['email'].'</td>
                        <td>'.$result[$counter]['password'].'</td>
                        <td>'.$result[$counter]['last_logged'].'</td>
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