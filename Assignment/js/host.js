let rowNum = 2;

//Edit the values of the rows
function edit(k){
  let content = prompt("Enter the new values","")
  let container = document.getElementsByClassName("row"+k[0])[k[1]]
  container.getElementsByTagName('h2')[0].innerHTML = content
}


//edit the rating of the row
function editRating(k){
  let totalRate = parseInt(prompt("Enter the total Rating",""));
  let totalReview = parseInt(prompt("Enter the total number of reviews",""))

  let rating = (totalRate/totalReview).toFixed(2);

  let container =document.getElementsByClassName("row"+k)
  container[9].getElementsByTagName('h2')[0].innerHTML = rating;
}




//adding a new row
function addRow(){
  let price = prompt("Enter the price with '$' " ,"");
  let rooms = prompt("Enter the rooms  " ,"");
  let bathrooms = prompt("Enter the bathrooms  " ,"");
  let smoking = prompt("Smoking Allowed  " ,"");
  let garage = prompt("Garage?  " ,"");
  let pet = prompt("Pet friendly? " ,"");
  let internet = prompt("Internet Access " ,"");
  let addres = prompt("Enter the address " ,"");
  let totalRate = parseInt(prompt("Enter the total Rating",""));
  let totalReview = parseInt(prompt("Enter the total number of reviews",""))
  let rating = (totalRate/totalReview).toFixed(2);

  document.getElementById('table').innerHTML +=
  `
  <div class="Image row${rowNum}">
    <img src="https://pix10.agoda.net/hotelImages/747/7476707/7476707_19053021300074837521.jpg?s=1024x768" alt="">
  </div>
  <div class="Price  row${rowNum}">
    <h2>${price}</h2>
    <a class="editBut" onclick="edit([${rowNum},1])">Edit</a>
  </div>
  <div class="Rooms row${rowNum}">
    <h2>${rooms}</h2>
    <a class="editBut" onclick="edit([${rowNum},2])">Edit</a>
  </div>
  <div class="Bath row${rowNum}">
    <h2>${bathrooms}</h2>
    <a class="editBut" onclick="edit([${rowNum},3])">Edit</a>
  </div>
  <div class="Somking row${rowNum}">
    <h2>${smoking}</h2>
    <a class="editBut" onclick="edit([${rowNum},4])">Edit</a>
  </div>
  <div class="Garage row${rowNum}">
    <h2>${garage}</h2>
    <a class="editBut" onclick="edit([${rowNum},5])">Edit</a>
  </div>
  <div class="Pet row${rowNum}">
    <h2>${pet}</h2>
    <a class="editBut" onclick="edit([${rowNum},6])">Edit</a>
  </div>
  <div class="Internet row${rowNum}">
    <h2>${internet}</h2>
    <a class="editBut" onclick="edit([${rowNum},7])">Edit</a>
  </div>
  <div class="Address row${rowNum}">
    <h2>${addres}</h2>
    <a class="editBut" onclick="edit([${rowNum},8])">Edit</a>
  </div>
  <div class="Rating row${rowNum}">
    <h2>${rating}</h2>
    <a class="editBut" onclick="editRating(${rowNum})">Edit</a>
  </div>

  `
}


//removing a row


function removeRow(){
  let k = prompt("Enter the row number","");
  for(let i=0;i<10;i++){
    document.getElementsByClassName("row"+k)[i].style.display = 'none'
  }
}
