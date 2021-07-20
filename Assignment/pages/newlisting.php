<?php
include('db_conn.php');
include('session.php');
if (!isset($session_id) || !isset($session_access) || $session_access != "2")
    echo "<script type='text/javascript'>alert('You are not allowed to access this page.');
    window.location='index.php';</script>";
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
        <th style="width:300px;">Add new accommodation</th>
        <th>Details</th>
        <form action="../php/update.php?newListing" method="post" enctype="multipart/form-data">
            <tr>
                <td>Accommodation Location</td>
                <td>
                    <select class="accom-destination" name="accomLocation" style="width:90%" required>
                        <option disabled>Choose your destination</option>
                        <option value="Hobart">Hobart</option>
                        <option value="Greater Hobart">Greater Hobart</option>
                        <option value="Launceston">Launceston</option>
                        <option value="Greater Launceston">Greater Launceston</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Accommodation Name</td>
                <td><input type="text" name='accomName' required></td>
            </tr>
            <tr>
                <td>Brief Description</td>
                <td><input type="text" name='accomDesc' required></td>
            </tr>
            <tr>
                <td>Accommodation Address</td>
                <td><input type="text" name='accomAddress' required></td>
            </tr>
            <tr>
                <td>City</td>
                <td><input type="text" name='city' required></td>
            </tr>
            <tr>
                <td>Available From</td>
                <td><input type="date" name='availFrom' required></td>
            </tr>
            <tr>
                <td>Available To</td>
                <td><input type="date" name='availTo' required></td>
            </tr>
            <tr>
                <td>Maximum Guests</td>
                <td><input type="number" name='guests' required></td>
            </tr>
            <tr>
                <td>Price/Night</td>
                <td><input type="number" name='price' required></td>
            </tr>
            <tr>
                <td>Rooms</td>
                <td><input type="number" name='rooms' required></td>
            </tr>
            <tr>
                <td>Bathrooms</td>
                <td><input type="number" name='bathrooms' required></td>
            </tr>
            <tr>
                <td>Entire House</td>
                <td>
                    <select class="accom-destination" name="entireHouse" style="width:90%" required>
                        <option disabled>Select Yes/No</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Smoking</td>
                <td>
                    <select class="accom-destination" name="smoking" style="width:90%" required>
                        <option disabled>Select Yes/No</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Garage</td>
                <td>
                    <select class="accom-destination" name="garage" style="width:90%" required>
                        <option disabled>Select Yes/No</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Pet</td>
                <td>
                    <select class="accom-destination" name="pet" style="width:90%" required>
                        <option disabled>Select Yes/No</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Internet</td>
                <td>
                    <select class="accom-destination" name="internet" style="width:90%" required>
                        <option disabled>Select Yes/No</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Select image to upload:</td>
                <td>
                    <input type="file" name="fileToUpload" id="fileToUpload" required>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button class="btn btn-primary float-right" type="submit"
                            onclick="return confirm('Create listing?')">Create
                    </button>
                </td>
            </tr>
        </form>
    </table>
</main>
</body>
</html>