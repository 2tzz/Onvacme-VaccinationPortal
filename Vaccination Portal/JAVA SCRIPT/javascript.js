function checkPassword(){
    if(document.getElementById("pwd").value!=document.getElementById("cnfrmpwd").value)
    {
        alert("Password Mismatched");
        return false;
    }
    else
    {   
        alert("Successful");
        return true;
    }
}

function enableSubmit()
{
    if (document.getElementById("agree")){
        document.getElementById('btnsubmit').disabled = false;
    } 
    else {
        document.getElementById('btnsubmit').disabled = true;
    }
}