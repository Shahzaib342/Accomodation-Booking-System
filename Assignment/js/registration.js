$(document).ready(function(){
    document.getElementById('logout').style.display='none';
 })

//Host or Client registration

$("#type").change(function(){
    var selected = $("#type").val();
    var abninput = document.querySelector("#abnNumber");
    //console.log(abninput);
    if (selected == "Host"){
        var abn = document.querySelector(".abnNumber");
        abn.className = "abnNumber-Host";
        abninput.required = true;
    }
    else {
        var abn = document.querySelector(".abnNumber-Host")
        abn.className = "abnNumber";
        abninput.required = false;
    }
}); 

//Password Validation
$('.registerForm').submit(function(){
    var password = $("#password").val();
    var confPass = $("#confirmPassword").val();
    if (password !== confPass){
        alert ("Passwords do not match");
        return false;
    }
});
// ab@D12dg

