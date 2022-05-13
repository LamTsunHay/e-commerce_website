function check(){
    if(document.getElementById("PW").value!=document.getElementById("confirmPW").value){
        alert("New Password and Confirm Password is not the same");
    }
    else{
        document.getElementById("newForm").submit();
    }
        
}
