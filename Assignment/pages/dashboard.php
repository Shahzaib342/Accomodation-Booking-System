<?php
include('db_conn.php');
include('session.php');
if (!isset($session_id) || $session_id == "" || !isset($session_access) || $session_access == "")
    echo "<script type='text/javascript'>alert('You are not allowed to access this page.');
    window.location='index.php';</script>";
else if (!isset($mysqli))
    echo "<script type='text/javascript'>alert('Database Connection failed.');
    window.location='index.php';</script>";
else
    $dashboard = $session_access == "1" ? "Client" : ($session_access == "2" ? "Host" : "System Manager");
?>

<!DOCTYPE html>
<html>
<header>
    <?php include('../container/header.php');
    include('../container/sidebar.php') ?>
</header>
<body>
<main>
    <table class="table table-striped" style="margin-left:auto;margin-right:auto; width: 40%">
        <h5 style="text-align:center"><?php echo $dashboard ?> Dashboard</h5>
        <!-- FOR HOST -->
        <?php if ($session_access == "2") { ?>
            <tr>
                <td style="width:75%">Total Houses</td>
                <?php $query = "SELECT count(id) countid FROM accommodation WHERE hostID=$session_id AND active = 1";
                $result = $mysqli->query($query);
                $row = $result->fetch_array(MYSQLI_ASSOC);
                $sum = $row['countid'];
                ?>
                <td><a href="mylistings.php"><?php echo $sum ?></a></td>
            </tr>
            <tr>
                <td>Review rating</td>
                <?php $query = "SELECT avg(hostRating) avghostRating FROM reviews WHERE hostID=$session_id";
                $result = $mysqli->query($query);
                $row = $result->fetch_array(MYSQLI_ASSOC);
                $sum = $row['avghostRating'];
                ?>
                <td><a href="myreviews.php"><?php echo round($sum, 2) ?></a></td>
            </tr>
            <tr>
                <td>Total Reviews received</td>
                <?php $query = "SELECT count(id) countid FROM reviews WHERE hostID=$session_id";
                $result = $mysqli->query($query);
                $row = $result->fetch_array(MYSQLI_ASSOC);
                $sum = $row['countid'];
                ?>
                <td><a href="myreviews.php"><?php echo $sum ?></a></td>
            </tr>
            <tr>
                <td>Total requests (excl rejected/cancelled)</td>
                <?php $query = "SELECT count(id) countid FROM bookings b
                                JOIN accommodation a ON b.accomID = a.id
                                WHERE hostID=$session_id AND (NOT bstatus='rejected' AND NOT bstatus='cancelled')";
                $result = $mysqli->query($query);
                $row = $result->fetch_array(MYSQLI_ASSOC);
                $sum = $row['countid'];
                ?>
                <td><a href="mybooking.php"><?php echo $sum ?></a></td>
            </tr>
            <tr>
                <td>New requests</td>
                <?php $query = "SELECT count(id) countid FROM bookings b
                                JOIN accommodation a ON b.accomID = a.id
                                WHERE hostID=$session_id AND bstatus='pending'";
                $result = $mysqli->query($query);
                $row = $result->fetch_array(MYSQLI_ASSOC);
                $sum = $row['countid'];
                ?>
                <td><a href="mybooking.php"><?php echo $sum ?></a></td>
            </tr>
            <!-- FOR System manager -->
        <?php } else if ($session_access == "3") {
            require 'system-manager/dashboard.php';
        } ?>
        <!-- End -->
    </table>
</main>
</body>
</html>