<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Host Dashboard</title>
  <!-- Font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600;700&display=swap" rel="stylesheet">
  <!-- External CSS file -->
  <link rel="stylesheet" href="../css/host.css">
</head>

<body>
  <div class="mainBody">
    <header>
      <nav class="navbar">
          <div><b>UniTas Pty Ltd</b></div>
          <div class="navbar-btn">
              <a href="index.html">Home</a>
              <a href="registration.html">Register</a>
              <a href="host.html">Host Dashboard</a>
              <a href="service.html">System Manager Dashboard</a>
          </div>
      </nav>
    </header>
    <div class="header">
      <h1>Dashboard for Host</h1>
    </div>

    <div class="tableContainer">

      <div class="table" id="table">
        <!-- titles start -->
        <div class="imagesTitle ">
          <h2>Accommodation</h2>
        </div>
        <div class="PriceTitle ">
          <h2>Price</h2>
        </div>
        <div class="RoomsTitle">
          <h2>No. of Rooms</h2>
        </div>
        <div class="BathTitle">
          <h2>No. of Bathrooms</h2>
        </div>
        <div class="SomkingTitle">
          <h2>Smoking Allowed</h2>
        </div>
        <div class="GarageTitle">
          <h2>Garage</h2>
        </div>
        <div class="PetTitle">
          <h2>Pets Allowed</h2>
        </div>
        <div class="InternetTitle">
          <h2>Internet</h2>
        </div>
        <div class="AddressTitle">
          <h2>Address</h2>
        </div>
        <div class="RatingTitle">
          <h2>Rating</h2>
        </div>

        <!-- title ends -->
        <!-- row start -->
        <div class="Image row1">
          <img src="https://pix10.agoda.net/hotelImages/747/7476707/7476707_19053021300074837521.jpg?s=1024x768" alt="">
        </div>
        <div class="Price  row1">
          <h2>$300</h2>
          <a class="editBut" onclick="edit([1,1])">Edit</a>
        </div>
        <div class="Rooms row1">
          <h2>5</h2>
          <a class="editBut" onclick="edit([1,2])">Edit</a>
        </div>
        <div class="Bath row1">
          <h2>3</h2>
          <a class="editBut" onclick="edit([1,3])">Edit</a>
        </div>
        <div class="Somking row1">
          <h2>No</h2>
          <a class="editBut" onclick="edit([1,4])">Edit</a>
        </div>
        <div class="Garage row1">
          <h2>Yes</h2>
          <a class="editBut" onclick="edit([1,5])">Edit</a>
        </div>
        <div class="Pet row1">
          <h2>Yes</h2>
          <a class="editBut" onclick="edit([1,6])">Edit</a>
        </div>
        <div class="Internet row1">
          <h2>Yes</h2>
          <a class="editBut" onclick="edit([1,7])">Edit</a>
        </div>
        <div class="Address row1">
          <h2>Churchill Ave, Hobart TAS 7005</h2>
          <a class="editBut" onclick="edit([1,8])">Edit</a>
        </div>
        <div class="Rating row1">
          <h2>4.3</h2>
          <a class="editBut" onclick="editRating(1)">Edit</a>
        </div>
        <!-- row ends -->
      </div>
    </div>



  </div>
  <div class="buttonss">
    <a class="editBut" onclick="addRow()"> Add</a>
    <a class="removeBut" onclick="removeRow()">Remove</a>
  </div>


  <script src="../js/host.js" charset="utf-8"></script>
</body>

</html>
