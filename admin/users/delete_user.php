<?php
function delete_user(){
    global $pdo;

    $stmnt = $pdo->prepare('SELECT * FROM user');
    $stmnt->execute();
    $result = $stmnt->fetchAll();
    $counter = 0;
    echo '
     <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true" data-backdrop="false">
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
                            <form class="" method="post" action="">
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
                    while ($counter < count($result)){
                        echo'
                        <form method="post" action="">
                        <tr>
                        <th scope="row">'.$result[$counter]['user_id'].'</th>
                        <td>'.$result[$counter]['login'].'</th>
                        <td>'.$result[$counter]['firstname'].'</td>
                        <td>'.$result[$counter]['lastname'].'</td>
                        <td>'.$result[$counter]['email'].'</td>
                        <td>'.$result[$counter]['password'].'</td>
                            <td>
                                <button type="submit" class="btn btn-danger" name="remove_user" value="'.$result[$counter]['user_id'].'">Delete</button>
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
    if(isset($_POST['remove_user'])){
        if($_POST['remove_user']!=1){
            $stmt = $pdo->prepare('DELETE FROM user WHERE user_id="'.$_POST['remove_user'].'"');
            $stmt->execute();
        }
        else{
            echo "<script type='text/javascript'>alert('Dont delete the root account moron...')</script>";
        }
    }
}