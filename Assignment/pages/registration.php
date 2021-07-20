<?php
    include('db_conn.php');
    include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registration</title>
    </head>
    <body>
        <header>
            <?php include('../container/header.php') ?>
        </header>
        <section class="registration_container">
            <form class="registerForm" id="registerForm" action="../php/register_engine.php" method="post">
                <table class="formElement">
                    <h2 style="margin-top:10px;">Create Account</h2>
                    <tr class="form-group">
                        <td><label>Are you registering as a client or host?</label></td>
                    </tr>
                    <tr class="form-group">
                        <td><select id="type" name="access">
                            <option select disabled>Select your choice</option>
                            <option class="Client" value="Client">Client</option>
                            <option class="Host" value="Host">Host</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td><label>First Name</label></td>
                    </tr>
                    <tr>
                        <td><input class="registration_input" type="text" id="firstName" name="firstName" placeholder="John"></td>
                    </tr>
                    <tr>
                        <td><label for="lastName">Last Name</label></td>
                    </tr>
                    <tr>
                        <td><input class="registration_input" type="text" id="lastName" name="lastName" required placeholder="Citizen"></td>
                    </tr>
                    <tr>
                        <td><label for="emailAddress">Email Address</label></td>
                    </tr>
                    <tr>
                        <td><input class="registration_input" type="email" id="emailAddress" name="emailAddress" required placeholder="example@utas.edu.au"></td>
                    </tr>
                    <tr>
                        <td><label for="mobileNumber">Mobile Phone</label></td>
                    </tr>
                    <tr>
                        <td><input class="registration_input" type="text" id="mobileNumber" name="mobileNumber" required placeholder="Enter your mobile number" pattern="[0-9]{10}" title="Mobile phone number has to be 10 digits"></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password</label></td>
                    </tr>
                    <tr>
                        <td><input class="registration_input" type="password" id="password" name="pwd" required placeholder="Enter your password" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%]).{6,12}" title="Password must be between 6-12 characters with at least 1 lower case, 1 upper case, 1 number and a special character !@#$%"></td>
                    </tr>
                    <tr>
                        <td><label for="confirmPassword">Confirm Password</label></td>
                    </tr>
                    <tr>
                        <td><input class="registration_input" type="password" id="confirmPassword" required placeholder="Confirm password" title="Passwords do not match"></td>
                    </tr>
                    <tbody class="abnNumber">
                        <tr>
                            <td><label for="abnNumber">ABN</label></td>
                        </tr>
                        <tr>
                            <td><input class="registration_input" type="text" id="abnNumber" name="abnNumber" pattern="[0-9]{11}" placeholder="Enter your ABN number" title="Enter your 11 digits ABN number"></td>
                        </tr>
                    </tbody>
                </table>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-danger float-right" name="register" id="register">Register</button>
            </form>
        </section>
        <script src="../js/registration.js"></script>
    </body>

</html>