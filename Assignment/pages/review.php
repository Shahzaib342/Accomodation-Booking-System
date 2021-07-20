<?php
include ('db_conn.php');
include ('session.php');

if($session_id == ""){
    echo "<script type='text/javascript'>alert('You need to login!!');
    window.location='index.php';</script>";
    }

    $accomAddress=$_GET['accomAddress'];
    $bookFrom=$_GET['bookFrom'];
    $bookTo=$_GET['bookTo'];
    $noofguests=$_GET['noofguests'];
    $totalprice=$_GET['totalprice'];
?>

<!DOCTYPE html>

<html>
    
    <header>
        <?php include('../container/header.php') ?>
    </header>
    <body>
        <main>
            <?php include('../container/sidebar.php') ; ?>
            <form method="get" action="../php/update.php">
                <table class="table table-striped" style="width:80%">
                    <input type="hidden" name="bid" value="<?php echo $_GET['bid'] ?>">
                    <input type="hidden" name="hostID" value="<?php echo $_GET['hostID'] ?>">
                    <input type="hidden" name="accomID" value="<?php echo $_GET['accomID'] ?>">
                    <h5 style="margin-top:10px;">Leave your review</h5>
                    <tr>
                        <td style="width:30%">Accommodation Location</td>
                        <td><?php echo $accomAddress ?></td>
                    </tr>       
                    <tr>
                        <td>Stay From</td>
                        <td><?php echo $bookFrom ?></td>
                    </tr>      
                    <tr>
                        <td>Stay To</td>
                        <td><?php echo $bookTo ?></td>
                    </tr>      
                    <tr>
                        <td>Number of Guests</td>
                        <td><?php echo $noofguests ?></td>
                    </tr>      
                    <tr>
                        <td>Price</td>
                        <td><?php echo $totalprice ?></td>
                    </tr>  
                    <tr>
                        <td>Rate your accommodation (out of 5)</td>
                        <td><input type="number" name="accomRating" min="1" max="5" required></td>
                    </tr>
                    <tr>
                        <td>Rate your host (out of 5)</td>
                        <td><input type="number" name="hostRating" min="1" max="5" required></td>
                    </tr>    
                    <tr>
                        <td>Your review</td>
                        <td><textarea name="review" style="height:20vh;width:100%;"></textarea></td>
                    </tr>   
                    <tr>
                        <td><a href="../pages/mybooking.php" class="btn btn-secondary" onclick="return confirm('Cancel?')">Cancel</a></td>
                        <td><button type="submit" class="btn btn-success float-right" onclick="return confirm('Submit review?')">Submit</button></td>
                    </tr>
                </table>
            </form>
        </main>
    </body>
</html>

