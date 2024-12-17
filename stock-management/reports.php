<?php
require_once './includes/header.php';
LogInCheck();
require_once './includes/admin_nav.php';
?>

    <form class="navbar-form navbar-left form-inline" role="search">
        <div class="form-group">
            <input type="date" class="form-control" placeholder="Search">
        </div>
        <div class="form-group">
            <input type="text" value="to" disabled>
        </div>
        <div class="form-group">
            <input type="date" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>

<?php require_once './includes/footer.php'; ?>