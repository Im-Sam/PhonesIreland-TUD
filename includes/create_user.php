<div class="container-fluid mt-5 ">
    <div class="page-header">
        <h1 class="display-10 text-center">Create an Account</h1>
    </div>
    <div class="d-flex justify-content-center">
    <form method="post" action="" class="mx-md-5 col-md-6">
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