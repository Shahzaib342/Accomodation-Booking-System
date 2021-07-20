<?php
include('db_conn.php');
include('session.php');

if (!isset($session_id) || !isset($session_access) || $session_access == "1" || $session_id == "" || $session_access == "")
    echo "<script type='text/javascript'>alert('You are not allowed to access this page.');
    window.location='index.php';</script>";
else if (!isset($mysqli))
    echo "<script type='text/javascript'>alert('Database Connection failed.');
    window.location='index.php';</script>";

$recordupdated = false;
if (isset($_GET['updated'])) {
    $recordupdated = true;
}
if ($recordupdated) {
    echo '<script type="text/javascript"> alert("House updated!"); </script>';
    echo("<script>history.replaceState({},'','mylistings.php');</script>");
}
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
        <?php if ($session_access == "2") {
            $query = "SELECT * FROM accommodation WHERE active = 1 AND hostID=$session_id";
        } else if ($session_access == "3") {
            $query = "SELECT * FROM accommodation WHERE active = 1 ";
        }
        $result = $mysqli->query($query); ?>
        <h5 style="display:inline">House List</h5>
        <?php if ($session_access == "2") { ?>
            <a href="newlisting.php" class="btn btn-primary float-right" style="width:150px; margin-bottom:15px">Create
                new
                House</a>
        <?php } ?>
        <th>Update House</th>
        <th>Delete House</th>
        <th>House ID</th>
        <th>Location</th>
        <th>Address</th>
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
        <th>Image</th>
        <?php while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <form action="../php/update.php?editListing=<?php echo $row['id'] ?>" method="post">
                    <td>
                        <button class="btn btn-primary" type="submit" onclick="return confirm('Update this House?')">
                            Update
                        </button>
                    </td>
                    <td><a href="../php/update.php?delListing=<?php echo $row['id'] ?>" class="btn btn-danger"
                           onclick="return confirm('Delete this House?')">Delete</a></td>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['accomLocation']; ?></td>
                    <td><input type="text" name='accomAddress' value="<?php echo $row['accomAddress']; ?>"></td>
                    <td><input type="text" class="inputLength" name='availFrom'
                               value="<?php echo $row['availFrom']; ?>"></td>
                    <td><input type="text" class="inputLength" name='availTo' value="<?php echo $row['availTo']; ?>">
                    </td>
                    <td><input type="text" class="inputLength" name='guests' value="<?php echo $row['guests']; ?>"></td>
                    <td><input type="text" class="inputLength" name='price' value="<?php echo $row['price']; ?>"></td>
                    <td><input type="text" class="inputLength" name='rooms' value="<?php echo $row['rooms']; ?>"></td>
                    <td><input type="text" class="inputLength" name='bathrooms'
                               value="<?php echo $row['bathrooms']; ?>"></td>
                    <td><input type="text" class="inputLength" name='smoking' value="<?php echo $row['smoking']; ?>">
                    </td>
                    <td><input type="text" class="inputLength" name='garage' value="<?php echo $row['garage']; ?>"></td>
                    <td><input type="text" class="inputLength" name='pet' value="<?php echo $row['pet']; ?>"></td>
                    <td><input type="text" class="inputLength" name='internet' value="<?php echo $row['internet']; ?>">
                    <?php if(is_null($row['image'])) { ?>
                        <td>No Image</td>
                    <?php } else { ?>
                    <td><a href="../../uploads/<?php echo $row['image']; ?>" target="_blank">View</a>
                    </td>
                    <?php } ?>
                </form>
            </tr>
        <?php } ?>
    </table>
</main>
</body>
</html>