<?php
include './admin/item-brand/add_item-brand.php';
include './admin/item-brand/modify_item-brand.php';
include './admin/item-brand/delete_item-brand.php';
function read_item_brand_table()
{
    global $pdo;

    $stmnt = $pdo->prepare('SELECT * FROM item_brand');
    $stmnt->execute();
    $result = $stmnt->fetchAll();
    $counter = 0;
    add_item_brand_modal();
    modify_Brand();
    delete_item_brand();

    echo '
    <div class="modal fade" id="brandModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true" data-backdrop="false">
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
                            </tr>
                        </thead>
                        <tbody>
                
                    ';
            while ($counter < count($result)) {
                echo '
                        <tr>
                            <td>' . $result[$counter]['name'] . '</td>
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