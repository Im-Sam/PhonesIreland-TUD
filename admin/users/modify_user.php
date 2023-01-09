<?php

function modify_user()
{
    global $pdo;

    $stmnt = $pdo->prepare('SELECT * FROM user');
    $stmnt->execute();
    $result = $stmnt->fetchAll();
    $counter = 0;

    echo '
        
        <div class="modal fade" id="modifyUserModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true" data-backdrop="false">
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
    while ($counter < count($result)) {
        echo '                          
        <form method="post" action="">
        <tr>
            <th scope="row">' . $result[$counter]['user_id'] . '</th>
            <th scope="row">
                <input class="form-control" type="text" name="modifyLogin" value="' . $result[$counter]['login'] . '">
            </th>
            <td>
                <input class="form-control" type="text" name="modifyFirstName" value="' . $result[$counter]['firstname'] . '">
            </td>
            <td>
                <input class="form-control" type="text" name="modifyLastName" value="' . $result[$counter]['lastname'] . '">
            </td>
            <td>
                <input class="form-control" type="text" name="modifyEmail" value="' . $result[$counter]['email'] . '">
            </td>
            <td>
                <input class="form-control" type="text" name="modifyPassword" value="' . $result[$counter]['password'] . '">
            </td>
            <td>
                <button type="submit" class="btn btn-success" name="modifyUser" value="' . $result[$counter]['user_id'] . '">Submit</button>
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
    if (isset($_POST['modifyUser'])) {
        if($_POST['modifyUser']!=1) {
            $stmt = $pdo->prepare('UPDATE `user` SET login ="' . $_POST['modifyLogin'] . '", firstname ="' . $_POST['modifyFirstName'] . '", lastname="' . $_POST['modifyLastName'] . '", email="' . $_POST['modifyEmail'] . '", password="' . $_POST['modifyPassword'] . '" WHERE user_id=' . $_POST['modifyUser'] . '');
            $stmt->execute();
        }
        else{
            echo "<script type='text/javascript'>alert('Cannot modify root account!')</script>";
        }
    }
}
