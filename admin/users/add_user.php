<?php

function add_user()
{
    echo '

    <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-dark">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-white mt-1" id="loginModalLabel">Items Database Table</h5>
                    <button type="button" class="close text-white" aria-label="Close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-dark">
                <div class="container-fluid mt-2 ">
                <div class="d-flex text-white justify-content-center">
                <form method="post" action="" class="mx-md-5 col-md-12">
                    <div class="form-group">
                        <label for="inputUsername">Username</label>
                        <input type="text" class="form-control" name="createLogin" id="inputUsername" placeholder="Username">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputFirstName">First Name</label>
                            <input type="text" class="form-control" name="firstname" id="inputFirstName" placeholder="John">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputLastName">Last Name</label>
                            <input type="text" class="form-control" name="lastname" id="inputLastName" placeholder="Appleseed">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email Address</label>
                        <input type="email" class="form-control" name="email" id="inputEmail" placeholder="john.appleseed@apple.com">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input type="password" class="form-control" name="createPassword" id="inputPassword" placeholder="">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-25" name="create_user">Sign up</button>
                    </div>
                </form>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    ';
}
