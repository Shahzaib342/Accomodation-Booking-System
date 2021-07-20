<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>System Manager Dashboard</title>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- External CSS file -->
 
    <link rel="stylesheet" href="../css/service.css">
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
        <h1>Dashboard for System Managaer</h1>
      </div>

<div class="tableContainer">

    <div class="table" id="table">

      <!-- table title start  -->
      <div class="imagesTitle ">
        <h2>Accommodation</h2>
      </div>
      <div class="hostsTitle ">
        <h2>Host(s)</h2>
        <a  class="newBut" onClick="addHost()">New</a>
      </div>
      <div class="customerTitle ">
        <h2>Customer(s)</h2>
        <a  class="newBut" onclick="addCustomer()">New</a>
      </div>
      <div class="itemsTitle">
        <h2>Items</h2>
        <!-- <a  class="newBut" onclick="addItems()">New</a> -->
      </div>
      <div class="reviewsTitle ">
        <h2>Reviews</h2>
      </div>

      <!-- table title end -->

      <!-- row1 start -->
      <div class="image row1">
        <img src="https://pix10.agoda.net/hotelImages/747/7476707/7476707_19053021300074837521.jpg?s=1024x768" alt="">
      </div>
      <div class="hosts row1">
        <div class="person" id="r1h1">
          <p id="r1h1p">Host1</p>
          <a  class="editBut" onclick="editHost([1,1])">Edit</a>
          <a  class="removeBut" onclick="removeHost([1,1])">Remove</a>
        </div>
        <div class="person" id="r1h2">
          <p id='r1h2p'>Host2</p>
          <a  class="editBut" onclick="editHost([1,2])">Edit</a>
          <a  class="removeBut" onclick="removeHost([1,2])">Remove</a>
        </div>
      </div>
      <div class="customer row1">
        <div class="person" id="r1p1">
          <p id="r1p1p">Person1</p>
          <a  class="editBut" onclick="editPerson([1,1])" >Edit</a>
          <a  class="removeBut" onclick="removePerson([1,1])">Remove</a>
        </div>
        <div class="person" id="r1p2">
          <p id="r1p2p">Person2</p>
          <a  class="editBut" onclick="editPerson([1,2])" >Edit</a>
          <a  class="removeBut" onclick="removePerson([1,2])">Remove</a>
        </div>
      </div>
      <div class="items row1">
        <div class="item" id="r1i1">
          <p>Price</p>
          <p id="r1i1i">$300</p>
          <a  class="editBut"  onclick="editItem([1,1])">Edit</a>
          <a class="removeBut" onclick="removeItem([1,1])">Remove</a>
        </div>
        <div class="item" id="r1i2">
          <p >No. of Rooms</p>
          <p id="r1i2i">3</p>
          <a  class="editBut"  onclick="editItem([1,2])">Edit</a>
          <a class="removeBut" onclick="removeItem([1,2])">Remove</a>
        </div>
        <div class="item" id="r1i3">
          <p >No. of Bathrooms</p>
          <p id="r1i3i">1</p>
          <a  class="editBut"  onclick="editItem([1,3])">Edit</a>
          <a class="removeBut" onclick="removeItem([1,3])">Remove</a>
        </div>
        <div class="item" id="r1i4">
          <p >Smoking Allowed</p>
          <p id="r1i4i">Yes</p>
          <a  class="editBut"  onclick="editItem([1,4])">Edit</a>
          <a class="removeBut" onclick="removeItem([1,4])">Remove</a>
        </div>
        <div class="item" id="r1i5">
          <p >Garage</p>
          <p id="r1i5i">Yes</p>
          <a  class="editBut"  onclick="editItem([1,5])">Edit</a>
          <a class="removeBut" onclick="removeItem([1,5])">Remove</a>
        </div>
        <div class="item" id="r1i6">
          <p >Pets Allowed</p>
          <p id="r1i6i">No</p>
          <a  class="editBut"  onclick="editItem([1,6])">Edit</a>
          <a class="removeBut" onclick="removeItem([1,6])">Remove</a>
        </div>
        <div class="item" id="r1i7">
          <p >Internet</p>
          <p id="r1i7i">Yes</p>
          <a  class="editBut"  onclick="editItem([1,7])">Edit</a>
          <a class="removeBut" onclick="removeItem([1,7])">Remove</a>
        </div>
        <div class="item" id="r1i8">
          <p >Address</p>
          <p id="r1i8i">Churchill Ave, Hobart TAS 7005</p>
          <a  class="editBut"  onclick="editItem([1,8])">Edit</a>
          <a class="removeBut" onclick="removeItem([1,8])">Remove</a>
        </div>
      </div>
      <div class="reviews row1">
        <div class="review" id="r1r1">
          <p>Review 1</p>
          <p>3/5</p>
          <a class="removeBut" onclick="removeRev([1,1])">Remove</a>
        </div>
        <div class="review" id="r1r2">
          <p>Review 2</p>
          <p>3/5</p>
          <a class="removeBut" onclick="removeRev([1,2])">Remove</a>
        </div>
        <div class="review" id="r1r3">
          <p>Review 3</p>
          <p>3/5</p>
          <a class="removeBut" onclick="removeRev([1,3])">Remove</a>
        </div>
      </div>

      <!-- row 1 ends -->

    </div>
  </div>



</div>
<div class="buttonss">
  <a  class="editBut" onclick="addRow()"> Add</a>
  <a  class="removeBut" onclick="removeRow()">Remove</a>
</div>


<script src="../js/service.js" charset="utf-8"></script>
  </body>
</html>
