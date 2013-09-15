function getClass(elem){
    var classList = new Array();
    var array = document.getElementById(elem).className.split(" ");
    
    for(var i = 0; i < array.length; i++){
        classList.push(array[i]);
    }

    return classList;
}

function addClass(elem, className){
    var element = document.getElementById(elem);
    var classList = new Array();
    var classes = document.getElementById(elem).className;
    if(classes==null || classes==""){
     element.setAttribute("class", className);
      classList.push(className);
    }
    else{
    classList = getClass(elem);
    classList.push(className);
    }
    
   
    element.className = classList;
    element.innerHTML = classList;
}

function validateForm(){
    var errormsg="";
    var correct = true;
    //check username
    var user = document.forms["myForm"]["name"].value;
    if (user == null || user=="")
    {
     correct = false;
     errormsg += "UserName Field is Empty <br>";
     document.forms.myForm.name.style.backgroundColor="#FF0000";
    }
    else{
         document.forms.myForm.name.style.backgroundColor="#FFFFFF";
    }

    //check email
    var email = document.forms["myForm"]["email"].value;
    var atpos=email.indexOf("@");
    var dotpos=email.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length){
        correct = false;
        errormsg += "Incorrect Email Format <br>";
        document.forms.myForm.email.style.backgroundColor="#FF0000";
    }
    else{
        document.forms.myForm.email.style.backgroundColor="#FFFFFF";
   
    }
  
    //check password
    var password = document.forms["myForm"]["password"].value;
    var confirm = document.forms["myForm"]["confirm"].value;
    var passright = true;
    if (password != ""){
        if(password.length < 6){
            passright = false;
            errormsg += "Password must have more than 6 characters <br>";
        }
        if(password != confirm){
            passright = false;
         errormsg += "Passwords do not match <br>";
        }
        if(!passright){
            document.forms.myForm.password.style.backgroundColor="#FF0000";
            document.forms.myForm.confirm.style.backgroundColor="#FF0000";
            correct = false;
        }else{
         document.forms.myForm.password.style.backgroundColor="#FFFFFF";
         document.forms.myForm.confirm.style.backgroundColor="#FFFFFF";   
        }
        
    }
    else{
        document.forms.myForm.password.style.backgroundColor="#FF0000";
        document.forms.myForm.confirm.style.backgroundColor="#FF0000";
        correct = false;
        errormsg += "Password Field Empty <br>";
    }
    //doublecheck passwords
    if(correct){
     return true;   
    }
    
    //Add text to div id=FormError
    document.getElementById("FormErrors").innerHTML = "Following Errors: <br>" +  errormsg;
    return false;
    
}