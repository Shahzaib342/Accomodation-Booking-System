let rowNum = 2


//Adding new rows
function addRow(){
  let host = prompt("Enter Host Name","");


  let table = document.getElementById('table');

  table.innerHTML+=`
  <div class="image row${rowNum}">
    <img src="https://pix10.agoda.net/hotelImages/747/7476707/7476707_19053021300074837521.jpg?s=1024x768" alt="">
  </div>
  `;

  table.innerHTML+=`
  <div class="hosts row${rowNum}" >
    <div class="person" id="r${rowNum}h1">
      <p id="r${rowNum}h1p">${host}</p>
      <a  class="editBut" onclick="editHost([${rowNum},1])">Edit</a>
      <a  class="removeBut" onclick="removeHost([${rowNum},1])">Remove</a>
    </div>
  </div>

  <div class="customer row${rowNum}">

  </div>
  </div>
  <div class="items row${rowNum}">
  <div class="item" id="r${rowNum}i1">
    <p>Price</p>
    <p id="r${rowNum}i1i">$300</p>
    <a  class="editBut"  onclick="editItem([${rowNum},1])">Edit</a>
    <a class="removeBut" onclick="removeItem([${rowNum},1])">Remove</a>
  </div>
  <div class="item" id="r${rowNum}i2">
    <p >No. of Rooms</p>
    <p id="r${rowNum}i2i">3</p>
    <a  class="editBut"  onclick="editItem([${rowNum},2])">Edit</a>
    <a class="removeBut" onclick="removeItem([${rowNum},2])">Remove</a>
  </div>
  <div class="item" id="r${rowNum}i3">
    <p >No. of Bathrooms</p>
    <p id="r${rowNum}i3i">1</p>
    <a  class="editBut"  onclick="editItem([${rowNum},3])">Edit</a>
    <a class="removeBut" onclick="removeItem([${rowNum},3])">Remove</a>
  </div>
  <div class="item" id="r${rowNum}i4">
    <p >Smoking Allowed</p>
    <p id="r${rowNum}i4i">Yes</p>
    <a  class="editBut"  onclick="editItem([${rowNum},4])">Edit</a>
    <a class="removeBut" onclick="removeItem([${rowNum},4])">Remove</a>
  </div>
  <div class="item" id="r${rowNum}i5">
    <p >Garage</p>
    <p id="r${rowNum}i5i">Yes</p>
    <a  class="editBut"  onclick="editItem([${rowNum},5])">Edit</a>
    <a class="removeBut" onclick="removeItem([${rowNum},5])">Remove</a>
  </div>
  <div class="item" id="r${rowNum}i6">
    <p >Pets Allowed</p>
    <p id="r${rowNum}i6i">No</p>
    <a  class="editBut"  onclick="editItem([${rowNum},6])">Edit</a>
    <a class="removeBut" onclick="removeItem([${rowNum},6])">Remove</a>
  </div>
  <div class="item" id="r${rowNum}i7">
    <p >Internet</p>
    <p id="r${rowNum}i7i">Yes</p>
    <a  class="editBut"  onclick="editItem([${rowNum},7])">Edit</a>
    <a class="removeBut" onclick="removeItem([${rowNum},7])">Remove</a>
  </div>
  <div class="item" id="r${rowNum}i8">
    <p >Address</p>
    <p id="r${rowNum}i8i">Churchill Ave, Hobart TAS 7005</p>
    <a  class="editBut"  onclick="editItem([${rowNum},8])">Edit</a>
    <a class="removeBut" onclick="removeItem([${rowNum},8])">Remove</a>
  </div>
  </div>
  <div class="reviews row${rowNum}">

  </div>
  `;

  rowNum +=1;
}

//removing rows
function removeRow(){
  let k = prompt("Enter the row number","");
  for(let i =0 ; i < 5; i++ ){
    document.getElementsByClassName('row'+k)[i].style.display='none'
  }
}


//adding host to a row
function addHost(){
  let k = prompt("Enter the row number","");
  let hostName = prompt("Enter the host name","")
  if(k < rowNum ){

    let noOfHosts = document.getElementsByClassName("row"+k)[1].childElementCount;
    noOfHosts +=1
  document.getElementsByClassName("row"+k)[1].innerHTML+=
  `
  <div class="person" id="r${k}h${noOfHosts}">
    <p id="r${k}h${noOfHosts}p">${hostName}</p>
    <a  class="editBut" onclick="editHost([${k},${noOfHosts}])" >Edit</a>
    <a  class="removeBut" onclick="removeHost([${k},${noOfHosts}])">Remove</a>
  </div>
  `;
}
}


//adding customer to a row
function addCustomer(){
  let k = prompt("Enter the row number","");
  let hostName = prompt("Enter the Customer name","")
  if(k < rowNum ){
    let noOfHosts = document.getElementsByClassName("row"+k)[2].childElementCount;
    noOfHosts +=1
  document.getElementsByClassName("row"+k)[2].innerHTML+=
  `
  <div class="person" id="r${k}p${noOfHosts}">
    <p id="r${k}p${noOfHosts}p">${hostName}</p>
    <a  class="editBut" onclick="editPerson([${k},${noOfHosts}])" >Edit</a>
    <a  class="removeBut" onclick="removePerson([${k},${noOfHosts}])">Remove</a>
  </div>
  `;
}
}

//adding items to a row
function addItems(){
  let k = prompt("Enter the row number","");
  let hostName = prompt("Enter the item name","")
  if(k < rowNum ){
    let noOfHosts = document.getElementsByClassName("row"+k)[3].childElementCount;
    noOfHosts +=1
  document.getElementsByClassName("row"+k)[3].innerHTML+=
  `
  <div class="item" id="r${k}i${noOfHosts}">
    <p id="r${k}i${noOfHosts}i">${hostName}</p>
    <a  class="editBut" onclick="editItem([${k},${noOfHosts}])" >Edit</a>
    <a  class="removeBut" onclick="removeItem([${k},${noOfHosts}])">Remove</a>
  </div>
  `;
}
}


//editing host names

function editHost(k){
  let name = prompt("Enter the new name","");
  document.getElementById('r'+k[0]+'h'+k[1]+'p').innerHTML = name;
}

//removing hosts

function removeHost(k){
  document.getElementById('r'+k[0]+'h'+k[1]).style.display = 'none';
}



//editing customers name

function editPerson(k) {
  let name = prompt("Enter the new name","");
  document.getElementById('r'+k[0]+'p'+k[1]+'p').innerHTML = name;
}


//removing customer name
function removePerson(k) {
    document.getElementById('r'+k[0]+'p'+k[1]).style.display = 'none';
}

//editing items
function editItem(k){
  let name = prompt("Enter the new name","");
  document.getElementById('r'+k[0]+'i'+k[1]+'i').innerHTML = name;
}

//removing items

function removeItem(k){
  document.getElementById('r'+k[0]+'i'+k[1]).style.display = 'none';
}


//removing Review
function removeRev(k){
  document.getElementById('r'+k[0]+'r'+k[1]).style.display = 'none';
}
