<?php
include('db_conn.php');
include('session.php');
if (!isset($session_id) || !isset($session_access) || $session_id == "" || $session_access == "")
    echo "<script type='text/javascript'>alert('You are not allowed to access this page.');
    window.location='index.php';</script>";
?>

<!DOCTYPE html>
<html>
<header>
    <?php include('../container/header.php') ?>
</header>
<body>
<main>
    <?php include('../container/sidebar.php') ?>
    <h5 style="margin-top:10px;">Message Received</h5>
    <table class="table table-striped">
        <tr>
            <th>Mark as read</th>
            <th style="width:120px;">Time</th>
            <th style="width:150px">From</th>
            <th>Message</th>
            <th>Reply</th>
        </tr>
        <tr>
            <?php $query = "SELECT firstname,lastname,msg,fromID,inputTime,bookingID,inbox.id inboxid,mread
                            FROM inbox JOIN users ON inbox.toID=users.ID 
                            WHERE toID=$session_id ORDER BY inputTime DESC";
            $result = $mysqli->query($query);
            while ($row = mysqli_fetch_array($result)){
            $id = $row['fromID'];
            ?>
            <td>
                <?php if ($row['mread'] == "unread") { ?>
                    <a href="../php/update.php?mark=<?php echo $row['inboxid'] ?>" class="btn btn-secondary">Mark</a>
                <?php } else {
                    echo "Read";
                } ?>
            </td>
            <td><?php echo $row['inputTime']; ?></td>
            <td>
                <?php
                $query = "SELECT firstname, lastname FROM users WHERE id=$id";
                $result1 = $mysqli->query($query);
                $row1 = $result1->fetch_array(MYSQLI_ASSOC);
                echo $row1['firstname'] . " " . $row1['lastname']; ?></td>
            <td><?php echo $row['msg']; ?></td>
            <td><a href="contact.php?reply=<?php echo $row['bookingID'] ?>&inboxid=<?php echo $row['inboxid'] ?>"
                   class="btn btn-primary">Reply</a></td>
        </tr>
        <?php } ?>
        </tr>
    </table>
    <h5 style="margin-top:10px;">Message Sent</h5>
    <table class="table table-striped">
        <tr>
            <th style="width:120px">Time</th>
            <th style="width:150px">To</th>
            <th>Message</th>
        </tr>
        <tr>
            <?php $query = "SELECT firstname,lastname,msg,toID, inputTime 
                                    FROM inbox JOIN users ON inbox.fromID=users.ID 
                                    WHERE fromID=$session_id ORDER BY inputTime DESC";
            $result = $mysqli->query($query);
            while ($row = mysqli_fetch_array($result)){
            $id = $row['toID'];
            ?>
            <td><?php echo $row['inputTime']; ?></td>
            <td><?php
                $query = "SELECT firstname, lastname FROM users WHERE id=$id";
                $result1 = $mysqli->query($query);
                $row1 = $result1->fetch_array(MYSQLI_ASSOC);
                echo $row1['firstname'] . " " . $row1['lastname']; ?></td>
            <td><?php echo $row['msg']; ?></td>
        </tr>
        <?php } ?>
        </tr>
    </table>
</main>
</body>
</html>
