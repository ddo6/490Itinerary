function f() 
{  	
    //pointers to textboxes
    var ptrUser = document.getElementById("user")
    var ptrPass = document.getElementById("pass")
    var ptrAmo  = document.getElementById("amount") 
  	
    //checks to see if user or pass is empty
    if(ptrUser.value.trim() == "" || ptrPass.value.trim() == "")
    {
      alert("Bad: User of password is empty!")
      return false
    }
}
