<?php
include 'add_item.php';
include 'modify_item.php';
include 'delete_item.php';

function read_item_table()
{
    global $pdo;

    $stmnt = $pdo->prepare('SELECT * FROM item');
    $stmnt->execute();
    $result = $stmnt->fetchAll();
    $counter = 0;
    add_item_modal();
    modify_item();
    delete_item();


    echo '
    <div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-lg">
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
                            </tr>
                        </thead>
                        <tbody>
                
                    ';
            while ($counter < count($result)) {
                echo '
                        <tr>
                            <th scope="row">' . $result[$counter]['item_id'] . '</th>
                            <td>' . $result[$counter]['name'] . '</td>
                            <td>' . $result[$counter]['stock'] . '</td>
                            <td>' . $result[$counter]['price'] . '</td>
                            <td>' . $result[$counter]['cat_id'] . '</td>
                            <td>' . $result[$counter]['brand_id'] . '</td>
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