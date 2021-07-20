<?php
    include('db_conn.php');
    include('session.php');
if (!isset($session_id) || !isset($session_access) || $session_id == "" || $session_access != "3")
    echo "<script type='text/javascript'>alert('You are not allowed to access this page.');
    window.location='index.php';</script>";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registration</title>
    </head>
    <body>
        <header>
            <?php include('../container/header.php') ;
                    include('../container/sidebar.php') ?>
        </header>
        <main>
            <form action="../php/register_engine1.php" method="post">
                <table class="table" style="width:50%">
                    <h5 style="margin-top:10px;">Add User</h5>
                    <tr>
                        <td><label>Access Level</label></td>
                        <td><select id="type" name="access">
                            <option select disabled>Select your choice</option>
                            <option class="Client" value="Client">Client</option>
                            <option class="Host" value="Host">Host</option>
                            <option class="Admin" value="Admin">Admin</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td><label>First Name</label></td>
                   
                        <td><input class="registration_input" type="text" id="firstName" name="firstName" placeholder="John"></td>
                    </tr>
                    <tr>
                        <td><label for="lastName">Last Name</label></td>
                    
                        <td><input class="registration_input" type="text" id="lastName" name="lastName" required placeholder="Citizen"></td>
                    </tr>
                    <tr>
                        <td><label for="emailAddress">Email Address</label></td>
                   
                        <td><input class="registration_input" type="email" id="emailAddress" name="emailAddress" required placeholder="example@utas.edu.au"></td>
                    </tr>
                    <tr>
                        <td><label for="mobileNumber">Mobile Phone</label></td>
                   
                        <td><input class="registration_input" type="text" id="mobileNumber" name="mobileNumber" required placeholder="Enter mobile number" pattern="[0-9]{10}" title="Mobile phone number has to be 10 digits"></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password</label></td>
                   
                        <td><input class="registration_input" type="password" id="password" name="pwd" required placeholder="Enter password" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%]).{6,12}" title="Password must be between 6-12 characters with at least 1 lower case, 1 upper case, 1 number and a special character !@#$%"></td>
                    </tr>
                    <tr>
                    <tbody class="abnNumber">
                       
                            <td><label for="abnNumber">ABN</label></td>
                        
                            <td><input class="registration_input" type="text" id="abnNumber" name="abnNumber" pattern="[0-9]{11}" placeholder="Enter your ABN number" title="Enter your 11 digits ABN number"></td>
                       
                    </tbody>
                    </tr>
                    <tr>
                    <td><a href="editusers.php" class="btn btn-secondary">Cancel</a></td>
                    <td><button type="submit" class="btn btn-danger float-right" name="register" id="register">Create</button></td>
                    </tr>
                </table>

            </form>
        <script src="../js/registration.js"></script>
        <main>
    </body>
</html>