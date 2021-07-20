<!-- Side navigation -->
<div class="sidenav d-flex flex-column p-3 text-white bg-dark">
    <div class="navbar-nav mr-auto sidebar">
        <?php if (!isset($session_access) || $session_access == "" || $session_access == "1") { ?>
            <a class="nav-item nav-link" href="accountpage.php">Account Details</a>
            <a class="nav-item nav-link" href="inbox.php">Inbox</a>
            <a class="nav-item nav-link" href="myreviews.php">My reviews</a>
            <a class="nav-item nav-link" href="mybooking.php">My bookings</a>
        <?php } ?>
        <?php if ($session_access == "2") { ?>
            <a class="nav-item nav-link" href="dashboard.php">Dashboard</a>
            <a class="nav-item nav-link" href="mylistings.php">House List</a>
            <a class="nav-item nav-link" href="mybooking.php">Booking List</a>
            <div class="dropdown-divider"></div>
            <a class="nav-item nav-link" href="accountpage.php">Account Details</a>
            <a class="nav-item nav-link" href="inbox.php">Inbox</a>
            <a class="nav-item nav-link" href="myreviews.php">My reviews</a>
        <?php } else if ($session_access == "3") { ?>
            <a class="nav-item nav-link" href="dashboard.php">Dashboard</a>
            <a class="nav-item nav-link" href="mylistings.php">House List</a>
            <a class="nav-item nav-link" href="mybooking.php">Booking List</a>
            <a class="nav-item nav-link" href="allmessages.php">Inbox List</a>
            <a class="nav-item nav-link" href="editusers.php">User List</a>
            <a class="nav-item nav-link" href="myreviews.php">Reviews List</a>
            <div class="dropdown-divider"></div>
            <a class="nav-item nav-link" href="accountpage.php">Account Details</a>
            <a class="nav-item nav-link" href="inbox.php">My Inbox</a>
        <?php } ?>
    </div>
</div>