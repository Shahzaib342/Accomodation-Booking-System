<?php
include ('db_conn.php');
include ('session.php');

if($session_id == ""){
    echo "<script type='text/javascript'>alert('You need to login!!');
    window.location='index.php';</script>";
    }
$reviewID=$_GET['id'];
?>

<!DOCTYPE html>

<html>
    
    <header>
        <?php include('../container/header.php') ?>
    </header>
    <body>
        <main>
            <?php include('../container/sidebar.php') ; ?>
            <form method="post" action="../php/update.php?updatereview">
                <?php $sql="SELECT *, r.accomRating cARating, r.hostRating cHRating FROM reviews r JOIN accommodation a ON accomID = a.id
                            JOIN bookings b ON r.bid = b.bid
                            WHERE r.id=$reviewID";
                        $result=$mysqli->query($sql);
                        $row=$result->fetch_array(MYSQLI_ASSOC);
                        ?>
                <table class="table table-striped" style="width:80%">
                    <input type="hidden" name="id" value="<?php echo $reviewID ?>">
                    <h5 style="margin-top:10px;">Edit your review</h5>
                    <tr>
                        <td>Accommodation Location</td>
                        <td><?php echo $row['accomAddress'] ?></td>
                    </tr>       
                    <tr>
                        <td>Stay Period</td>
                        <td><?php echo $row['bookFrom']." to ".$row['bookTo'] ?></td>
                    </tr>      
                    <tr>
                        <td>Rate your accommodation (out of 5)</td>
                        <td><input type="number" name="accomRating" min="1" max="5" required value="<?php echo $row['cARating'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Rate your host (out of 5)</td>
                        <td><input type="number" name="hostRating" min="1" max="5" required value="<?php echo $row['cHRating'] ?>"></td>
                    </tr>    
                    <tr>
                        <td>Your review</td>
                        <td><textarea name="review" style="height:20vh;width:100%;"><?php echo $row['review'] ?></textarea></td>
                    </tr>   
                    <tr>
                        <td><a href="../pages/myreviews.php" class="btn btn-secondary" onclick="return confirm('Cancel?')">Cancel</a></td>
                        <td><button type="submit" class="btn btn-success float-right" onclick="return confirm('Submit review?')">Submit</button></td>
                    </tr>
                </table>
            </form>
        </main>
    </body>
</html>

