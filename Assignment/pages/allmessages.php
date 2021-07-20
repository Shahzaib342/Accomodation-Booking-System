<?php
include('db_conn.php');
include('session.php');
if (!isset($session_id) || !isset($session_access) || $session_access == "1" || $session_id == "" || $session_access == "" || $session_access == "2")
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
    <?php include('../container/sidebar.php') ?>
    <h5 style="margin-top:10px;">All Messages</h5>
    <table class="table table-striped">
        <tr>
            <th style="width:120px;">Time</th>
            <th style="width:150px">From</th>
            <th style="width:150px">To</th>
            <th>Status</th>
            <th>Message</th>
        </tr>
        <?php $query = "SELECT firstname,lastname,msg,fromID,toID,inputTime,bookingID,inbox.id inboxid,mread
                            FROM inbox JOIN users ON inbox.toID=users.ID 
                            ORDER BY inputTime DESC";
        $result = $mysqli->query($query);
        while ($row = mysqli_fetch_array($result)) {
            $fromID = $row['fromID'];
            $toID = $row['toID'];
            ?>
            <tr>
                <td><?php echo $row['inputTime']; ?></td>
                <td>
                    <?php
                    $query = "SELECT firstname, lastname FROM users WHERE id=$fromID";
                    $result1 = $mysqli->query($query);
                    $row1 = $result1->fetch_array(MYSQLI_ASSOC);
                    echo $row1['firstname'] . " " . $row1['lastname']; ?>
                </td>
                <td>
                    <?php
                    $query = "SELECT firstname, lastname FROM users WHERE id=$toID";
                    $result1 = $mysqli->query($query);
                    $row1 = $result1->fetch_array(MYSQLI_ASSOC);
                    echo $row1['firstname'] . " " . $row1['lastname']; ?>
                </td>
                <td><?php echo ucwords($row['mread']); ?></td>
                <td><?php echo $row['msg']; ?></td>
            </tr>
        <?php } ?>
    </table>
</main>
</body>
</html>
