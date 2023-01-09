<nav class="navbar-expand-md navbar-light bg-light rounded border-bottom p-2 pl-3">
    <div class="navbar-toggler border-0">
        <button class="btn" type="button" data-toggle="collapse" data-target="#contentNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <p class="navbar-brand float-right my-1">
            Menu
        </p>
    </div>
    <div class="collapse navbar-collapse justify-content-center" id="contentNavbar">
        <form method="GET" action=".">
            <ul class="navbar-nav">
                <li class="nav-item my-3">
                    <input type="submit" class="nav-link active mx-2 px-4" name="navlink" value="Home">
                </li>
                <li class="nav-item my-3">
                    <input type="submit" class="nav-link active mx-2 px-4" name="navlink" value="Store">
                </li>
                <?php
                if (isset($_SESSION['logged_in_user'])) {
                    echo'
                    <li class="nav-item my-3">
                        <input type="submit" class="nav-link active mx-2 px-4" name="navlink" value="Cart">
                    </li>
                    ';
                    if (check_seller() && check_admin()) {
                        echo '
                    <li class="nav-item my-3">
                        <input type="submit" class="nav-link active mx-2 px-4" name="navlink" value="Create Product">
                    </li>
                    <li class="nav-item my-3">
                        <input type="submit" class="nav-link active mx-2 px-4" name="navlink" value="Admin">
                    </li>
                    ';
                    } else if (check_seller()) {
                        echo '
                    <li class="nav-item my-3">
                    <input type="submit" class="nav-link active mx-2 px-4" name="navlink" value="Create Product">
                    </li>
                    ';
                    } else if (check_admin()) {
                        echo '
                    <li class="nav-item my-3">
                    <input type="submit" class="nav-link active mx-2 px-4" name="navlink" value="Admin">
                    </li>
                    ';
                    }
                }
                ?>
            </ul>
        </form>
    </div>
</nav>