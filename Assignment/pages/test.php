<?php
include ('db_conn.php');
include ('session.php');

$query="SELECT firstname,lastname,msg FROM inbox JOIN users ON inbox.fromID=users.ID";
$result = $mysqli->query($query);

var_dump($row);
$firstname = $row['firstname'];
$lastname = $row['lastname'];

$query1="SELECT firstname,lastname,msg FROM inbox JOIN users ON inbox.toID=users.ID";
$result1 = $mysqli->query($query1);
$row1 = $result1->fetch_array(MYSQLI_ASSOC);
$tofirstname =$row1['firstname'];
$tolastname = $row1['lastname'];
?>

<!DOCTYPE html>

<html>
    
    <header>

    </header>
    <body>
        <main>

            <table class="table table-striped">
                <th>From</th>
                <th>To</th>
                <th>Message</th>
                <tr>
                <?php while($row = mysqli_fetch_array($result)){ ?>
                    <tr>
                        <td><?php echo $row['firstname']." ".$row['lastname'] ;?></td>
                        <td><?php echo $tofirstname." ".$tolastname ;?></td>
                        <td><?php echo $row['msg'];?></td>
                        
                    </tr>
                <?php } ?>
                </tr>
            </table>
        </main>
    </body>
</html>