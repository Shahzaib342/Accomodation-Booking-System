/*Login Modal

$(document).ready(function(){
    document.getElementById('searchTable').style.display = 'none'
    document.getElementById('logout').style.display='none';
 })
 
const modalOverlay = document.querySelector('.modal-overlay');
var logStatus = 0;

document.querySelector('#login').addEventListener('click', () => {
	modalOverlay.classList.add('modal-overlay-active');
})
document.querySelector('.modal-close').addEventListener('click', () => {
	modalOverlay.classList.remove('modal-overlay-active')
})
document.querySelector('.btn-close').addEventListener('click', () => {
	modalOverlay.classList.remove('modal-overlay-active')
})

document.querySelector('.btn-login').addEventListener('click', () => {
    var userName = $("#userName").val();
    var userPassword = $('#userPassword').val();
    if (!userName || !userPassword) {
        alert ("Please enter your Username and Password");
        return false;
    } else {
        alert ("You are now logged in!");
        logStatus = 1;
        document.getElementById('login').style.display = 'none';
        document.getElementById('logout').style.display = 'inline';
	    modalOverlay.classList.remove('modal-overlay-active');
    }
})

document.querySelector('#logout').addEventListener('click', () => {
    alert ('You have logged out');
    logStatus = 0;
    document.getElementById('login').style.display = 'inline';
    document.getElementById('logout').style.display = 'none';
})

//Accommodation Related Scripts

/*Onclick Search checks
function searchFunction(){
    var accomInDate = $('#accomInDate').val();
    var accomOutDate = $('#accomOutDate').val();
    var accomInDateInt = Date.parse(accomInDate);
    var accomOutDateInt = Date.parse(accomOutDate);
    var accomalert = document.querySelector('.accom-alert');
    var noOfGuess = document.getElementById('noOfGuess').value;
    var selLocation = document.querySelector('.accom-destination').value;

    //Field validations
    if (!accomInDate || !accomOutDate){
        document.querySelector('.accom-alert').innerHTML = "Check in and/or out date missing!";
        accomalert.classList.add('accom-alert--active');
    } else if (accomInDateInt > accomOutDateInt){
        document.querySelector('.accom-alert').innerHTML = "Check out date has to be after check in date!";
        accomalert.classList.add('accom-alert--active');
    } else if (!noOfGuess) {
        document.querySelector('.accom-alert').innerHTML = "Please enter the number of guesses!";
        accomalert.classList.add('accom-alert--active');
    } else {
        accomalert.classList.remove('accom-alert--active');
        //Loop through each entry to find matched result
        document.getElementById('searchTable').style.display = "table"
        for (var i=1 ; i < 11 ; i++) {
            var tempClass = 'accomItem'.concat(i);
            var temp = 'accom-'.concat(i);
            var accomLocationValue = document.querySelector("[class=" + temp + "]" + ">.accomItem1").textContent;
            var tempAvailFrom = Date.parse(document.querySelector("[class=" + temp + "]" + ">.accomItem2").textContent);
            var tempAvailTo = Date.parse(document.querySelector("[class=" + temp + "]" + ">.accomItem3").textContent);
            var tempGuess = Number(document.querySelector("[class=" + temp + "]" + ">.accomItem4").textContent);
            if (accomLocationValue == selLocation && accomInDateInt > tempAvailFrom && accomOutDateInt < tempAvailTo && noOfGuess <= tempGuess){
                try {document.getElementById(temp).style.display = 'table-row';}
                catch {};
            } else
                try {document.getElementById(temp).style.display = 'none'}
                catch {};
            }
        }
    }

//Booking
$(".accomBook").click(function(){
    if (logStatus ==0){
        alert ('Please login to book');
        return false;
    } else {
        alert ('Your accomodation has been booked!');
    }
})
*/