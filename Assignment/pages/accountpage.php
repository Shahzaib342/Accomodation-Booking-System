<?php
include ('db_conn.php');
include ('session.php');

if($session_id == ""){
    echo "<script type='text/javascript'>alert('You need to login!!');
    window.location='index.php';</script>";
    }

?>

<!DOCTYPE html>

<html>
    
    <header>
        <?php include('../container/header.php') ?>
    </header>
    <body>
        <main>
            <?php include('../container/sidebar.php') ?>

            <div>
                <?php 
                
                    $sql ="SELECT * FROM users WHERE email='$session_email'";
                    $result = $mysqli->query($sql);
                    $row=$result->fetch_array(MYSQLI_ASSOC);
                    $abn = $row['abn'];
                    $address = $row['userAddress'];
                ?>
                <table class="table table-striped" style="margin:5vh auto auto auto;width:75%;">
                    <form method="post" action="../php/update.php">
                        <th colspan="2">Account Details</th>
                        <th></th>
                        <tr>
                            <td style="width:30%">First Name</td>
                            <td><input name="firstname" value="<?php echo $session_user;?>"></td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td><input name="lastname" value="<?php echo $session_lastname;?>"></td>
                        </tr>
                        <tr>
                            <td>Email Name</td>
                            <td><input name="email" value="<?php echo $session_email;?>"></td>
                        </tr>
                        <tr>
                            <td>Mobile Phone</td>
                            <td><input name="mobile" value="<?php echo $session_mobile;?>"></td>
                        </tr>
                        
                        <tr>
                            <td>Postal Address</td>
                            <td><input name="address" value="<?php echo $address;?>"></td>
                        </tr>
                        <?php if ($session_access == "2") { ?>
                            <tr>
                                <td>ABN</td>
                                <td><input name="abn" value="<?php echo $abn;?>"></td>
                            </tr>
                        <?php } ?>
                        <tr style="background-color:transparent">
                            <td style="color:green"><?php if(isset($_GET['updated'])) { echo "Account Updated";} ?></td>
                            <td><button class="btn btn-danger float-right" style="width:150px;" onclick="return confirm('Confirm update details')">Update Details</button></td>
                        </tr>
                    </form>
                    <form method="post" action="../php/update.php">
                        <th colspan="2">Change Password</th>
                        <th></th>
                        <tr>
                            <td>Current Password</td>
                            <td><input type="password" name="oldpwd" placeholder="Enter your current password"></td>
                        </tr>
                        <tr>
                            <td>New Password</td>
                            <td><input type="password" name="newpwd" placeholder="Enter your new password"></td>
                        </tr>
                        <tr style="background-color:transparent">
                            <?php if (isset($_GET['pwd']) && $_GET['pwd']=="OK") { ?>
                                <td style="color:green">
                            <?php echo "Password Updated";} else if (isset($_GET['pwd']) && $_GET['pwd']=="Incorrect") { ?>
                                <td style="color:red">
                            <?php echo "Incorrect Password";} else { ?> <td> <?php } ?>
                            </td>
                            <td><button class="btn btn-danger float-right" style="width:150px;" onclick="return confirm('Confirm update details')">Change Password</button></td>
                        </tr>
                    </form>
                </table>
            </div>
        </main>
    </body>
</html>