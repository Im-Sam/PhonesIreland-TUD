<nav class="navbar sticky-top navbar-expand-md navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img src="./public/imgs/logo.svg" width="60" height="32" class="d-inline-block align-top" alt="">
        Phones Ireland
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="form" method="post" action=".">
            <div class="d-flex">
                <div class="ml-auto p-2 my-2">
                    <button class="btn btn-primary ml-5 ml-lg-3" type="button" data-toggle="modal" data-target="#loginModal" style="height:40px">
                        Account
                    </button>
                </div>

                <?php
                if (!isset($_POST['logged_in_user'])) {
                    echo '
                    <div class="ml-auto p-2 my-2">
                    <button type="submit" formmethod="post" class="btn btn-success" name="go_create_account" style="height:40px">Create Account</button>
                    </div>
                    ';
                }
                include './includes/loginModal.php';
                ?>
            </div>
        </form>
    </div>
</nav>