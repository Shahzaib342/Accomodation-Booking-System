<?php
include ('db_conn.php');
include ('session.php');

if($session_id == ""){
    echo "<script type='text/javascript'>alert('You need to login!!');
    window.location='index.php';</script>";
    }

    $bid=$_GET['bid'];
    $amount=$_GET['amount'];
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
                <table class="table table-striped" style="width:50%">
                    <input type="hidden" name="pay" value="<?php echo $_GET['bid'] ?>">
                    <input type="hidden" name="amount" value="<?php echo $_GET['amount'] ?>">
                    <h5 style="margin-top:10px;">Payment Details</h5>
                    <tr>
                        <td>Cardholder name</td>
                        <td><input type="text" required></td>
                    </tr>       
                    <tr>
                        <td>Card number</td>
                        <td><input type="text" required></td>
                    </tr>  
                    <tr>
                        <td>CVC</td>
                        <td><input type="password" required></td>
                    </tr>  
                    <tr>
                        <td>Amount</td>
                        <td><?php echo $amount ?> </td>
                    </tr>  
                    <tr>
                        <td><a href="../pages/mybooking.php" class="btn btn-secondary" onclick="return confirm('Cancel payment?')">Cancel</a></td>
                        <td><button type="submit" class="btn btn-success float-right" onclick="return confirm('Confirm payment')">Pay</button></td>
                    </tr>
                </table>
            </form>
        </main>
    </body>
</html>