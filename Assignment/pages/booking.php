<?php
include ('db_conn.php');
include ('session.php');

if($session_id == ""){
     echo "<script type='text/javascript'>alert('You need to login!!');
    window.location='index.php';</script>";
} else {
    $id = $_GET['id'];
    $accomInDate = date('d/M/Y',strtotime($_GET['accomInDate']));
    $accomOutDate = date('d/M/Y',strtotime($_GET['accomOutDate']));
    $accomInDate1 = strtotime($_GET['accomInDate']);
    $accomOutDate1 = strtotime($_GET['accomOutDate']);
    $guests = $_GET['guests'];
    $daysStay = ($accomOutDate1-$accomInDate1)/3600/24;
    $price = $_GET['price']*$daysStay;
    $address = $_GET['address'];
    $accomID = $_GET['accomID'];

}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <?php include('../container/header.php'); ?>
    </head>
    <body>
        <h1 class="page-title" style="text-align:center; margin-bottom:20px">Booking Confirmation</h1>
        <form method="get" action="../php/update.php">
            <table class="table table-striped" style="width:50%; margin: auto">
                <input type="hidden" name="accomID" value="<?php echo $accomID ?>">
                <input type="hidden" name="accomInDate" value="<?php echo $_GET['accomInDate'] ?>">
                <input type="hidden" name="accomOutDate" value="<?php echo $_GET['accomOutDate'] ?>">
                <input type="hidden" name="noofguests" value="<?php echo $guests ?>">
                <input type="hidden" name="price" value="<?php echo $price ?>">
                <tr>
                    <td style="width:35%;">Name</td>
                    <td><?php echo "$session_user". " "."$session_lastname" ?></td>
                </tr>
                <tr>
                    <td>Email Address</td>
                    <td><?php echo $session_email ?></td>
                </tr>
                <tr>
                    <td>Mobile Phone</td>
                    <td><?php echo $session_mobile ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><?php echo $address ?></td>
                </tr>
                <tr>
                    <td>Check In</td>
                    <td><?php echo $accomInDate ?></td>
                </tr>
                <tr>
                    <td>Check Out</td>
                    <td><?php echo $accomOutDate ?></td>
                </tr>
                <tr>
                    <td>Guest(s)</td>
                    <td><?php echo $guests ?></td>
                </tr>
                <tr>
                    <td>Night(s) stay</td>
                    <td><?php echo $daysStay ?></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><?php echo "$ ".number_format($price); ?></td>
                </tr>
                <tr style="background-color:transparent;">
                    <td><button type="button" id="cancelBtn" class="btn btn-secondary" >Cancel</button></td>
                    <td><button type="submit" class="btn btn-danger float-right" name="bookingConf">Confirm</button></td>
                </tr>
            </table>
        </form>
    </body>

    <script>
        var cancelBtn = document.getElementById('cancelBtn');
        cancelBtn.addEventListener('click',function(){
            var conf= confirm('Cancel booking?');
            if (conf) { document.location.href="index.php"; }
        })
    </script>
</html>
