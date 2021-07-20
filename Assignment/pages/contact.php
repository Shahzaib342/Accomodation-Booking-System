<?php
include ('db_conn.php');
include ('session.php');

if($session_id == ""){
    echo "<script type='text/javascript'>alert('You need to login!!');
    window.location='index.php';</script>";
    }

    if(isset($_GET['reply'])) {
        $bid=$_GET['reply'];
        $inboxID=$_GET['inboxid'];
    } else if (isset($_GET['bid'])){
        $bid=$_GET['bid'];
    }
?>

<!DOCTYPE html>

<html>
    
    <header>
        <?php include('../container/header.php') ?>
    </header>
    <body>
        <main>
            <?php include('../container/sidebar.php') ; ?>
            <form method="post" action="../php/update.php?contact">
                <table class="table table-striped" style="width:80%">
                    <!-- Reply -->
                    <?php if(isset($_GET['reply'])) {
                        $sql="SELECT * FROM inbox i 
                                JOIN bookings b ON i.bookingID = b.bid
                                JOIN accommodation a ON b.accomID = a.id
                                JOIN users u ON i.fromID = u.id
                                WHERE i.bookingID = $bid AND i.id=$inboxID";
                        $result = $mysqli->query($sql);
                        $row=$result->fetch_array(MYSQLI_ASSOC);
                        ?>
                        <h5 style="margin-top:10px;">Reply</h5>
                        <input type="hidden" name="fromID" value="<?php echo $session_id ?> " >
                        <input type="hidden" name="toID" value="<?php echo $row['fromID'] ?> " >
                        <input type="hidden" name="bookingID" value="<?php echo $row['bookingID'] ?> " >
                        <input type="hidden" name="msgDetails" 
                            value="<p><b>Re:</b> <?php echo $row['accomAddress'] ?> </p>
                                <p><b>Period:</b> <?php echo $row['bookFrom'] ?> to <?php echo $row['bookTo'] ?></p>" >
                        <tr>
                            <td style="width:30%">Regarding</td>
                            <td><p><?php echo $row['accomAddress'] ?> </p>
                                <p><?php echo $row['bookFrom'] ?> to <?php echo $row['bookTo'] ?></p>
                            </td>
                        </tr>       
                        <tr>
                            <td>To</td>
                            <td><?php echo $row['firstname']." ".$row['lastname'] ?></td>
                        </tr>
                        <tr>
                            <td>Your Message</td>
                            <td><textarea name="message" style="height:20vh;width:100%;"></textarea></td>
                        </tr>   
                        <tr>
                            <td><a href="../pages/inbox.php" class="btn btn-secondary" onclick="return confirm('Cancel?')">Cancel</a></td>
                            <td><button type="submit" class="btn btn-success float-right" onclick="return confirm('Send?')">Send</button></td>
                        </tr>
                    
                    <!-- Reject -->
                    <?php } else if(isset($_GET['reject'])) {
                        $bid = $_GET['reject'];
                        $sql="SELECT * FROM bookings b
                                JOIN accommodation a ON b.accomID = a.id
                                JOIN users u ON b.users = u.id
                                WHERE b.bid = $bid";
                        $result = $mysqli->query($sql);
                        $row=$result->fetch_array(MYSQLI_ASSOC);
                        ?>
                        <h5 style="margin-top:10px;">Reject Reason</h5>
                        <input type="hidden" name="reject" value="yes" >
                        <input type="hidden" name="fromID" value="<?php echo $session_id ?> " >
                        <input type="hidden" name="toID" value="<?php echo $row['users'] ?> " >
                        <input type="hidden" name="bookingID" value="<?php echo $row['bid'] ?> " >
                        <input type="hidden" name="msgDetails" 
                            value="<p><b>REJECT Re:</b> <?php echo $row['accomAddress'] ?> </p>
                                <p><b>Period:</b> <?php echo $row['bookFrom'] ?> to <?php echo $row['bookTo'] ?></p>" >
                        <tr>
                            <td style="width:30%">Regarding</td>
                            <td><p><?php echo $row['accomAddress'] ?> </p>
                                <p><?php echo $row['bookFrom'] ?> to <?php echo $row['bookTo'] ?></p>
                            </td>
                        </tr>       
                        <tr>
                            <td>To</td>
                            <td><?php echo $row['firstname']." ".$row['lastname'] ?></td>
                        </tr>
                        <tr>
                            <td>Your Message</td>
                            <td><textarea name="message" style="height:20vh;width:100%;" required placeholder="Enter your reject reason"></textarea></td>
                        </tr>   
                        <tr>
                            <td><a href="../pages/mybooking.php" class="btn btn-secondary" onclick="return confirm('Cancel?')">Cancel</a></td>
                            <td><button type="submit" class="btn btn-danger float-right" onclick="return confirm('Reject?')">Reject</button></td>
                        </tr>

                    <!-- Message Host -->
                    <?php } else if(isset($_GET['msg']) && $session_access=="3") {
                        $receiverID=$_GET['msg'];
                        $bid=$_GET['bid'];
                        $sql="SELECT *, b.bid bookingID FROM bookings b JOIN accommodation a on b.accomID = a.id
                                JOIN users u on a.hostID = u.id OR b.users = u.id
                                WHERE u.id = $receiverID";
                        $result = $mysqli->query($sql);
                        $row=$result->fetch_array(MYSQLI_ASSOC);
                        ?>
                        <h5 style="margin-top:10px;">Message</h5>
                        <input type="hidden" name="fromID" value="<?php echo $session_id ?> " >
                        <input type="hidden" name="toID" value="<?php echo $receiverID?> " >
                        <input type="hidden" name="bookingID" value="<?php echo $row['bookingID'] ?> " >
                        <input type="hidden" name="msgDetails" 
                            value="<p><b>Re:</b> <?php echo $row['accomAddress'] ?> </p>
                                <p><b>Period:</b> <?php echo $row['bookFrom'] ?> to <?php echo $row['bookTo'] ?></p>" >
                        <tr>
                            <td style="width:30%">Regarding</td>
                            <td><p><?php echo $row['accomAddress'] ?> </p>
                                <p><?php echo $row['bookFrom'] ?> to <?php echo $row['bookTo'] ?></p>
                            </td>
                        </tr>       
                        <tr>
                            <td>Send to</td>
                            <td><?php echo $row['firstname']." ".$row['lastname'] ?></td>
                        </tr>
                        <tr>
                            <td>Your Message</td>
                            <td><textarea name="message" style="height:20vh;width:100%;"></textarea></td>
                        </tr>   
                        <tr>
                            <td><a href="../pages/mybooking.php" class="btn btn-secondary" onclick="return confirm('Cancel?')">Cancel</a></td>
                            <td><button type="submit" class="btn btn-success float-right" onclick="return confirm('Send?')">Send</button></td>
                        </tr>

                    <!-- Message Host -->
                    <?php } else { 
                        $sql="SELECT *, a.hostID receiverID, b.bid bookingID FROM bookings b JOIN accommodation a on b.accomID = a.id
                                JOIN users u on a.hostID = u.id
                                WHERE b.bid = $bid";
                        $result = $mysqli->query($sql);
                        $row=$result->fetch_array(MYSQLI_ASSOC);
                        ?>
                        <h5 style="margin-top:10px;">Message your host</h5>
                        <input type="hidden" name="fromID" value="<?php echo $session_id ?> " >
                        <input type="hidden" name="toID" value="<?php echo $row['receiverID']?> " >
                        <input type="hidden" name="bookingID" value="<?php echo $row['bookingID'] ?> " >
                        <input type="hidden" name="msgDetails" 
                            value="<p><b>Re:</b> <?php echo $row['accomAddress'] ?> </p>
                                <p><b>Period:</b> <?php echo $row['bookFrom'] ?> to <?php echo $row['bookTo'] ?></p>" >
                        <tr>
                            <td style="width:30%">Regarding your stay at</td>
                            <td><p><?php echo $row['accomAddress'] ?> </p>
                                <p><?php echo $row['bookFrom'] ?> to <?php echo $row['bookTo'] ?></p>
                            </td>
                        </tr>       
                        <tr>
                            <td>Host Name</td>
                            <td><?php echo $row['firstname']." ".$row['lastname'] ?></td>
                        </tr>
                        <tr>
                            <td>Your Message</td>
                            <td><textarea name="message" style="height:20vh;width:100%;"></textarea></td>
                        </tr>   
                        <tr>
                            <td><a href="../pages/mybooking.php" class="btn btn-secondary" onclick="return confirm('Cancel?')">Cancel</a></td>
                            <td><button type="submit" class="btn btn-success float-right" onclick="return confirm('Send?')">Send</button></td>
                        </tr>
                    <?php } ?>

                </table>
            </form>
        </main>
    </body>
</html>

