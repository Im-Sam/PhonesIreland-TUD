<?php
include './admin/admin-account/add_admin.php';
include './admin/admin-account/delete_admin.php';
include './admin/admin-account/modify_admin.php';

function read_admin_table(){
    global $pdo;

    $stmnt = $pdo->prepare('SELECT * FROM admin');
    $stmnt->execute();
    $result = $stmnt->fetchAll();   
    $counter =0;
    add_admin_modal();
    modify_admin();
    delete_admin();
    
   
   
    echo '
    
    <div class="modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-white mt-1" id="loginModalLabel">Admin Database Table</h5>
                    <button type="button" class="close text-white" aria-label="Close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-dark">
                <div class="container-fluid mt-2 ">
                <table class="table table-striped table-bordered rounded table-dark bg-dark text-center">
                    <thead>
                        <tr>
                            <th class="text-primary" scope="col">Username</th>
                        </tr>
                    </thead>
                    <tbody>
            
                ';
                while($counter < count($result)){
                    echo'
                    <tr>
                        <th scope="row">'.$result[$counter]['login'].'</th>
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