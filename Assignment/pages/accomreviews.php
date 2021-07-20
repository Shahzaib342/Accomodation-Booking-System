<?php
include ('db_conn.php');
include ('session.php');

if($session_id == ""){
    echo "<script type='text/javascript'>alert('Log in to edit your reviews!');</script>";
    }
    $accomID=$_GET['id'];

?>

<!DOCTYPE html>

<html>
    
    <header>
        <?php include('../container/header.php') ?>
    </header>
    <body>
        <table class="table table-striped">
            <?php $query="SELECT * FROM accommodation WHERE id=$accomID";
                    $result=$mysqli->query($query);
                    $row=$result->fetch_array(MYSQLI_ASSOC)
            ?>
            <tbody>
            <th colspan="2"><?php echo $row['accomAddress'] ;?></th>
            <th colspan="2"><a href="index.php" style="width:200px" class="btn btn-primary float-right">Return to Search</a></th>
                    <tr>
                        <td>Price/Night</td>
                        <td colspan="3"><?php echo $row['price'];?></td>
                    </tr>
                    <tr>
                        <td style="width:200px;">Rooms</td>
                        <td style="width:200px;"><?php echo $row['rooms'];?></td>
                        <td style="width:200px;">Bathrooms</td>
                        <td style="width:200px;"><?php echo $row['bathrooms'];?></td>
                    </tr>
                    <tr>
                        <td>Smoking</td>
                        <td><?php echo $row['smoking'];?></td>
                        <td>Garage</td>
                        <td><?php echo $row['garage'];?></td>
                    </tr>
                    <tr>
                        <td>Pet</td>
                        <td><?php echo $row['pet'];?></td>
                        <td>Internet</td>
                        <td><?php echo $row['internet'];?></td>
                    </tr>
                    <tr>
                        <?php $accomID=$row['id']; ?>
                        <?php $hostID=$row['hostID']; ?>
                        <td>Accommodation Rating</td>
                        <td><?php $sql="SELECT AVG(accomRating) avgAccomRating FROM reviews WHERE accomID=$accomID";
                                    $result1=$mysqli->query($sql);
                                    $temprow=$result1->fetch_array(MYSQLI_ASSOC);
                                    if ($temprow['avgAccomRating']=="") { echo "No Reviews";}
                                    else {echo $temprow['avgAccomRating']; }?></td>
                        <td>Host Rating</td>
                        <td><?php $sql="SELECT AVG(hostRating) avghostRating FROM reviews WHERE hostID=$hostID";
                                    $result1=$mysqli->query($sql);
                                    $temprow=$result1->fetch_array(MYSQLI_ASSOC);
                                    if ($temprow['avghostRating']=="") { echo "No Reviews";}
                                    else {echo $temprow['avghostRating']; }?></td>
                    </tr>
            </tbody>
        </table>
        <table class="table table-striped">
            <?php $query="SELECT * FROM reviews JOIN users
                            ON hostID = users.id
                            WHERE accomID=$accomID";
                $result=$mysqli->query($query); ?>
                <th style="width:10%">Reviewed by</th>
                <th style="width:10%">Accommodation Rating</th>
                <th>Review</th>
            <?php while($row = mysqli_fetch_array($result)){ ?>
                <tr>
                    <td><?php echo $row['firstname'] ;?></td>
                    <td><?php echo $row['accomRating'] ;?></td>
                    <td><?php echo $row['review'];?></td>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>

