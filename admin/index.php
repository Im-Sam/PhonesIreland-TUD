<?php
include './admin/items/index_item.php';
include './admin/users/index_user.php';
include './admin/user-carts/index_user-carts.php';
include './admin/item-brand/index_item-brand.php';
include './admin/seller/index_seller.php';
include './admin/admin-account/index_admin.php';
echo '    
<div class="jumbotron jumbotron-fluid rounded mx-md-5 mt-3">
<h1 class="display-10 text-center">Admin Dashboard</h1>
</div>';

read_item_table();
read_user_table();
read_cart_table();
read_item_brand_table();
read_seller_table();
read_admin_table();

?>

<div class="d-flex-inline d-md-flex flex-wrap justify-content-center container mt-5">
    <div class="card m-3" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Items Database</h5>
        </div>
        <div class="card-body border-top text-center mx-auto">
            <div class="row">
                <button class="btn btn-primary m-1" type="button" data-toggle="modal" data-target="#itemModal">
                    Read Table
                </button>
                <button class="btn btn-primary m-1" type="button" data-toggle="modal" data-target="#addItemModal">
                    Create Item
                </button>
            </div>
            <div class="row">
                <button class="btn btn-primary m-1" type="button" data-toggle="modal" data-target="#modifyItemModal">
                    Modify Item
                </button>
                <button class="btn btn-primary m-1" type="button" data-toggle="modal" data-target="#deleteItemModal">
                    Delete Item
                </button>
            </div>
        </div>
    </div>

    <div class="card m-3" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">User Database</h5>
        </div>

        <div class="card-body border-top text-center mx-auto">
            <div class="row">
                <button class="btn btn-primary m-1" type="button" data-toggle="modal" data-target="#userModal">
                    Read Table
                </button>
                <button class="btn btn-primary m-1" type="button" data-toggle="modal" data-target="#createUserModal">
                    Create User
                </button>
            </div>
            <div class="row">
                <button class="btn btn-primary m-1" type="button" data-toggle="modal" data-target="#modifyUserModal">
                    Modify User
                </button>
                <button class="btn btn-primary m-1" type="button" data-toggle="modal" data-target="#deleteUserModal">
                    Delete User
                </button>
            </div>
        </div>
    </div>

    <div class="card m-3" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">User Carts Database</h5>
        </div>
        <div class="card-body border-top text-center mx-auto">
            <div class="row">
                <button class="btn btn-primary m-1" type="button" data-toggle="modal" data-target="#cartModal">
                    Read Table
                </button>
                <button class="btn btn-primary m-1" type="button" data-toggle="modal" data-target="#createUserCartModal">
                    Create Cart
                </button>
            </div>
            <div class="row">
                <button class="btn btn-primary m-1" type="button" data-toggle="modal" data-target="#modifyUserCart">
                    Modify Cart
                </button>
                <button class="btn btn-primary m-1" type="button" data-toggle="modal" data-target="#deleteUserCart">
                    Delete Cart
                </button>
            </div>
        </div>
    </div>

    <div class="card m-3" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Item Brand Database</h5>
        </div>
        <div class="card-body border-top text-center mx-auto">
            <div class="row">
                <button class="btn btn-primary m-1" type="button" data-toggle="modal" data-target="#brandModal">
                    Read Table
                </button>
                <button class="btn btn-primary m-1" type="button" data-toggle="modal" data-target="#createBrandModal">
                    Create Brand
                </button>

            </div>
            <div class="row">
                <button class="btn btn-primary m-1" type="button" data-toggle="modal" data-target="#modifyBrandModal">
                    Modify Brand
                </button>
                <button class="btn btn-primary m-1" type="button" data-toggle="modal" data-target="#deleteBrandModal">
                    Delete Brand
                </button>

            </div>
        </div>
    </div>

    <div class="card m-3" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Seller Accounts Database</h5>
        </div>
        <div class="card-body border-top text-center mx-auto">
            <div class="row">
                <button class="btn btn-primary m-1" type="button" data-toggle="modal" data-target="#sellerModal">
                    Read Table
                </button>
                <button class="btn btn-primary m-1" type="button" data-toggle="modal" data-target="#createSellerModal">
                    Create Seller
                </button>
            </div>
            <div class="row">
                <button class="btn btn-primary m-1" type="button" data-toggle="modal" data-target="#modifySellerModal">
                    Modify Seller
                </button>
                <button class="btn btn-primary m-1" type="button" data-toggle="modal" data-target="#deleteSellerModal">
                    Delete Seller
                </button>
            </div>
        </div>
    </div>

    <div class="card m-3" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Admin Accounts Database</h5>
        </div>
        <div class="card-body border-top text-center mx-auto">
            <div class="row">
                <button class="btn btn-primary m-1" type="button" data-toggle="modal" data-target="#adminModal">
                    Read Table
                </button>
                <button class="btn btn-primary m-1" type="button" data-toggle="modal" data-target="#createAdminModal">
                    Create Admin
                </button>
            </div>
            <div class="row">
                <button class="btn btn-primary m-1" type="button" data-toggle="modal" data-target="#modifyAdminModal">
                    Modify Admin
                </button>
                <button class="btn btn-primary m-1" type="button" data-toggle="modal" data-target="#deleteAdminModal">
                    Delete Admin
                </button>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-striped m-3" style="width: 58rem;">
        <thead>
            <tr>
                <th scope="col">Login Unit Test Cases - Requirement test</th>
                <th scope="col">Success/Fail</th>
                <th scope="col">Test Output</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('./admin/test-cases/login_test.php');
            login_test();
            ?>
        </tbody>
    </table>

    <table class="table table-bordered table-striped m-3" style="width: 58rem;">
        <thead>
            <tr>
                <th scope="col">Create Account Unit Test Cases - Requirement test</th>
                <th scope="col">Success/Fail</th>
                <th scope="col">Test Output</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('./admin/test-cases/create_test.php');
            create_test();
            ?>
        </tbody>
    </table>

    <table class="table table-bordered table-striped m-3" style="width: 58rem;">
        <thead>
            <tr>
                <th scope="col">Add Item to Cart Test Cases - Requirement test</th>
                <th scope="col">Success/Fail</th>
                <th scope="col">Test Output</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('./admin/test-cases/cart_test.php');
            cart_test();
            ?>
        </tbody>
    </table>

    <table class="table table-bordered table-striped m-3" style="width: 58rem;">
        <thead>
            <tr>
                <th scope="col">Add Item to Database Test Cases - Requirement test</th>
                <th scope="col">Success/Fail</th>
                <th scope="col">Test Output</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('./admin/test-cases/add_item_test.php');
            add_item_test();
            ?>
        </tbody>
    </table>

    <table class="table table-bordered table-striped m-3" style="width: 58rem;">
        <thead>
            <tr>
                <th scope="col">Seller Account Test Cases - Requirement test</th>
                <th scope="col">Success/Fail</th>
                <th scope="col">Test Output</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('./admin/test-cases/seller_test.php');
            seller_test();
            ?>
        </tbody>
    </table>

    <table class="table table-bordered table-striped m-3" style="width: 58rem;">
        <thead>
            <tr>
                <th scope="col">Admin Account Test Cases - Requirement test</th>
                <th scope="col">Success/Fail</th>
                <th scope="col">Test Output</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('./admin/test-cases/admin_test.php');
            admin_test();
            ?>
        </tbody>
    </table>
</div>