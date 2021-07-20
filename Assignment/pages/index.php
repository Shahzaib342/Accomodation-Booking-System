<?php
    include('db_conn.php');
    include('session.php');
    $accomDest = "";
    $accomInDate = "";
    $accomOutDate = "";
    $guests="";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ABS Home</title>
        <?php include('../container/header.php'); ?>
    </head>
    <body>
        <main2>       
            <h2 class="page-title" style="text-align:center;margin-top:10px;">Accomodation Booking System</h2>
            <section class="accommodation-container">
                <form method="post">
                    <h3>Find your accommodation</h3>
                    <div class="accom-row">
                        <label>Select your destination</label>
                        <select class="accom-destination" name="accomDest">
                            <option selected disabled>Choose your destination</option>
                            <option value="Hobart" <?php echo (isset($_POST['accomDest']) && $_POST['accomDest'] == 'Hobart') ? 'selected' : ''; ?> >Hobart</option>
                            <option value="Greater Hobart" <?php echo (isset($_POST['accomDest']) && $_POST['accomDest'] == 'Greater Hobart') ? 'selected' : ''; ?> >Greater Hobart</option>
                            <option value="Launceston" <?php echo (isset($_POST['accomDest']) && $_POST['accomDest'] == 'Launceston') ? 'selected' : ''; ?> >Launceston</option>
                            <option value="Greater Launceston" <?php echo (isset($_POST['accomDest']) && $_POST['accomDest'] == 'Greater Launceston') ? 'selected' : ''; ?> >Greater Launceston</option>
                        </select>
                    </div>
                    <div class="accom-row">
                        <div class="accom-row-child-1">
                            <label>Check in date</label>
                            <input type="date" id="accomInDate" placeholder="dd/mm/yyyy" name="accomInDate" required value="<?php echo isset($_POST['accomInDate']) ? $_POST['accomInDate'] : '' ?>" >
                        </div>
                        <div class="accom-row-child-1">
                            <label>Check out date</label>
                            <input type="date" id="accomOutDate" placeholder="dd/mm/yyyy" name="accomOutDate" required value="<?php echo isset($_POST['accomOutDate']) ? $_POST['accomOutDate'] : '' ?>" >
                        </div>    
                    </div>
                    <div class="accom-row">
                        <label>Number of guests</label>
                        <input type="number" id="noOfGuess" placeholder="How many are travelling?" name="guests" required value="<?php echo isset($_POST['guests']) ? $_POST['guests'] : '' ?>" />
                    </div>
                    <div class="accom-row"></div>
                        <p class="accom-alert"></p>
                    </div>
                    <p><span id="searchError" style="color:red;"></span></p>
                    <div class="accom-row">
                        <button onclick="searchFunction()" class="btn btn-primary" style="width:100%" name="accomSearch" type="Submit">Search</button>
                    </div>
                </form>
            </section>
            <div class="accomTable">
                <?php
                    if (isset($_POST['accomSearch'])) {
                        $accomDest = $_POST['accomDest'];
                        $accomInDate = $_POST['accomInDate'];
                        $accomOutDate = $_POST['accomOutDate'];
                        $guests = $_POST['guests'];
                        if ($accomInDate > $accomOutDate) {
                            echo "<script type='text/javascript'>$('#searchError').html('<span>Check in date needs to be prior to check out date.</span>')</script>";
                        } else {
                            //$query = "SELECT * FROM accommodation WHERE `accomLocation` = '$accomDest' && `availFrom` < '$accomInDate' && `availTo` > '$accomOutDate' && `guests` >= $guests";
                            $query = "SELECT * FROM `accommodation` LEFT JOIN `bookings` 
                                ON accommodation.id = bookings.accomID
                                AND (
                                    (bookings.bookFrom <= '$accomInDate' AND bookings.bookTo >= '$accomInDate') OR
                                    (bookings.bookFrom >= '$accomInDate' AND bookings.bookFrom <= '$accomOutDate')
                                    )
                                WHERE (bookings.bid IS NULL) && (NOT active='no' OR active IS NULL) && `accomLocation` = '$accomDest' && `availFrom` <= '$accomInDate' && `availTo` >= '$accomOutDate' && `guests` >= $guests";
                            //echo $query;
                            $result=$mysqli->query($query); 
                            ?>
                            
                            <div class="table-responsive p-4" style="overflow-x:visible;">
                                <h1>Available Accommodations</h1>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Location</th>
                                        <th>Available From</th>
                                        <th>Available To</th>
                                        <th>Guests</th>
                                        <th>Price/night</th>
                                        <th>Rooms</th>
                                        <th>Bath Rooms</th>
                                        <th>Smoking</th>
                                        <th>Garage</th>
                                        <th>Pet</th>
                                        <th>Internet</th>
                                        <th>Address</th>
                                        <th>House Rating</th>
                                        <th>Host Rating</th>
                                        <th>Book</th>
                                        <th>Reviews</th>
                                    </thead>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_array($result)){ ?>
                                            <tr>
                                                <?php $accomID=$row['id']; ?>
                                                <?php $hostID=$row['hostID']; ?>
                                                <td><?php echo $row['id'] ;?></td>
                                                <td><?php echo $row['accomLocation'] ;?></td>
                                                <td><?php echo $row['availFrom'];?></td>
                                                <td><?php echo $row['availTo'];?></td>
                                                <td><?php echo $row['guests'];?></td>
                                                <td><?php echo $row['price'];?></td>
                                                <td><?php echo $row['rooms'];?></td>
                                                <td><?php echo $row['bathrooms'];?></td>
                                                <td><?php echo $row['smoking'];?></td>
                                                <td><?php echo $row['garage'];?></td>
                                                <td><?php echo $row['pet'];?></td>
                                                <td><?php echo $row['internet'];?></td>
                                                <td><?php echo $row['accomAddress'];?></td>
                                                <td><?php $sql="SELECT AVG(accomRating) avgAccomRating FROM reviews WHERE accomID=$accomID";
                                                            $result1=$mysqli->query($sql);
                                                            $temprow=$result1->fetch_array(MYSQLI_ASSOC);
                                                            if ($temprow['avgAccomRating']=="") { echo "No Reviews";}
                                                            else {echo $temprow['avgAccomRating']; }?></td>
                                                <td><?php $sql="SELECT AVG(hostRating) avghostRating FROM reviews WHERE hostID=$hostID";
                                                            $result1=$mysqli->query($sql);
                                                            $temprow=$result1->fetch_array(MYSQLI_ASSOC);
                                                            if ($temprow['avghostRating']=="") { echo "No Reviews";}
                                                            else {echo $temprow['avghostRating']; }?></td>
                                                <td>
                                                <?php if ($session_access=="2"){
                                                    echo "A host cannot book an accommodation";
                                                } else { ?>
                                                    <a href="booking.php?id=<?php echo $row['id']; ?>&accomInDate=<?php echo $accomInDate?>&accomOutDate=<?php echo $accomOutDate ?>&guests=<?php echo $guests ?>&price=<?php echo $row['price']?>&address=<?php echo $row['accomAddress']?>&accomID=<?php echo $row['id']?> " class = "btn btn-danger">Book</a></td>
                                                <?php } ?>
                                                <td><a href="accomreviews.php?id=<?php echo $row['id']; ?>" class = "btn btn-primary" style="width:130px;">See Reviews</a></td>
                                            </tr>
                                        <?php } } } ?>
                                    </tbody>
                                </table>
                            </div>
            </div>
        </main2>    
        <script type="text/javascript" src="..//js/script.js"></script>
    </body>
</html>