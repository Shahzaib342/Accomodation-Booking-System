<?php
include('db_conn.php');
include('session.php');
if (!isset($session_id) || !isset($session_access) || $session_access == "" || $session_id == "")
    echo "<script type='text/javascript'>alert('You are not allowed to access this page.');
    window.location='index.php';</script>";
else if (!isset($mysqli))
    echo "<script type='text/javascript'>alert('Database Connection failed.');
    window.location='index.php';</script>";
?>

<!DOCTYPE html>
<html>
<header>
    <?php include('../container/header.php') ?>
</header>
<body>
<main>
    <?php include('../container/sidebar.php');
    //If user is a host
    if ($session_access == '2') { ?>
        <table class="table table-striped">
            <h5 style="margin-top:10px;">Pending Bookings</h5>
            <tr>
                <th style="width:30vh">Accommodation</th>
                <th>Book From</th>
                <th>Book To</th>
                <th>Guest Name</th>
                <th>Guests</th>
                <th>Price</th>
                <th>Confirm</th>
                <th>Reject</th>
            </tr>
            <tr>
                <?php $query = "SELECT * FROM `bookings` JOIN accommodation
                                        ON accomID = accommodation.id
                                        WHERE accommodation.hostID=$session_id AND bstatus='pending'";
                $result = $mysqli->query($query);
                while ($row = mysqli_fetch_array($result)){
                $id = $row['users'];
                ?>
                <td><?php echo $row['accomAddress']; ?></td>
                <td><?php echo $row['bookFrom']; ?></td>
                <td><?php echo $row['bookTo']; ?></td>
                <td><?php
                    $query = "SELECT firstname, lastname FROM users WHERE id=$id";
                    $result1 = $mysqli->query($query);
                    $row1 = $result1->fetch_array(MYSQLI_ASSOC);
                    echo $row1['firstname'] . " " . $row1['lastname']; ?></td>
                <td><?php echo $row['noofguests']; ?></td>
                <td><?php echo $row['totalprice']; ?></td>
                <td><a href="../php/update.php?confirm=<?php echo $row['bid']; ?>" class="btn btn-success"
                       onclick="return confirm('Confirm booking?')">Confirm</a></td>
                </td>
                <td><a href="../pages/contact.php?reject=<?php echo $row['bid']; ?>" class="btn btn-danger">Reject</a>
                </td>
                </td>
            </tr>
            <?php } ?>
            </tr>
        </table>
        <table class="table table-striped">
            <h5 style="margin-top:10px;">Confirmed Bookings</h5>
            <tr>
                <th style="width:30vh">Accommodation</th>
                <th>Book From</th>
                <th>Book To</th>
                <th>Guest Name</th>
                <th>Guests</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
            <tr>
                <?php $query = "SELECT * FROM `bookings` JOIN accommodation
                                        ON accomID = accommodation.id
                                        WHERE accommodation.hostID=$session_id AND (bstatus='confirmed' OR bstatus='paid' OR bstatus='reviewed')";
                $result = $mysqli->query($query);
                while ($row = mysqli_fetch_array($result)){
                $id = $row['users'];
                ?>
                <td><?php echo $row['accomAddress']; ?></td>
                <td><?php echo $row['bookFrom']; ?></td>
                <td><?php echo $row['bookTo']; ?></td>
                <td><?php
                    $query = "SELECT firstname, lastname FROM users WHERE id=$id";
                    $result1 = $mysqli->query($query);
                    $row1 = $result1->fetch_array(MYSQLI_ASSOC);
                    echo $row1['firstname'] . " " . $row1['lastname']; ?></td>
                <td><?php echo $row['noofguests']; ?></td>
                <td><?php echo $row['totalprice']; ?></td>
                <td><?php echo ucwords($row['bstatus']); ?></td>
            </tr>
            <?php } ?>
            </tr>
        </table>
        <!--If user is a client -->
    <?php } else if ($session_access == '1') { ?>
        <table class="table table-striped">
            <h5 style="margin-top:10px;">Requested Bookings</h5>
            <tr>
                <th style="width:30vh">Accommodation</th>
                <th>Book From</th>
                <th>Book To</th>
                <th>Guests</th>
                <th>Price</th>
                <th>Status</th>
                <th>Cancel Booking</th>
                <th>Contact Host</th>
            </tr>
            <tr>
                <?php $query = "SELECT * FROM `bookings` JOIN accommodation
                                        ON accomID = accommodation.id
                                        WHERE bookings.users=$session_id AND bstatus='pending'";
                $result = $mysqli->query($query);
                while ($row = mysqli_fetch_array($result)){
                ?>
                <td><?php echo $row['accomAddress']; ?></td>
                <td><?php echo $row['bookFrom']; ?></td>
                <td><?php echo $row['bookTo']; ?></td>
                <td><?php echo $row['noofguests']; ?></td>
                <td><?php echo $row['totalprice']; ?></td>
                <td><?php echo ucwords($row['bstatus']); ?></td>
                <td><a href="../php/update.php?cancel=<?php echo $row['bid']; ?>" class="btn btn-danger"
                       onclick="return confirm('Do you want to cancel booking?')">Cancel</a></td>
                </td>
                <td><a href="../pages/contact.php?bid=<?php echo $row['bid']; ?>" class="btn btn-primary">Contact</a>
                </td>
                </td>
            </tr>
            <?php } ?>
            </tr>
        </table>
        <table class="table table-striped">
            <h5 style="margin-top:30px;">Confirmed Bookings</h5>
            <tr>
                <th style="width:30vh">Accommodation</th>
                <th>Book From</th>
                <th>Book To</th>
                <th>Guests</th>
                <th>Price</th>
                <th>Status</th>
                <th>Pay</th>
                <th>Cancel Booking</th>
                <th>Contact Host</th>
            </tr>
            <tr>
                <?php $query = "SELECT * FROM `bookings` JOIN accommodation
                                        ON accomID = accommodation.id
                                        WHERE bookings.users=$session_id AND (bstatus='confirmed')";
                $result = $mysqli->query($query);
                while ($row = mysqli_fetch_array($result)){
                $id = $row['users'];
                ?>
                <td><?php echo $row['accomAddress']; ?></td>
                <td><?php echo $row['bookFrom']; ?></td>
                <td><?php echo $row['bookTo']; ?></td>
                <td><?php echo $row['noofguests']; ?></td>
                <td><?php echo $row['totalprice']; ?></td>
                <td><?php echo ucwords($row['bstatus']); ?></td>
                <?php if ($row['bstatus'] != "paid") { ?>
                    <td>
                        <a href="../pages/payment.php?bid=<?php echo $row['bid']; ?>&amount=<?php echo $row['totalprice']; ?>"
                           class="btn btn-success" onclick="return confirm('Pay for booking?')">Pay</a></td>
                    <td><a href="../php/update.php?cancel=<?php echo $row['bid']; ?>" class="btn btn-danger"
                           onclick="return confirm('Do you want to cancel booking?')">Cancel</a></td>
                <?php } ?>
                <td><a href="../pages/contact.php?bid=<?php echo $row['bid']; ?>" class="btn btn-primary">Contact</a>
                </td>
                </td>
            </tr>
            <?php } ?>
            </tr>
        </table>
        <table class="table table-striped">
            <h5 style="margin-top:30px;">Paid Bookings</h5>
            <tr>
                <th style="width:30vh">Accommodation</th>
                <th>Book From</th>
                <th>Book To</th>
                <th>Guests</th>
                <th>Price</th>
                <th>Status</th>
                <th>Review</th>
            </tr>
            <tr>
                <?php $query = "SELECT * FROM `bookings` JOIN accommodation
                                        ON accomID = accommodation.id
                                        WHERE bookings.users=$session_id AND (bstatus='paid' OR bstatus='reviewed')";
                $result = $mysqli->query($query);
                while ($row = mysqli_fetch_array($result)){
                $accomID = $row['id'];
                ?>
                <td><?php echo $row['accomAddress']; ?></td>
                <td><?php echo $row['bookFrom']; ?></td>
                <td><?php echo $row['bookTo']; ?></td>
                <td><?php echo $row['noofguests']; ?></td>
                <td><?php echo $row['totalprice']; ?></td>
                <td><?php echo ucwords($row['bstatus']); ?></td>
                <td>
                    <?php if ($row['bstatus'] == "reviewed") {
                    } else { ?>
                    <a href="../pages/review.php?accomID=<?php echo $accomID ?>&hostID=<?php echo $row['hostID'] ?>&bid=<?php echo $row['bid'] ?>&accomAddress=<?php echo $row['accomAddress']; ?>&bookFrom=<?php echo $row['bookFrom']; ?>&bookTo=<?php echo $row['bookTo']; ?>&noofguests=<?php echo $row['noofguests']; ?>&totalprice=<?php echo $row['totalprice']; ?>"
                       class="btn btn-success">Review</a></td>
                </td>
            <?php } ?>
            </tr>
            <?php } ?>
            </tr>
        </table>
        <table class="table table-striped">
            <h5 style="margin-top:30px;">Cancelled/Rejected Bookings</h5>
            <tr>
                <th style="width:30vh">Accommodation</th>
                <th>Book From</th>
                <th>Book To</th>
                <th>Guests</th>
                <th>Price</th>
                <th>Status</th>
                <th>Reason</th>
            </tr>
            <tr>
                <?php $query = "SELECT * FROM `failedbooking` JOIN accommodation
                                        ON accomID = accommodation.id
                                        WHERE failedbooking.users=$session_id AND (bstatus='rejected' OR bstatus='cancelled')";
                $result = $mysqli->query($query);
                while ($row = mysqli_fetch_array($result)){
                ?>
                <td><?php echo $row['accomAddress']; ?></td>
                <td><?php echo $row['bookFrom']; ?></td>
                <td><?php echo $row['bookTo']; ?></td>
                <td><?php echo $row['noofguests']; ?></td>
                <td><?php echo $row['totalprice']; ?></td>
                <td><?php echo ucwords($row['bstatus']); ?></td>
                <td><?php echo $row['comments']; ?></td>
            </tr>
            <?php } ?>
            </tr>
        </table>
        <!-- IF USER IS System Manager -->
    <?php } else if ($session_access == '3') { ?>
        <table class="table table-striped">
            <h5 style="margin-top:10px;">Active Bookings</h5>
            <tr>
                <th style="width:30vh">Accommodation</th>
                <th>Book From</th>
                <th>Book To</th>
                <th>Guest Name</th>
                <th>Guests</th>
                <th>Price</th>
                <th>Booking Status</th>
                <th>Payment Status</th>
                <th>Cancel Booking</th>
                <th>Message Host</th>
                <th>Message Client</th>
            </tr>
            <tr>
                <?php $query = "SELECT * FROM bookings JOIN accommodation
                                        ON accomID = accommodation.id
                                        WHERE NOT bstatus='cancelled' AND NOT bstatus='rejected'";
                $result = $mysqli->query($query);
                while ($row = mysqli_fetch_array($result)){
                $id = $row['users'];
                ?>
                <td><?php echo $row['accomAddress']; ?></td>
                <td><?php echo $row['bookFrom']; ?></td>
                <td><?php echo $row['bookTo']; ?></td>
                <td><?php
                    $query = "SELECT firstname, lastname FROM users WHERE id=$id";
                    $result1 = $mysqli->query($query);
                    $row1 = $result1->fetch_array(MYSQLI_ASSOC);
                    echo $row1['firstname'] . " " . $row1['lastname']; ?></td>
                <td><?php echo $row['noofguests']; ?></td>
                <td><?php echo $row['totalprice']; ?></td>
                <td><?php if ($row['bstatus'] == 'paid') {
                        echo "Confirmed";
                    } else {
                        echo ucwords($row['bstatus']);
                    } ?></td>
                <td><?php if ($row['bstatus'] == 'paid' or $row['bstatus'] == 'reviewed') {
                        echo "Paid";
                    } else {
                        echo "Unpaid";
                    } ?></td>
                <td><a href="../php/update.php?cancel=<?php echo $row['bid']; ?>" class="btn btn-danger"
                       onclick="return confirm('Do you want to cancel booking?')">Cancel</a></td>
                <td><a href="../pages/contact.php?msg=<?php echo $row['hostID']; ?>&bid=<?php echo $row['bid'] ?>"
                       class="btn btn-primary">Message</a></td>
                <td><a href="../pages/contact.php?msg=<?php echo $row['users']; ?>&bid=<?php echo $row['bid'] ?>"
                       class="btn btn-primary">Message</a></td>
            </tr>
            <?php } ?>
            </tr>
        </table>
        <table class="table table-striped">
            <h5 style="margin-top:10px;">Cancelled/Rejected Bookings</h5>
            <tr>
                <th style="width:30vh">Accommodation</th>
                <th>Book From</th>
                <th>Book To</th>
                <th>Guest Name</th>
                <th>Guests</th>
                <th>Price</th>
                <th>Booking Status</th>
                <th>Reject Reason</th>
                <th>Message Host</th>
                <th>Message Client</th>
            </tr>
            <tr>
                <?php $query = "SELECT * FROM failedbooking JOIN accommodation
                                        ON accomID = accommodation.id";
                $result = $mysqli->query($query);
                while ($row = mysqli_fetch_array($result)){
                $id = $row['users'];
                ?>
                <td><?php echo $row['accomAddress']; ?></td>
                <td><?php echo $row['bookFrom']; ?></td>
                <td><?php echo $row['bookTo']; ?></td>
                <td><?php
                    $query = "SELECT firstname, lastname FROM users WHERE id=$id";
                    $result1 = $mysqli->query($query);
                    $row1 = $result1->fetch_array(MYSQLI_ASSOC);
                    echo $row1['firstname'] . " " . $row1['lastname']; ?></td>
                <td><?php echo $row['noofguests']; ?></td>
                <td><?php echo $row['totalprice']; ?></td>
                <td><?php echo ucwords($row['bstatus']); ?></td>
                <td><?php echo $row['comments'] ?></td>
                <td><a href="../pages/contact.php?msg=<?php echo $row['hostID']; ?>&bid=<?php echo $row['bid'] ?>"
                       class="btn btn-primary">Message</a></td>
                <td><a href="../pages/contact.php?msg=<?php echo $row['users']; ?>&bid=<?php echo $row['bid'] ?>"
                       class="btn btn-primary">Message</a></td>
            </tr>
            <?php } ?>
            </tr>
        </table>
    <?php } ?>
</main>
</body>
</html>
