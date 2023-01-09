<?php
function delete_admin(){
    global $pdo;

    $stmnt = $pdo->prepare('SELECT * FROM admin');
    $stmnt->execute();
    $result = $stmnt->fetchAll();
    $counter = 0;
    echo '
     <div class="modal fade" id="deleteAdminModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true" data-backdrop="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content bg-dark">
                    <div class="modal-header text-center">
                        <h5 class="modal-title text-white mt-1" id="loginModalLabel">Admin Database Table</h5>
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
                            <th class="text-primary" scope="col">Login</th>
                            <th class="text-primary" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                
                    ';
                    while ($counter < count($result)){
                        echo'
                        <tr>
                            <th scope="row">'.$result[$counter]['login'].'</th>
                            <td>
                                <form method="post" action="">
                                    <button type="submit" class="btn btn-danger" name="remove_admin" value="'.$result[$counter]['login'].'">Delete</button>
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