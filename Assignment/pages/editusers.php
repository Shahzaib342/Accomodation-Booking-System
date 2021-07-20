<?php
include('db_conn.php');
include('session.php');
if (!isset($session_id) || !isset($session_access) || $session_id == "" || $session_access != "3")
    echo "<script type='text/javascript'>alert('You are not allowed to access this page.');
    window.location='index.php';</script>";
else if (!isset($mysqli))
    echo "<script type='text/javascript'>alert('Database Connection failed.');
    window.location='index.php';</script>";

if (isset($_GET['done'])) {
    echo "<script type='text/javascript'>alert('Updated!');</script>";
    echo("<script>history.replaceState({},'','editusers.php');</script>");
}
?>

<!DOCTYPE html>
<html>
<header>
    <?php include('../container/header.php') ?>
</header>
<body>
<main>
    <?php include('../container/sidebar.php'); ?>
    <h5 style="margin-top:10px;display:inline">Users</h5>
    <a class="btn btn-primary float-right" href="../pages/adduser.php" style="width:200px;">Create new user</a>
    <table class="table table-striped">
        <tr>
            <th>User ID</th>
            <th>User Name</th>
            <th>Access Level</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <tr>
            <?php $query = "SELECT * FROM users WHERE active = 1";
            $result = $mysqli->query($query);
            while ($row = mysqli_fetch_array($result)){
            ?>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
            <form action="../php/update.php?id=<?php echo $row['id'] ?>" method="post">
                <td><input style="width:20px;" type="number" max="3" min="1" name="newaccess"
                           value="<?php echo $row['access']; ?>"></td>
                <td>
                    <button class="btn btn-success" type="submit" onclick="return confirm('Update?')">Update</button>
                </td>
            </form>
            <td><a href="../php/update.php?delUser=<?php echo $row['id']; ?>" class="btn btn-danger"
                   onclick="return confirm('Delete user?')">Delete</a></td>
        </tr>
        <?php } ?>
        </tr>
    </table>
</main>
</body>
</html>
