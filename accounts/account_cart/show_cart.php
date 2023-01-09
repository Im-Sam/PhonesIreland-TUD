<?php
include ('./accounts/account_cart/checkout_cart.php');

function show_cart()
{
    global $pdo;
    
    checkout_cart();

    if (isset($_SESSION['logged_in_user'])) {
        $stmnt = $pdo->prepare(
            'SELECT item.*, user_carts.amount from item join user_carts on 
        item.item_id=user_carts.item_id where 
        user_carts.login="' . $_SESSION['logged_in_user'] . '"'
        );
        $stmnt->execute();
        $result = $stmnt->fetchAll();   
        echo '
        <div class="container-fluid w-75 mt-3">
        <table class="table table-striped rounded table-dark text-center">
            <thead>
                <tr>
                    <th class="text-primary" scope="col">Name</th>
                    <th class="text-primary" scope="col">Price ($)</th>
                    <th class="text-primary" scope="col">Amount</th>
                    <th class="text-danger" scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
        ';
        $counter=0;
        $totalCost = 0;
        $totalAmount = 0;
        while ($counter < count($result)){
            echo'
            <tr>
                <th scope="row">'.$result[$counter]['name'].'</th>
                <td>$'.$result[$counter]['price']*$result[$counter]['amount'].'</td>
                <td>'.$result[$counter]['amount'].'</td>
                <td>
                    <form method="post" action="">
                        <button type="submit" class="btn btn-danger" name="remove_cart" value="'.$result[$counter]['item_id'].'">Delete</button>
                    </form>
                </td>
            </tr>          
            ';
            $totalCost = $totalCost + $result[$counter]['price']*$result[$counter]['amount'];
            $totalAmount = $totalAmount + $result[$counter]['amount'];
            $counter++;
        }
        echo'
            <tr>
                <td class="bg-secondary text-white font-weight-bold">Totals: </td>
                <td class="bg-secondary text-white font-weight-bold">$'.$totalCost.'</td>
                <td class="bg-secondary text-white font-weight-bold">'.$totalAmount.'</td>
                <td class="bg-secondary text-white font-weight-bold">
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#checkoutModal">
                        Checkout
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
        </div>
        ';
    }
}
