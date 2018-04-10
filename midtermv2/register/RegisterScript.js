function f() 
{  	
    //pointers to textboxes
    var ptrName = document.getElementById("name")
    var ptrUser = document.getElementById("user")
    var ptrPass = document.getElementById("pass")
    var ptrCon  = document.getElementById("conPass") 
   
    //checks to see if user or pass is empty
    if(ptrName.value.trim() == "" || ptrUser.value.trim() == "" || ptrPass.value.trim() == "" || ptrCon.value.trim() == "")
    {
      alert("Bad: Field is empty!")
      return false
    }
    
    //checks to make sure passwords match
    if(ptrPass.value != ptrCon.value)
    {
      alert("Bad: Passwords must match!")
      return false
    }
}