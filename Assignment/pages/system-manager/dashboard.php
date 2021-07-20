<?php
if (!isset($mysqli) || !isset($session_access))
    die('You are at wrong place');
else if ($session_access != "3")
    die('You are at wrong place');


//get the number of all shared houses
$query = "SELECT count(id) countid FROM accommodation WHERE active=1";
$result = $mysqli->query($query)->fetch_array(MYSQLI_ASSOC);
$total_shared_houses = $result['countid'];

//get total number of reviews
$query = "SELECT count(id) countid FROM reviews";
$result = $mysqli->query($query)->fetch_array(MYSQLI_ASSOC);
$total_reviews = $result['countid'];

//get new booking requests
$query = "SELECT count(bid) countid FROM bookings b WHERE bstatus='pending'";
$result = $mysqli->query($query)->fetch_array(MYSQLI_ASSOC);
$new_requests = $result['countid'];

//get total number of booking
$query = "SELECT count(bid) countid FROM bookings";
$result = $mysqli->query($query)->fetch_array(MYSQLI_ASSOC);
$total_requests = $result['countid'];

//get total confirmed but un-paid requests
$query = "SELECT count(bid) countid FROM bookings b WHERE bstatus='confirmed'";
$result = $mysqli->query($query)->fetch_array(MYSQLI_ASSOC);
$confirmed_requests = $result['countid'];

//get total confirmed but paid requests
$query = "SELECT count(bid) countid FROM bookings b WHERE bstatus='paid'";
$result = $mysqli->query($query)->fetch_array(MYSQLI_ASSOC);
$paid_requests = $result['countid'];

//get total number of hosts users
$query = "SELECT count(id) countid FROM users WHERE access='2' and active = 1";
$result = $mysqli->query($query)->fetch_array(MYSQLI_ASSOC);
$total_hosts = $result['countid'];

//get total number of client users
$query = "SELECT count(id) countid FROM users WHERE access='1' and active = 1";
$result = $mysqli->query($query)->fetch_array(MYSQLI_ASSOC);
$total_clients = $result['countid'];

//get total number of users
$query = "SELECT count(id) countid FROM users WHERE active = 1";
$result = $mysqli->query($query)->fetch_array(MYSQLI_ASSOC);
$total_users = $result['countid'];

?>

<tr>
    <td style="width:75%">Total Shared Houses</td>
    <td><a href="mylistings.php"><?php echo $total_shared_houses ?></a></td>
</tr>
<tr>
    <td>Total Reviews</td>
    <td><a href="myreviews.php"><?php echo $total_reviews ?></a></td>
</tr>
<tr>
    <td>Total New requests</td>
    <td><a href="mybooking.php"><?php echo $new_requests ?></a></td>
</tr>
<tr>
    <td>Total requests</td>
    <td><a href="mybooking.php"><?php echo $total_requests ?></a></td>
</tr>
<tr>
    <td>Total Confirmed requests</td>
    <td><a href="mybooking.php"><?php echo $confirmed_requests ?></a></td>
</tr>
<tr>
    <td>Total Paid requests</td>
    <td><a href="mybooking.php"><?php echo $paid_requests ?></a></td>
</tr>
<tr>
    <td>Total Hosts</td>
    <td><a href="editusers.php"><?php echo $total_hosts ?></a></td>
</tr>
<tr>
    <td>Total Clients</td>
    <td><a href="editusers.php"><?php echo $total_clients ?></a></td>
</tr>
<tr>
    <td>Total Users</td>
    <td><a href="editusers.php"><?php echo $total_users ?></a></td>
</tr>