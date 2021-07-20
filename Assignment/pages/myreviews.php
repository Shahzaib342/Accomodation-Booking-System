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
    <?php include('../container/header.php');
    include('../container/sidebar.php') ?>
</header>
<body>
<main>
    <table class="table table-striped">
        <?php if ($session_access == "1") {
            $query = "SELECT *, r.id reviewID, r.accomRating cARating, r.hostRating cHRating FROM reviews r
                            INNER JOIN accommodation a ON accomID = a.id 
                            INNER JOIN bookings b ON r.bid = b.bid
                            WHERE reviewerID=$session_id";
        } else if ($session_access == "2") {
            $query = "SELECT *, r.id reviewID, r.accomRating cARating, r.hostRating cHRating FROM reviews r
                        INNER JOIN accommodation a ON accomID = a.id 
                        INNER JOIN bookings b ON r.bid = b.bid
                        WHERE r.hostID=$session_id";
        } else if ($session_access == "3") {
            $query = "SELECT *, r.id reviewID, r.accomRating cARating, r.hostRating cHRating FROM reviews r
                        INNER JOIN accommodation a ON accomID = a.id 
                        INNER JOIN bookings b ON r.bid = b.bid
                        INNER JOIN users u ON r.reviewerID = u.id";
        }
        $result = $mysqli->query($query);
        if ($session_access == "3") {
            $title = "All Reviews";
        } else {
            $title = "My Reviews";
        }
        ?>
        <h5><?php echo $title ?></h5>
        <th>Accommodation</th>
        <?php if ($session_access == "3") { ?>
            <th>Reviewer</th>
        <?php } ?>
        <th style="width:15%">Stay Period</th>
        <th>Rating</th>
        <th>Host Rating</th>
        <th colspan="3">Review</th>
        <?php while ($row = mysqli_fetch_array($result)) {
            ; ?>
            <tr>
                <td><?php echo $row['accomAddress']; ?></td>
                <?php if ($session_access == "3") { ?>
                    <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                <?php } ?>
                <td><?php echo $row['bookFrom'] . " to " . $row['bookTo'] ?></td>
                <td><?php echo $row['cARating']; ?></td>
                <td><?php echo $row['cHRating']; ?></td>
                <td><?php echo $row['review']; ?></td>
                <?php if ($session_access == "1") { ?>
                    <td><a href="../pages/editreview.php?id=<?php echo $row['reviewID'] ?>"
                           class="btn btn-primary">Edit</a></td>
                    <td><a href="../php/update.php?delReview=<?php echo $row['reviewID'] ?>" class="btn btn-danger"
                           onclick="return confirm('Delete your review?')">Delete</a></td>
                <?php } ?>
                <?php if ($session_access == "3") { ?>
                    <td><a href="../php/update.php?delReview=<?php echo $row['reviewID'] ?>" class="btn btn-danger"
                           onclick="return confirm('Delete review?')">Delete</a></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
</main>
</body>
</html>

