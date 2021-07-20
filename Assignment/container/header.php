<!-- Meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS file -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
<!-- External CSS file -->
<link href="../css/style.css" rel="stylesheet" type="text/css">
<link href="../css/accountpage.css" rel="stylesheet" type="text/css">
<!-- Font -->
<link href="https://fonts.googleapis.com/css2?family=Alegreya:wght@400;500;700&family=Lato:wght@400;700&family=Noto+Serif:wght@400;700&display=swap"
      rel="stylesheet">

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="../pages/index.php">UniTas Pty Ltd</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarExpand">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarExpand">
        <div class="navbar-nav mr-auto">
            <a class="nav-item nav-link" href="../pages/index.php">Home</a>
            <a class="nav-item nav-link" href="../pages/registration.php">Register</a>
            <a class="nav-item nav-link" href="../pages/accountpage.php">User Page</a>
        </div>
        <div class="navbar-nav" style="cursor:pointer;">
            <?php if (!isset($session_id) || $session_id == "") { ?>
                <a id="login" class="nav-link float-right" data-toggle="modal" data-target="#loginModal">Login</a>
            <?php } else { ?>
                <a type="button" class="nav-link float-right" href="../php/logout.php">Logout</a>
            <?php } ?>
        </div>
    </div>
</nav>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Login</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form class="modalForm" id="login_form" method="post">
                    <table style="margin-left: 10%">
                        <tr class="form-group">
                            <td style="width: 40%; margin-left: 50px">Email Address</td>
                            <td><input class="form-control" type="text" name="loginEmail" id="loginEmail" required></td>
                        </tr>
                        <tr class="form-group">
                            <td>Password</td>
                            <td><input class="form-control" type="password" name="loginPassword" id="loginPassword"
                                       required></td>
                        </tr>
                    </table>
                    <p><span id="msg"></span></p>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger float-right" id="login_btn">Log In</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#login_btn').click(function () {
        event.preventDefault();
        console.log('button clicked');
        if ($('#loginEmail').val() == "" || $('#loginPassword').val() == "") {
            $('.statusMsg').html('<span style="color:red;">Please enter your email and password.</span>');
        } else {
            $.ajax({
                url: "../php/login_engine.php",
                method: "POST",
                data: $("#login_form").serialize(),
                beforeSend: function () {
                    $('.statusMsg').html('<span style="color:green;">Loading process...</span>');
                },
                success: function (response) {
                    if (response == 'ok') {
                        $('.statusMsg').html('<span style="color:green;">We are logging into your account..Wait a second.. </span>');
                        setTimeout(' window.location.href = "index.php"; ', 500);
                    } else {
                        $('.statusMsg').html('<span style="color:red;">' + response + '</span>');
                    }
                }
            });
        }
    });
</script>

